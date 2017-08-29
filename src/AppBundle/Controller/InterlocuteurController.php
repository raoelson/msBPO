<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Referentiel\Interlocuteur;
use AppBundle\Entity\Referentiel\Document;

/**
 * Description of InterlocuteurController
 *
 * @author thierry
 */
class InterlocuteurController extends Controller {

    /**
     * @Route("/administration/referentiel/interlocuteurs", name="admin_interlocuteurs")
     * @return type
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $interlocuteurs = $em->getRepository("AppBundle:Referentiel\Interlocuteur")->getInterlocuteurs();
        $documents = $em->getRepository("AppBundle:Referentiel\Document")->getAll();
        return $this->render('administration/interlocuteur/index.html.twig', array(
                    'interlocuteurs' => $interlocuteurs,
                    'documents' => $documents,
        ));
    }

    /**
     * @Route("/administration/referentiel/interlocuteur/ajouter", name="admin_interlocuteur_ajouter")
     * @param Request $request
     */
    public function ajouterAction(Request $request) {
        if ($request->isMethod("POST")) {
            $interlocuteur = new Interlocuteur();
            $interlocuteur->setLibelle($request->request->get('interlocuteur'));
            $em = $this->getDoctrine()->getManager();

            if ($request->request->get('documents')) {
                $documents = array();
                foreach (explode(',', $request->request->get('documents')) as $libelle) {
                    $documentEntity = null;
                    if (isset($documents[$libelle])) {
                        $documentEntity = $documents[$libelle];
                    } else {
                        $documentEntity = $em->getRepository("AppBundle:Referentiel\Document")->findOneBy(array('documentType' => $libelle));
                        $documents[$libelle] = $documentEntity;
                    }
                    if (!$documentEntity) {
                        $document = new Document();
                        $document->setDocumentType($libelle);
                        $document->setInterlocuteur($interlocuteur);
                        $interlocuteur->addDocument($document);
                    } else {
                        $document = $documentEntity;
                        $interlocuteur->setDocuments($document);
                    }
                    $em->persist($document);
                }
            }

            $em->persist($interlocuteur);
            $em->flush();
            
            return $this->redirectToRoute('admin_interlocuteurs');
        }
    }

    /**
     * @Route("/administration/referentiel/interlocuteur/{idInterlocuteur}", name="admin_interlocuteur_modifier")
     * @param integer $idInterlocuteur
     * @param Request $request
     */
    public function modifierAction($idInterlocuteur, Request $request) {
        $sqlCleaner = "";
        if ($request->isMethod("POST")) {
            $em = $this->getDoctrine()->getManager();
            $interlocuteur = $em->find("AppBundle:Referentiel\Interlocuteur", $idInterlocuteur);
                        
            if ($request->request->get('editer')) {
                $interlocuteur->setLibelle($request->request->get('interlocuteur'));
                $em->persist($interlocuteur);
                $em->flush();
                return $this->redirectToRoute('admin_interlocuteurs');
            }
            
            $idDocument = $request->request->get('submit');
            if ($request->request->get('supprimer')) {
                $sqlCleaner = "DELETE FROM interlocuteur_document WHERE document_id = '" . $request->request->get('supprimer'). "' AND interlocueteur_id = '" . $idInterlocuteur . "' LIMIT 1";
                $db = $em->getConnection();
                $stmt = $db->prepare($sqlCleaner);
                $stmt->execute();
                return $this->redirectToRoute('admin_interlocuteurs');
            }
            $documents = $request->request->get('document');
            $documentType = $documents[$idDocument]['documentType'];
            
            if (!strlen($documentType)) {
                return $this->redirectToRoute('admin_interlocuteurs');
            }
            
            $document = $em->getRepository('AppBundle:Referentiel\Document')->findOneBy(array('documentType' => $documentType));
            
            //si le libellé du document existe
            if ($document) {
                //si c'est un nouveau alors, faire un simple set
                if ($idDocument == 0) {
                    $interlocuteur->setDocuments($document);
                }
                else if ($idDocument == $document->getId()) {
                    //sinon, si ce n'est pas un nouveau, et que c'est le même ID alors ne rien faire, laisser tel que
                }
                else if ($idDocument != $document->getId()) {
                    //si ce n'est pas un nouveau mais différent, alors
                    //le déttacher de l'interlocuteur
                    $sqlCleaner = "DELETE FROM interlocuteur_document WHERE document_id = '" . $idDocument. "' AND interlocueteur_id = '" . $idInterlocuteur . "' LIMIT 1";
                    //et rattacher l'autre
                    $interlocuteur->setDocuments($document);
                }
            }
            else {
                if ($idDocument > 0) {
                    //chercher le document
                    $document = $em->find('AppBundle:Referentiel\Document', $idDocument);
                    if ($document) {
                        //vérifier s'il n'est rattaché qu'à un seul interlocuteur
                        //dans ce cas uniquement, le renommer
                        $interlocuteurs = $document->getInterlocuteurs();
                        
                        if ($interlocuteurs->count() == 1 && $interlocuteurs[0]->getId() == $idInterlocuteur) {
                            $document->setDocumentType($documentType);
                            $em->persist($document);
                        }
                        else {
                            //le déttacher de l'interlocuteur
                            $sqlCleaner = "DELETE FROM interlocuteur_document WHERE document_id = '" . $idDocument. "' AND interlocueteur_id = '" . $idInterlocuteur . "' LIMIT 1";
                            
                            $document = new Document();
                            $document->setDocumentType($documentType);
                            $document->setInterlocuteur($interlocuteur);
                            $interlocuteur->addDocument($document);
                        }
                    }
                    else {
                        $document = new Document();
                        $document->setDocumentType($documentType);
                        $document->setInterlocuteur($interlocuteur);
                        $interlocuteur->addDocument($document);
                    }
                }
                else {
                    $document = new Document();
                    $document->setDocumentType($documentType);
                    $document->setInterlocuteur($interlocuteur);
                    $interlocuteur->addDocument($document);
                }
            }
            
            $em->persist($interlocuteur);
            $em->flush();
        }
        
        if (strlen($sqlCleaner)) {
            $db = $em->getConnection();
            $stmt = $db->prepare($sqlCleaner);
            $stmt->execute();
        }
        return $this->redirectToRoute('admin_interlocuteurs');
    }

    /**
     * @Route("/interlocuteur/document.json", name="interlocuteur_document_json")
     * @return JsonResponse
     */
    public function listerDocumentAction() {
        $em = $this->getDoctrine()->getManager();
        $documents = $em->getRepository("AppBundle:Referentiel\Document")->getAll();
        return new JsonResponse($documents);
    }

}
