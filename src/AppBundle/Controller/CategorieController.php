<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Referentiel\CategorieAppel;

/**
 * Description of CategorieController
 *
 * @author Maria
 */
class CategorieController extends Controller {
   
    /**
     * @Route("/administration/referentiel/categorie", name="admin_categorie")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository("AppBundle:Referentiel\CategorieAppel")->findBy(array('dateSuppression' => null));
        
        return $this->render('administration/categorie/index.html.twig', array(
                    'categories' => $categories,
        ));
    }
    
    
     /**
     * @Route("/administration/referentiel/categorie/ajouter", name="admin_categorie_ajouter")
     * @param Request $request
     */
    public function ajouterAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $c = new CategorieAppel();
            $c->setLibelle($request->request->get('libelle'));
            
            $em = $this->getDoctrine()->getManager();
            try {
                $em->persist($c);
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
     * @Route("/administration/referentiel/categorie/{idCategorie}", name="admin_categorie_modifier")
     * @param integer $idCategorie
     * @param Request $request
     * @return JsonResponse
     */
    public function modifierAction($idCategorie, Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $c= $em->find("AppBundle:Referentiel\CategorieAppel", $request->request->get('id'));
            $c->setLibelle($request->request->get('libelle'));
            
            try {
                $em->persist($c);
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
