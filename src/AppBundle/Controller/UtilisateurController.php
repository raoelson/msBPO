<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Utilisateur;
use AppBundle\Form\UtilisateurType;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Description of UtilisateurController
 *
 * @author thierry
 */
class UtilisateurController extends Controller {
    
    /**
     * @Route("/administration/utilisateurs", name="admin_utilisateurs")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $utilisateurs = $em->getRepository("AppBundle:Utilisateur")->findBy(array('roles' => array('a:1:{i:0;s:10:"ROLE_ADMIN";}', 'a:0:{}')));
        
        if ($request->isMethod("POST")) {
            if ($request->request->get('filtre_active')) {
                $etat = $request->request->get('filtre_active');
                if ($etat == "1"){
                    $utilisateurs = $em->getRepository("AppBundle:Utilisateur")->findBy(array('enabled' => true, 'roles' => array('a:1:{i:0;s:10:"ROLE_ADMIN";}', 'a:0:{}')));
                }else{
                    $utilisateurs = $em->getRepository("AppBundle:Utilisateur")->findBy(array('enabled' => false, 'roles' => array('a:1:{i:0;s:10:"ROLE_ADMIN";}', 'a:0:{}')));
                }
                
            }
        }
        
        
        return $this->render('administration/utilisateur/index.html.twig', array(
            'utilisateurs' => $utilisateurs,
        ));
    }
    
    /**
     * @Route("/administration/utilisateur/ajouter", name="admin_utilisateur_ajouter")
     */
    public function ajouterAction(Request $request)
    {
        $utilisateur = new Utilisateur();
        $form = $this->createForm(new UtilisateurType(), $utilisateur);
        
        if ($request->isMethod("POST")) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $confirmPwd = "";
                if($request->request->get('confirmpwd')){
                    $confirmPwd = $request->request->get('confirmpwd');
                }
                if($utilisateur->getPassword() != $confirmPwd){
                    $this->addFlash("info", "Les mots de passe ne corresponnd pas");
                    $url = $this->getRequest()->headers->get("referer");
                    return new RedirectResponse($url);
                }
                
                $em = $this->getDoctrine()->getManager();
                $roles = array("ROLE_USER");
                if ($request->request->get('type') != 'ROLE_USER') {
                    $roles[] = $request->request->get('type');
                }
                try {
                    $utilisateur->setRoles($roles);
                    $utilisateur->setPlainPassword($utilisateur->getPassword());
                    $em->persist($utilisateur);
                    $em->flush();

                    $this->addFlash("info", "Un nouvel utilisateur a été ajouté avec succès.");
                    return $this->redirect($this->generateUrl("admin_utilisateurs"));
                } catch (\Exception $exc) {
                    $this->addFlash("error", "Une erreur a été rencontrée : \n" .$exc->getMessage());
                }
            }
        }
        return $this->render('administration/utilisateur/ajouter.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    /**
     * @Route("/administration/utilisateur/{idUtilisateur}", name="admin_utilisateur_modifier")
     * @param integer $idUtilisateur
     * @param Request $request
     */
    public function modifierAction($idUtilisateur, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $utilisateur = $em->find("AppBundle:Utilisateur", $idUtilisateur);
        $oldPassword = $utilisateur->getPassword();
        $oldEnabled = $utilisateur->isEnabled();
        $form = $this->createForm(new UtilisateurType(), $utilisateur);
        
        if ($request->isMethod("POST")) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                if ($utilisateur->getPassword()) {
                    $confirmPwd = "";
                    if ($request->request->get('confirmpwd')) {
                        $confirmPwd = $request->request->get('confirmpwd');
                    }
                    if ($utilisateur->getPassword() != $confirmPwd) {
                        $this->addFlash("info", "Les mots de passe ne corresponnd pas");
                        $url = $this->getRequest()->headers->get("referer");
                        return new RedirectResponse($url);
                    }
                }
                $em = $this->getDoctrine()->getManager();
                $roles = array("ROLE_USER");
                if ($request->request->get('type') != 'ROLE_USER') {
                    $roles[] = $request->request->get('type');
                }
                try {
                    $utilisateur->setRoles($roles);
                    if ($utilisateur->getPassword()) {
                        $utilisateur->setPlainPassword($utilisateur->getPassword());
                    }
                    else {
                        $utilisateur->setPassword($oldPassword);
                    }
                    if (!$utilisateur->isEnabled()) {
                        $utilisateur->setEnabled($oldEnabled);
                    }
                    $em->persist($utilisateur);
                    $em->flush();

                    $this->addFlash("info", "Un utilisateur a été modifié avec succès.");
                    return $this->redirect($this->generateUrl("admin_utilisateurs"));
                } catch (\Exception $exc) {
                    $this->addFlash("error", "Une erreur a été rencontrée : \n" .$exc->getMessage());
                }
            }
        }
        
        return $this->render('administration/utilisateur/modifier.html.twig', array(
            'utilisateur' => $utilisateur,
            'form' => $form->createView(),
        ));
    }
    
    /**
     * @Route("/administration/utilisateur/{idUtilisateur}/supprimer", name="admin_utilisateur_supprimer")
     * @param integer $idUtilisateur
     * @return type
     */
    public function supprimerAction($idUtilisateur)
    {
        $em = $this->getDoctrine()->getManager();
        $utilisateur = $em->find("AppBundle:Utilisateur", $idUtilisateur);
        if ($utilisateur && $this->getUser()->getId() != $idUtilisateur) {
            try {
                //$em->remove($utilisateur);
                $utilisateur->setEnabled(false);
                $em->persist($utilisateur);
                $em->flush();
                
                $this->addFlash("info", "L'utilisateur a été desactivé avec succès.");
            } catch (\Exception $ex) {
                $this->addFlash("error", "Une erreur a été rencontrée : \n" .$ex->getMessage());
            }
        }
        else {
            $this->addFlash("error", "L'utilisateur est introuvable.");
        }
        return $this->redirect($this->generateUrl("admin_utilisateurs"));
    }
    
}
