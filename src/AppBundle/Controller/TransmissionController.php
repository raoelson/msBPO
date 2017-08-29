<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Referentiel\Transmission;

/**
 * Description of TransmissionController
 *
 * @author thierry
 */
class TransmissionController extends Controller {
    
    /**
     * @Route("/administration/referentiel/transmissions", name="admin_transmissions")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $transmissions = $em->getRepository("AppBundle:Referentiel\Transmission")->findAll();
        return $this->render('administration/transmission/index.html.twig', array(
            'transmissions' => $transmissions,
        ));
    }
    
    /**
     * @Route("/administration/referentiel/transmission/ajouter", name="admin_transmission_ajouter")
     * @param Request $request
     */
    public function ajouterAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $transmission = new Transmission();
            $transmission->setLibelle($request->request->get('libelle'));
            
            $em = $this->getDoctrine()->getManager();
            try {
                $em->persist($transmission);
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
     * @Route("/administration/referentiel/transmission/{idTransmission}", name="admin_transmission_modifier")
     * @param integer $idTransmission
     * @param Request $request
     * @return JsonResponse
     */
    public function modifierAction($idTransmission, Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $transmission = $em->find("AppBundle:Referentiel\Transmission", $request->request->get('id'));
            $transmission->setLibelle($request->request->get('libelle'));
            
            try {
                $em->persist($transmission);
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
