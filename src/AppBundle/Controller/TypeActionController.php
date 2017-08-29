<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Referentiel\TypeAction;
use AppBundle\Entity\Referentiel\Statut;
use AppBundle\Entity\Referentiel\CategorieAppel;

/**
 * Description of TypeActionController
 *
 * @author thierry
 */
class TypeActionController extends Controller {

    /**
     * @Route("/administration/referentiel/type-actions", name="admin_typeactions")
     * @return type
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $typeActions = $em->getRepository("AppBundle:Referentiel\TypeAction")->getTypeActions();
        $statuts = $em->getRepository("AppBundle:Referentiel\Statut")->getAll();
        $categories = $em->getRepository("AppBundle:Referentiel\CategorieAppel")->getAll();
        $transmissions = $em->getRepository("AppBundle:Referentiel\Transmission")->getTransmissions();

        return $this->render('administration/typeAction/index.html.twig', array(
                    'typeActions' => $typeActions,
                    'statuts' => $statuts,
                    'categories' => $categories,
                    'transmissions' => $transmissions,
        ));
    }

    /**
     * @Route("/administration/referentiel/type-action/ajouter", name="admin_typeaction_ajouter")
     * @param Request $request
     */
    public function ajouterAction(Request $request) {
        if ($request->isXmlHttpRequest()) {
            $libelleTypeAction = $request->request->get('libelle');
            $typeAction = new TypeAction();
            $typeAction->setLibelle($libelleTypeAction);
            $em = $this->getDoctrine()->getManager();
//            var_dump($request->request->get('transmissions'));
//die('aaaaaaaaaa');
            if ($request->request->get('statuts')) {
                $statuts = array();
                foreach (explode(',', $request->request->get('statuts')) as $libelle) {
                    $statutEntity = null;
                    if (isset($statuts[$libelle])) {
                        $statutEntity = $statuts[$libelle];
                    } else {
                        $statutEntity = $em->getRepository("AppBundle:Referentiel\Statut")->findOneBy(array('libelle' => $libelle));
                        $statuts[$libelle] = $statutEntity;
                    }
                    if (!$statutEntity) {
                        $statut = new Statut();
                        $statut->setLibelle($libelle);
                        $statut->setTypeActions($typeAction);
                        $typeAction->addStatuts($statut);
                    } else {
                        $statut = $statutEntity;
                        $typeAction->setStatuts($statut);
                    }
                    $em->persist($statut);
                }
            }

            if ($request->request->get('categories')) {
                $categories = array();
                foreach (explode(',', $request->request->get('categories')) as $libelle) {
                    $categorieEntity = null;
                    if (isset($categories[$libelle])) {
                        $categorieEntity = $categories[$libelle];
                    } else {
                        $categorieEntity = $em->getRepository("AppBundle:Referentiel\CategorieAppel")->findOneBy(array('libelle' => $libelle));
                        $categories[$libelle] = $categorieEntity;
                    }
                    if (!$categorieEntity) {
                        $categorie = new CategorieAppel();
                        $categorie->setLibelle($libelle);
                        $categorie->setTypeActions($typeAction);
                        $typeAction->addCategorie($categorie);
                    } else {
                        $categorie = $categorieEntity;
                        $typeAction->setCategorie($categorie);
                    }
                    $em->persist($categorie);
                }
            }

            if ($request->request->get('transmissions')) {
//                var_dump($request->request->get('transmissions'));die;
                $transmissions = array();
                foreach (explode(',', $request->request->get('transmissions')) as $libelle) {
                    $transmissionEntity = null;
                    if (isset($transmissions[$libelle])) {
                        $transmissionEntity = $transmissions[$libelle];
                    } else {
                        $transmissionEntity = $em->getRepository("AppBundle:Referentiel\Transmission")->findOneBy(array('libelle' => $libelle));
                        $transmissions[$libelle] = $transmissionEntity;
                    }
                    if (!$transmissionEntity) {
                        $transmission = new \AppBundle\Entity\Referentiel\Transmission();
                        $transmission->setLibelle($libelle);
                        $transmission->setTypeActions($typeAction);
                        $typeAction->addTransmission($transmission);
                    } else {
                        $transmission = $transmissionEntity;
                        $typeAction->setTransmissions($transmission);
                    }
                    $em->persist($transmission);
                }
            }

            try {
                $em->persist($typeAction);
                $em->flush();

                $resultat = 1;
            } catch (\Exception $ex) {
                var_dump($ex->getMessage());
                $resultat = 0;
            }

            return new JsonResponse($resultat);
        }
    }

