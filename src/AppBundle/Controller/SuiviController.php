<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use \Exception;

use AppBundle\Entity\Journee;
use AppBundle\Entity\Operation;

/**
 * Description of SuiviController
 *
 * @author thierry
 */
class SuiviController extends Controller {
    
    /**
     * @Route("/suivi", name="suivi")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $filtre = array();
        $operations = $em->getRepository("AppBundle:Operation")->getSuivi($this->getUser(), new \DateTime());
        
        if ($request->isMethod("POST")) {
            $filtre = $this->construireFiltre($request);
            $journee = $em->find("AppBundle:Journee", $request->request->get('idJournee'));
            if ($journee) {
                if ($request->request->get('valider_journee')) {
                    $journee->setValidationDemandee(true);
                    $em->persist($journee);
                    $em->flush();
                }
                else if ($request->request->get('exporter_journee') && $this->container->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
                    //TODO : export
                    $operations = $em->getRepository("AppBundle:Operation")->exporter($filtre);
                    exit;
                }
            }
            if ($request->request->get('filtrer_journee')) {
                //TODO : filtre
                if (!$this->getUser()->hasRole('ROLE_ADMIN') && !$this->getUser()->hasRole('ROLE_SUPER_ADMIN')) {
                    $operations = $em->getRepository("AppBundle:Operation")->getSuivi($this->getUser(), \DateTime::createFromFormat('d/m/Y', $filtre['date']));
                }
                else {
                    if (isset($filtre['date'])) {
                        $operations = $em->getRepository("AppBundle:Operation")->getSuiviFiltre($filtre);
                    }
                    else {
                        $this->addFlash('error', 'La date est obligatoire afin de ne sélectionner qu\'une seule journée lors du filtre.');
                    }
                }
            }
        }
        //else {
            //données journée
          //  $operations = $em->getRepository("AppBundle:Operation")->getSuivi($this->getUser(), new \DateTime());
        //}
        
        //Référentiels
        $typeActions = $em->getRepository("AppBundle:Referentiel\TypeAction")->getTypeActionsStd();
        $statuts = $em->getRepository("AppBundle:Referentiel\Statut")->getStatutsStd();
        $interlocuteurs = $em->getRepository("AppBundle:Referentiel\Interlocuteur")->getInterlocuteursStd();
        $documents = $em->getRepository("AppBundle:Referentiel\Document")->getDocumentsStd();
        $cabinets = $em->getRepository("AppBundle:Referentiel\Cabinet")->findAll();
        $agents = $em->getRepository("AppBundle:Utilisateur")->getAllAgents();
        $joursReception = $this->getListeJours();
        
        return $this->render('suivi/index.html.twig', array(
            'typeActions' => $typeActions,
            'statuts' => $statuts,
            'interlocuteurs' => $interlocuteurs,
            'documents' => $documents,
            'cabinets' => $cabinets,
            'joursReception' => $joursReception,
            'operations' => $operations,
            'agents' => $agents,
            'filtre' => $filtre,
        ));
    }
    
    /**
     * @Route("/suivi/enregistrer", name="suivi_enregistrer")
     * @param Request $request
     */
    public function enregistrerAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            if ($request->request->get('idJournee')) {
                $journee = $em->find("AppBundle:Journee", $request->request->get('idJournee'));
            }
            else {
                $journee = new Journee();
                $journee->setCreateur($this->getUser());
                $journee->setDateOperation(new \DateTime());
            }
            $operation = new Operation();
            $operation->setNumeroDossier($request->request->get('numDossier'));
            if ($request->request->get('idCabinet')) {
                $cabinet = $em->find("AppBundle:Referentiel\Cabinet", $request->request->get('idCabinet'));
                $operation->setCabinet($cabinet);
            }
            else {
                $operation->setReferenceNT($request->request->get('refNT'));
            }
            
            $timeL = new \Datetime();       
            $operation->setHeureTraitement(\DateTime::createFromFormat("H:i", $timeL->format('H:i')));
            $hT = "00:00";
            if ($request->request->get('hRecpt')) {
                $hT = $request->request->get('hRecpt');
            }
            $operation->setHeureReception(\DateTime::createFromFormat("H:i", $hT));
            if ($request->request->get('typeAction')) {
                $typeAction = $em->find("AppBundle:Referentiel\TypeAction", $request->request->get('typeAction'));
                $operation->setTypeAction($typeAction);
            }
            else {
                throw new \Exception("Il faut un type action !");
            }
            if ($request->request->get('statut')) {
                $statut = $em->find("AppBundle:Referentiel\Statut", $request->request->get('statut'));
                $operation->setStatut($statut);
            }
            else {
                throw new \Exception("Il faut un statut !");
            }
            if ($request->request->get('interlocuteur')) {
                $interlocuteur = $em->find("AppBundle:Referentiel\Interlocuteur", $request->request->get('interlocuteur'));
                $operation->setInterlocuteur($interlocuteur);
            }
            else {
                throw new \Exception("Il faut un interlocuteur !");
            }
            if ($request->request->get('document')) {
                $document = $em->find("AppBundle:Referentiel\Document", $request->request->get('document'));
                $operation->setDocument($document);
            }
            else {
                throw new \Exception("Il faut un document !");
            }
            if ($request->request->get('commentaireOperation')) {
                $operation->setCommentaireOperation($request->request->get('commentaireOperation'));
            }
            $operation->setDateReception(\DateTime::createFromFormat("Y/m/d", $request->request->get('jourReception')));
            $operation->setOperateur($this->getUser());
            
            $journee->addOperation($operation);
            
            $em->persist($journee);
            $em->flush();
            
            return new Response("1");
        }
    }
    
    private function getListeJours()
    {
        $jours = array();
        $dateJour = new \DateTime();
        $rewind = 0;
        if ($dateJour->format('w') == 1) {
            $rewind = 2;
        }
        $jours[$dateJour->format('Y/m/d')] = $dateJour->format('d/m/Y');
        for ($i = 0; $i <= $rewind; $i++) {
            $d = $dateJour->sub(new \DateInterval("P1D"));
            $jours[$d->format('Y/m/d')] = $d->format('d/m/Y');
        }
        return $jours;
    }
    
    private function construireFiltre(Request $request)
    {
        $filtre = array();
        if ($request->request->get('filtre_date')) {
            $filtre['date'] = $request->request->get('filtre_date');
        }
        if ($request->request->get('filtre_agent')) {
            $filtre['agent'] = $request->request->get('filtre_agent');
        }
        if ($request->request->get('filtre_cabinet')) {
            $filtre['cabinet'] = $request->request->get('filtre_cabinet');
        }
        if ($request->request->get('filtre_interlocuteur')) {
            $filtre['interlocuteur'] = $request->request->get('filtre_interlocuteur');
        }
        if ($request->request->get('filtre_document')) {
            $filtre['document'] = $request->request->get('filtre_document');
        }
        return $filtre;
    }
    
}
