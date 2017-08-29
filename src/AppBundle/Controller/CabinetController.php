<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Referentiel\Cabinet;
use AppBundle\Form\Referentiel\CabinetType;

/**
 * Description of CabinetController
 *
 * @author thierry
 */
class CabinetController extends Controller {
    
    /**
     * @Route("/administration/referentiel/cabinets", name="admin_cabinets")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $cabinets = $em->getRepository("AppBundle:Referentiel\Cabinet")->findAll();
        return $this->render('administration/cabinet/index.html.twig', array(
            'cabinets' => $cabinets,
        ));
    }
    
    /**
     * @Route("/administration/referentiel/cabinet/nouveau", name="admin_cabinet_ajouter")
     * @param Request $request
     */
    public function ajouterAction(Request $request)
    {
        $cabinet = new Cabinet();
        $form = $this->createForm(new CabinetType(), $cabinet);
        
        if ($request->isMethod("POST")) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                try {
                    $em->persist($cabinet);
                    $em->flush();

                    $this->addFlash("info", "Un nouveau cabinet a été ajouté avec succès.");
                    return $this->redirect($this->generateUrl("admin_cabinets"));
                } catch (\Exception $exc) {
                    $this->addFlash("error", "Une erreur a été rencontrée : \n" .$exc->getMessage());
                }
            }
        }
        return $this->render('administration/cabinet/ajouter.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    /**
     * @Route("/administration/referentiel/cabinet/{idCabinet}", name="admin_cabinet_modifier")
     * @param type $idCabinet
     * @return response
     */
    public function modifierAction($idCabinet, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $cabinet = $em->find("AppBundle:Referentiel\Cabinet", $idCabinet);
        $form = $this->createForm(new CabinetType(), $cabinet);
        
        if ($request->isMethod("POST")) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                try {
                    $em->persist($cabinet);
                    $em->flush();

                    $this->addFlash("info", "Le cabinet a été modifié avec succès.");
                    return $this->redirect($this->generateUrl("admin_cabinets"));
                } catch (\Exception $exc) {
                    $cabinet = $em->find("AppBundle:Referentiel\Cabinet", $idCabinet);
                    $this->addFlash("error", "Une erreur a été rencontrée : \n" .$exc->getMessage());
                }
            }
        }
        return $this->render('administration/cabinet/modifier.html.twig', array(
            'cabinet' => $cabinet,
            'form' => $form->createView(),
        ));
    }
    
    /**
     * @Route("/administration/referentiel/cabinet/{idCabinet}/supprimer", name="admin_cabinet_supprimer")
     * @param integer $idCabinet
     */
    public function supprimerAction($idCabinet)
    {
        $em = $this->getDoctrine()->getManager();
        $cabinet = $em->find("AppBundle:Referentiel\Cabinet", $idCabinet);
        if ($cabinet) {
            try {
                $em->remove($cabinet);
                $em->flush();
                
                $this->addFlash("info", "Le cabinet a été supprimé avec succès.");
            } catch (\Exception $ex) {
                $this->addFlash("error", "Une erreur a été rencontrée : \n" .$ex->getMessage());
            }
        }
        else {
            $this->addFlash("error", "Le cabinet est introuvable.");
        }
        return $this->redirect($this->generateUrl("admin_cabinets"));
    }
    
}