    /**
     * @Route("/administration/referentiel/type-action/{idTypeAction}", name="admin_typeaction_modifier")
     * @param integer $idTypeAction
     * @param Request $request
     */
    public function modifierAction($idTypeAction, Request $request) {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $typeAction = $em->find("AppBundle:Referentiel\TypeAction", $request->request->get('id'));
            $libelleTypeAction = $request->request->get('libelle');
            $typeAction->setLibelle($libelleTypeAction);

            //supprimer tous les status et catégories
            $db = $em->getConnection();
            $stmt = $db->prepare("DELETE FROM type_action_statut WHERE type_action_id = '" . $request->request->get('id') . "'");
            $stmt->execute();
            $stmt = $db->prepare("DELETE FROM type_action_categorie_appel WHERE type_action_id = '" . $request->request->get('id') . "'");
            $stmt->execute();
            $stmt = $db->prepare("DELETE FROM type_action_transmission WHERE type_action_id = '" . $request->request->get('id') . "'");
            $stmt->execute();

            if ($request->request->get('statuts')) {
                $statuts = array();
                foreach (explode(',', $request->request->get('statuts')) as $libelle) {
                    $statutEntity = null;
                    if (isset($statuts[$libelle])) {
                        $statutEntity = $statuts[$libelle];
                    } else {
                        $statutEntity = $em->getRepository("AppBundle:Referentiel\Statut")->findOneBy(array('libelle' => $libelle));
                        $statuts[$libelle] = $statutEntity;
                    }
                    if (!$statutEntity) {
                        $statut = new Statut();
                        $statut->setLibelle($libelle);
                        $statut->setTypeActions($typeAction);
                        $typeAction->addStatuts($statut);
                    } else {
                        $statut = $statutEntity;
                        $typeAction->setStatuts($statut);
                    }
                    $em->persist($statut);
                }
            }

            if ($request->request->get('categories')) {
                $categories = array();
                foreach (explode(',', $request->request->get('categories')) as $libelle) {
                    $categorieEntity = null;
                    if (isset($categories[$libelle])) {
                        $categorieEntity = $categories[$libelle];
                    } else {
                        $categorieEntity = $em->getRepository("AppBundle:Referentiel\CategorieAppel")->findOneBy(array('libelle' => $libelle));
                        $categories[$libelle] = $categorieEntity;
                    }
                    if (!$categorieEntity) {
                        $categorie = new CategorieAppel();
                        $categorie->setLibelle($libelle);
                        $categorie->setTypeActions($typeAction);
                        $typeAction->addCategorie($categorie);
                    } else {
                        $categorie = $categorieEntity;
                        $typeAction->setCategorie($categorie);
                    }
                    $em->persist($categorie);
                }
            }

            if ($request->request->get('transmissions')) {
                $transmissions = array();
                foreach (explode(',', $request->request->get('transmissions')) as $libelle) {
                    $transmissionEntity = null;
                    if (isset($transmissions[$libelle])) {
                        $transmissionEntity = $transmissions[$libelle];
                    } else {
                        $transmissionEntity = $em->getRepository("AppBundle:Referentiel\Transmission")->findOneBy(array('libelle' => $libelle));
                        $transmissions[$libelle] = $transmissionEntity;
                    }
                    if (!$transmissionEntity) {
                        $transmission = new \AppBundle\Entity\Referentiel\Transmission();
                        $transmission->setLibelle($libelle);
                        $transmission->setTypeActions($typeAction);
                        $typeAction->addTransmission($transmission);
                    } else {
                        $transmission = $transmissionEntity;
                        $typeAction->setTransmissions($transmission);
                    }
                    $em->persist($transmission);
                }
            }

            try {
                $em->persist($typeAction);
                $em->flush();

                $resultat = 1;
            } catch (\Exception $ex) {
                var_dump($ex->getMessage());
                $resultat = 0;
            }

            return new JsonResponse($resultat);
        }
    }

}
