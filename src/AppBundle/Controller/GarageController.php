<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Referentiel\Garage;

/**
 * Description of GarageController
 *
 * @author thierry
 */
class GarageController extends Controller {

    /**
     * @Route("/administration/referentiel/garages", name="admin_garages")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $garages = $em->getRepository("AppBundle:Referentiel\Garage")->findAll();
        return $this->render('administration/garage/index.html.twig', array(
                    'garages' => $garages,
        ));
    }

    /**
     * @Route("/administration/referentiel/garage/ajouter", name="admin_garage_ajouter")
     * @param Request $request
     */
    public function ajouterAction(Request $request) {
        if ($request->isXmlHttpRequest()) {
            $garage = new Garage();
            $garage->setLibelle($request->request->get('libelle'));

            $em = $this->getDoctrine()->getManager();
            try {
                $em->persist($garage);
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
     * @Route("/administration/referentiel/garage/{idGarage}", name="admin_garage_modifier")
     * @param integer $idGarage
     * @param Request $request
     * @return JsonResponse
     */
    public function modifierAction($idGarage, Request $request) {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $garage = $em->find("AppBundle:Referentiel\Garage", $request->request->get('id'));
            $garage->setLibelle($request->request->get('libelle'));

            try {
                $em->persist($garage);
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
