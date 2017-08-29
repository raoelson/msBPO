<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use \Exception;
use AppBundle\Entity\Journee;
use AppBundle\Entity\Operation;
use AppBundle\Entity\Referentiel\Garage;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Description of SuiviAppelSortantController
 *
 * @author vonjisoa
 */
class SuiviAppelSortantController extends Controller {
    /**
     * @Route("/suivi-appel-sortant", name="suivi_appel_sortant")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //données journée
        $operations = $em->getRepository("AppBundle:Operation")->getSuiviAppelSortant($this->getUser(), new \DateTime());

        $filtre = array();

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
                    $operations = $em->getRepository("AppBundle:Operation")->exporter($filtre, 1);
                    exit;
                } 
                else if ($request->request->get('valider_controles')) {
                    $user = $this->getUser();
                    $operationPost = $request->request->get('operation');
                    $journeeId = 0;
                    foreach ($operationPost as $id => $info) {
                        $journeeId = $operationPost[$id]['journee'];
                        $controleId = "";
                        $process = "";
                        $commentCtrl = "";
                        $statutOp_Id = "";
                        if($operationPost[$id]['controle']){
                            $controleId = $operationPost[$id]['controle'];
                        }
                        if($operationPost[$id]['process']){
                            $process = $operationPost[$id]['process'];
                        }
                        if($operationPost[$id]['commentaireCtrl']){
                            $commentCtrl = $operationPost[$id]['commentaireCtrl'];
                        }
                        if($operationPost[$id]['statutOperation']){
                            $statutOp_Id = $operationPost[$id]['statutOperation'];
                        }
                        $operation = $em->find("AppBundle:Operation", $id);
                        $controle = $em->find("AppBundle:Referentiel\Controle", $controleId);
                        $statut = $em->find("AppBundle:Referentiel\Statut", $statutOp_Id);
                        $operation->setControle($controle);
                        $operation->setControleur($user);
                        $operation->setProcess($process);
                        $operation->setCommentaireControle($commentCtrl);
                        $operation->setStatut($statut);

                        $em->persist($operation);
                        
                        if ($journeeId > 0) {
                            $journee = $em->find("AppBundle:Journee", $journeeId);
                            $journee->setValidee(true);
                            $journee->setDateValidation(new \DateTime());
                            $journee->setValidateur($user);
                            $em->persist($journee);
                        }
                    }
                    $em->flush();
                    $this->addFlash('info', 'Les Suivis ont été validées');
                }
            }
            if ($request->request->get('filtrer_journee')) {
                //if(!$this->getUser()->hasRole('ROLE_ADMIN') && !$this->getUser()->hasRole('ROLE_SUPER_ADMIN') && !isset($filtre['agent'])){
                if(!isset($filtre['agent'])){
                    $this->addFlash('error', 'Veuillez choisir un agent');
                }
                elseif (!isset($filtre['date'])) {
                    $this->addFlash('error', 'La date est obligatoire afin de ne sélectionner qu\'une seule journée lors du filtre.');
                }
                else {
                    $operations = $em->getRepository("AppBundle:Operation")->getSuiviAppelSortantFiltre($filtre);
                }
            }
        }
        
        $typeActions = $em->getRepository("AppBundle:Referentiel\TypeAction")->getTypeActionAppelSortants();
        $categories = $em->getRepository("AppBundle:Referentiel\CategorieAppel")->getCategorieIdLibelle();
        $statuts = $em->getRepository("AppBundle:Referentiel\Statut")->getAppelsortantStatut();
        $garages = $em->getRepository("AppBundle:Referentiel\Garage")->findAll();
        $transmissions = $em->getRepository("AppBundle:Referentiel\Transmission")->getAll();
        $listeJours = $this->getListeJours();
        $cabinets = $em->getRepository("AppBundle:Referentiel\Cabinet")->findAll();
        $agents = $em->getRepository("AppBundle:Utilisateur")->getAllAgents();
        $controles = $em->getRepository("AppBundle:Referentiel\Controle")->getControleStd();

        return $this->render('suiviappelsortant/index.html.twig', array(
            'typeActions' => $typeActions,
            'categories' => $categories,
            'statuts' => $statuts,
            'garages' => $garages,
            'transmissions' => $transmissions,
            'joursReception' => $listeJours,
            'operations' => $operations,
            'cabinets' => $cabinets,
            'agents' => $agents,
            'filtre' => $filtre,
            'controles' => $controles,
        ));
    }
    
    /**
     * @Route("/suivi-appel-sortant/enregistrer", name="suivi_appelsortant_save")
     * @param Request $request
     */
    public function enregistrerAction(Request $request)
    {
        $return = "1";
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            
            if ($request->request->get('edit')) {
                $toSave = false;
                $operation = $em->find("AppBundle:Operation", $request->request->get('id'));
                
                if ($operation->getStatut()->getId() != $request->request->get('statut')) {
                    $statut = $em->find("AppBundle:Referentiel\Statut", $request->request->get('statut'));
                    $operation->setStatut($statut);
                    $toSave = true;
                }
                
                if (strlen($request->request->get('commentaire'))) {
                    $maintenant = new \DateTime();
                    $commentaire = '<b>' . $maintenant->format('d/m/Y H:i:s') . " - " . $this->getUser()->getUsername() . '</b>';
                    $commentaire .= "\n" . $request->request->get('commentaire');
                    $commentaire .= "\n" . $operation->getCommentaireOperation();
                    
                    $operation->setCommentaireOperation($commentaire);
                    $toSave = true;
                }
                
                if ($toSave) {
                    $em->persist($operation);
                    $em->flush();
                }
                return new Response($return);
            }
            
            if ($request->request->get('idJournee')) {
                $journee = $em->find("AppBundle:Journee", $request->request->get('idJournee'));
            }
            else {
                $journee = new Journee();
                $journee->setCreateur($this->getUser());
                $journee->setDateOperation(new \DateTime());
            }
            
            $operation = $this->creerOperation($request);
            
            $journee->addOperation($operation);
            
            try {
                $em->persist($journee);
                $em->flush();
            } catch (\Exception $ex) {
                throw new Exception("Erreur !!!\n" . $ex->getMessage());
            }
            
            return new Response($return);
        }
    }
    
    /**
     * @Route("/suivi-appel-sortant/garages.json", name="suivi_appel_sortant_garage_json")
     * @return JsonResponse
     */
    public function listerGaragesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $garages = $em->getRepository("AppBundle:Referentiel\Garage")->getAll();
        return new JsonResponse($garages);
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
    
    private function creerOperation(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $operation = new Operation();
        
        $typeAction = $em->find("AppBundle:Referentiel\TypeAction", $request->request->get('typeAction'));
        $operation->setTypeAction($typeAction);
        
        $operation->setDateReception(\DateTime::createFromFormat("d/m/Y", $request->request->get('jourReception')));
        
        if ($request->request->get('numDossier')) {
            $operation->setNumeroDossier($request->request->get('numDossier'));
        }
        
        if ($request->request->get('idCabinet')) {
            $cabinet = $em->find("AppBundle:Referentiel\Cabinet", $request->request->get('idCabinet'));
            $operation->setCabinet($cabinet);
        }
        
        if ((int) $request->request->get('categorie')) {
            $categorie = $em->find("AppBundle:Referentiel\CategorieAppel", $request->request->get('categorie'));
            $operation->setCategorieAppel($categorie);
        }
        
        if ($request->request->get('statut')) {
            $statut = $em->find("AppBundle:Referentiel\Statut", $request->request->get('statut'));
            $operation->setStatut($statut);
        }
        
        $garage = null;
        if ($request->request->get('idGarage')) {
            $garage = $em->find("AppBundle:Referentiel\Garage", $request->request->get('idGarage'));
        }
        else if ($request->request->get('garage')) {
            $garage = new Garage();
            $garage->setLibelle($request->request->get('garage'));
        }
        if ($garage) {
            $operation->setGarage($garage);
        }
        
        if ($request->request->get('transmission')) {
            $transmission = $em->find("AppBundle:Referentiel\Transmission", $request->request->get('transmission'));
            $operation->setTransmission($transmission);
        }
        
        if ($request->request->get('commentaireOperation')) {
            $maintenant = new \DateTime();
            $commentaire = '<b>' . $maintenant->format('d/m/Y H:i:s') . " - " . $this->getUser()->getUsername() . '</b>';
            $commentaire .= "\n" . $request->request->get('commentaireOperation');
            $operation->setCommentaireOperation($commentaire);
        }
        
        $operation->setOperateur($this->getUser());
        
        return $operation;
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
        if ($request->request->get('filtre_garage')) {
            $filtre['garage'] = $request->request->get('filtre_garage');
        }
        return $filtre;
    }
}
