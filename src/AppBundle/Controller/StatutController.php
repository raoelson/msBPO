<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Referentiel\Statut;

/**
 * Description of StatutController
 *
 * @author Maria
 */
class StatutController extends Controller {

    /**
     * @Route("/administration/referentiel/statut", name="admin_statut")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $statut = $em->getRepository("AppBundle:Referentiel\Statut")->findBy(array('dateSuppression' => null));

        return $this->render('administration/statut/index.html.twig', array(
                    'statut' => $statut,
        ));
    }

    /**
     * @Route("/administration/referentiel/statut/ajouter", name="admin_statut_ajouter")
     * @param Request $request
     */
    public function ajouterAction(Request $request) {
        if ($request->isXmlHttpRequest()) {
            $s = new Statut();
            $s->setLibelle($request->request->get('libelle'));

            $em = $this->getDoctrine()->getManager();
            try {
                $em->persist($s);
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
     * @Route("/administration/referentiel/statut/{idStatut}", name="admin_statut_modifier")
     * @param integer $idStatut
     * @param Request $request
     * @return JsonResponse
     */
    public function modifierAction($idStatut, Request $request) {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $s = $em->find("AppBundle:Referentiel\Statut", $request->request->get('id'));
            $s->setLibelle($request->request->get('libelle'));

            try {
                $em->persist($s);
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
