<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Description of AdministrationController
 *
 * @author thierry
 */
class AdministrationController extends Controller {
    
    /**
     * @Route("/administration", name="admin_homepage")
     */
    public function indexAction()
    {
        return $this->render('administration/index.html.twig');
    }
    
}
