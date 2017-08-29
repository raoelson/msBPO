<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        if (0 === strpos($pathinfo, '/administration')) {
            // admin_homepage
            if ($pathinfo === '/administration') {
                return array (  '_controller' => 'AppBundle\\Controller\\AdministrationController::indexAction',  '_route' => 'admin_homepage',);
            }

            if (0 === strpos($pathinfo, '/administration/referentiel/c')) {
                if (0 === strpos($pathinfo, '/administration/referentiel/ca')) {
                    if (0 === strpos($pathinfo, '/administration/referentiel/cabinet')) {
                        // admin_cabinets
                        if ($pathinfo === '/administration/referentiel/cabinets') {
                            return array (  '_controller' => 'AppBundle\\Controller\\CabinetController::indexAction',  '_route' => 'admin_cabinets',);
                        }

                        // admin_cabinet_ajouter
                        if ($pathinfo === '/administration/referentiel/cabinet/nouveau') {
                            return array (  '_controller' => 'AppBundle\\Controller\\CabinetController::ajouterAction',  '_route' => 'admin_cabinet_ajouter',);
                        }

                        // admin_cabinet_modifier
                        if (preg_match('#^/administration/referentiel/cabinet/(?P<idCabinet>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cabinet_modifier')), array (  '_controller' => 'AppBundle\\Controller\\CabinetController::modifierAction',));
                        }

                        // admin_cabinet_supprimer
                        if (preg_match('#^/administration/referentiel/cabinet/(?P<idCabinet>[^/]++)/supprimer$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cabinet_supprimer')), array (  '_controller' => 'AppBundle\\Controller\\CabinetController::supprimerAction',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/administration/referentiel/categorie')) {
                        // admin_categorie
                        if ($pathinfo === '/administration/referentiel/categorie') {
                            return array (  '_controller' => 'AppBundle\\Controller\\CategorieController::indexAction',  '_route' => 'admin_categorie',);
                        }

                        // admin_categorie_ajouter
                        if ($pathinfo === '/administration/referentiel/categorie/ajouter') {
                            return array (  '_controller' => 'AppBundle\\Controller\\CategorieController::ajouterAction',  '_route' => 'admin_categorie_ajouter',);
                        }

                        // admin_categorie_modifier
                        if (preg_match('#^/administration/referentiel/categorie/(?P<idCategorie>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_categorie_modifier')), array (  '_controller' => 'AppBundle\\Controller\\CategorieController::modifierAction',));
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/administration/referentiel/controle')) {
                    // admin_controles
                    if ($pathinfo === '/administration/referentiel/controles') {
                        return array (  '_controller' => 'AppBundle\\Controller\\ControleController::indexAction',  '_route' => 'admin_controles',);
                    }

                    // admin_controle_ajouter
                    if ($pathinfo === '/administration/referentiel/controle/ajouter') {
                        return array (  '_controller' => 'AppBundle\\Controller\\ControleController::ajouterAction',  '_route' => 'admin_controle_ajouter',);
                    }

                    // admin_controle_modifier
                    if (preg_match('#^/administration/referentiel/controle/(?P<idControle>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_controle_modifier')), array (  '_controller' => 'AppBundle\\Controller\\ControleController::modifierAction',));
                    }

                }

            }

        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        if (0 === strpos($pathinfo, '/administration/referentiel')) {
            if (0 === strpos($pathinfo, '/administration/referentiel/garage')) {
                // admin_garages
                if ($pathinfo === '/administration/referentiel/garages') {
                    return array (  '_controller' => 'AppBundle\\Controller\\GarageController::indexAction',  '_route' => 'admin_garages',);
                }

                // admin_garage_ajouter
                if ($pathinfo === '/administration/referentiel/garage/ajouter') {
                    return array (  '_controller' => 'AppBundle\\Controller\\GarageController::ajouterAction',  '_route' => 'admin_garage_ajouter',);
                }

                // admin_garage_modifier
                if (preg_match('#^/administration/referentiel/garage/(?P<idGarage>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_garage_modifier')), array (  '_controller' => 'AppBundle\\Controller\\GarageController::modifierAction',));
                }

            }

            if (0 === strpos($pathinfo, '/administration/referentiel/interlocuteur')) {
                // admin_interlocuteurs
                if ($pathinfo === '/administration/referentiel/interlocuteurs') {
                    return array (  '_controller' => 'AppBundle\\Controller\\InterlocuteurController::indexAction',  '_route' => 'admin_interlocuteurs',);
                }

                // admin_interlocuteur_ajouter
                if ($pathinfo === '/administration/referentiel/interlocuteur/ajouter') {
                    return array (  '_controller' => 'AppBundle\\Controller\\InterlocuteurController::ajouterAction',  '_route' => 'admin_interlocuteur_ajouter',);
                }

                // admin_interlocuteur_modifier
                if (preg_match('#^/administration/referentiel/interlocuteur/(?P<idInterlocuteur>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_interlocuteur_modifier')), array (  '_controller' => 'AppBundle\\Controller\\InterlocuteurController::modifierAction',));
                }

            }

        }

        // interlocuteur_document_json
        if ($pathinfo === '/interlocuteur/document.json') {
            return array (  '_controller' => 'AppBundle\\Controller\\InterlocuteurController::listerDocumentAction',  '_route' => 'interlocuteur_document_json',);
        }

        if (0 === strpos($pathinfo, '/administration/referentiel/statut')) {
            // admin_statut
            if ($pathinfo === '/administration/referentiel/statut') {
                return array (  '_controller' => 'AppBundle\\Controller\\StatutController::indexAction',  '_route' => 'admin_statut',);
            }

            // admin_statut_ajouter
            if ($pathinfo === '/administration/referentiel/statut/ajouter') {
                return array (  '_controller' => 'AppBundle\\Controller\\StatutController::ajouterAction',  '_route' => 'admin_statut_ajouter',);
            }

            // admin_statut_modifier
            if (preg_match('#^/administration/referentiel/statut/(?P<idStatut>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_statut_modifier')), array (  '_controller' => 'AppBundle\\Controller\\StatutController::modifierAction',));
            }

        }

        if (0 === strpos($pathinfo, '/suivi')) {
            if (0 === strpos($pathinfo, '/suivi-appel-sortant')) {
                // suivi_appel_sortant
                if ($pathinfo === '/suivi-appel-sortant') {
                    return array (  '_controller' => 'AppBundle\\Controller\\SuiviAppelSortantController::indexAction',  '_route' => 'suivi_appel_sortant',);
                }

                // suivi_appelsortant_save
                if ($pathinfo === '/suivi-appel-sortant/enregistrer') {
                    return array (  '_controller' => 'AppBundle\\Controller\\SuiviAppelSortantController::enregistrerAction',  '_route' => 'suivi_appelsortant_save',);
                }

                // suivi_appel_sortant_garage_json
                if ($pathinfo === '/suivi-appel-sortant/garages.json') {
                    return array (  '_controller' => 'AppBundle\\Controller\\SuiviAppelSortantController::listerGaragesAction',  '_route' => 'suivi_appel_sortant_garage_json',);
                }

            }

            // suivi
            if ($pathinfo === '/suivi') {
                return array (  '_controller' => 'AppBundle\\Controller\\SuiviController::indexAction',  '_route' => 'suivi',);
            }

            // suivi_enregistrer
            if ($pathinfo === '/suivi/enregistrer') {
                return array (  '_controller' => 'AppBundle\\Controller\\SuiviController::enregistrerAction',  '_route' => 'suivi_enregistrer',);
            }

        }

        if (0 === strpos($pathinfo, '/administration')) {
            if (0 === strpos($pathinfo, '/administration/referentiel/t')) {
                if (0 === strpos($pathinfo, '/administration/referentiel/transmission')) {
                    // admin_transmissions
                    if ($pathinfo === '/administration/referentiel/transmissions') {
                        return array (  '_controller' => 'AppBundle\\Controller\\TransmissionController::indexAction',  '_route' => 'admin_transmissions',);
                    }

                    // admin_transmission_ajouter
                    if ($pathinfo === '/administration/referentiel/transmission/ajouter') {
                        return array (  '_controller' => 'AppBundle\\Controller\\TransmissionController::ajouterAction',  '_route' => 'admin_transmission_ajouter',);
                    }

                    // admin_transmission_modifier
                    if (preg_match('#^/administration/referentiel/transmission/(?P<idTransmission>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_transmission_modifier')), array (  '_controller' => 'AppBundle\\Controller\\TransmissionController::modifierAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/administration/referentiel/type-action')) {
                    // admin_typeactions
                    if ($pathinfo === '/administration/referentiel/type-actions') {
                        return array (  '_controller' => 'AppBundle\\Controller\\TypeActionController::indexAction',  '_route' => 'admin_typeactions',);
                    }

                    // admin_typeaction_ajouter
                    if ($pathinfo === '/administration/referentiel/type-action/ajouter') {
                        return array (  '_controller' => 'AppBundle\\Controller\\TypeActionController::ajouterAction',  '_route' => 'admin_typeaction_ajouter',);
                    }

                    // admin_typeaction_modifier
                    if (preg_match('#^/administration/referentiel/type\\-action/(?P<idTypeAction>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_typeaction_modifier')), array (  '_controller' => 'AppBundle\\Controller\\TypeActionController::modifierAction',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/administration/utilisateur')) {
                // admin_utilisateurs
                if ($pathinfo === '/administration/utilisateurs') {
                    return array (  '_controller' => 'AppBundle\\Controller\\UtilisateurController::indexAction',  '_route' => 'admin_utilisateurs',);
                }

                // admin_utilisateur_ajouter
                if ($pathinfo === '/administration/utilisateur/ajouter') {
                    return array (  '_controller' => 'AppBundle\\Controller\\UtilisateurController::ajouterAction',  '_route' => 'admin_utilisateur_ajouter',);
                }

                // admin_utilisateur_modifier
                if (preg_match('#^/administration/utilisateur/(?P<idUtilisateur>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_utilisateur_modifier')), array (  '_controller' => 'AppBundle\\Controller\\UtilisateurController::modifierAction',));
                }

                // admin_utilisateur_supprimer
                if (preg_match('#^/administration/utilisateur/(?P<idUtilisateur>[^/]++)/supprimer$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_utilisateur_supprimer')), array (  '_controller' => 'AppBundle\\Controller\\UtilisateurController::supprimerAction',));
                }

            }

        }

        // validation
        if ($pathinfo === '/validation') {
            return array (  '_controller' => 'AppBundle\\Controller\\ValidationController::indexAction',  '_route' => 'validation',);
        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_security_login;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }
                not_fos_user_security_login:

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_security_logout;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }
            not_fos_user_security_logout:

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_profile_edit;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }
            not_fos_user_profile_edit:

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_registration_register;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }
                not_fos_user_registration_register:

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
