<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Referentiel\Controle;

/**
 * Description of ControleController
 *
 * @author thierry
 */
class ControleController extends Controller {
    
    /**
     * @Route("/administration/referentiel/controles", name="admin_controles")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $controles = $em->getRepository("AppBundle:Referentiel\Controle")->findAll();
        return $this->render('administration/controle/index.html.twig', array(
            'controles' => $controles,
        ));
    }
    
    /**
     * @Route("/administration/referentiel/controle/ajouter", name="admin_controle_ajouter")
     * @param Request $request
     */
    public function ajouterAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $controle = new Controle();
            $controle->setLibelle($request->request->get('libelle'));
            $controle->setPenalite((int) $request->request->get('penalite'));
            
            $em = $this->getDoctrine()->getManager();
            try {
                $em->persist($controle);
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
     * @Route("/administration/referentiel/controle/{idControle}", name="admin_controle_modifier")
     * @param integer $idControle
     * @param Request $request
     * @return JsonResponse
     */
    public function modifierAction($idControle, Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $controle = $em->find("AppBundle:Referentiel\Controle", $request->request->get('id'));
            $controle->setLibelle($request->request->get('libelle'));
            $controle->setPenalite((int) $request->request->get('penalite'));
            
            try {
                $em->persist($controle);
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
