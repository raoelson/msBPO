<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class ValidationController extends Controller {
    
    /**
     * @Route("/validation", name="validation")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        if ($request->isMethod("POST")) {
            $operationPost = $request->request->get('operation');
            $journeeId = 0;
            foreach($operationPost as $id => $info){
                $journeeId = $operationPost[$id]['journee'];
                $controleId = $operationPost[$id]['controle'];
                
                $operation = $em->find("AppBundle:Operation", $id);
                $controle = $em->find("AppBundle:Referentiel\Controle", $controleId);
                $operation->setControle($controle);
                $operation->setControleur($user);
                
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
            $this->addFlash('info', 'Suivi validée');
        }
        //$operations = $em->getRepository("AppBundle:Operation")->findBy(array('controle' => null));
        $operations = $em->getRepository("AppBundle:Operation")->getSuiviNonValide($user);
        $operationsAS =  $em->getRepository("AppBundle:Operation")->getSuiviAppelSortantNonValide($user);
        $controles = $em->getRepository("AppBundle:Referentiel\Controle")->getControleStd();
        
        return $this->render('validation/index.html.twig', array(
            'useroperations' => $operations,
            'useroperationsAS' => $operationsAS,
            'controles' => $controles,
        ));
    }
}
