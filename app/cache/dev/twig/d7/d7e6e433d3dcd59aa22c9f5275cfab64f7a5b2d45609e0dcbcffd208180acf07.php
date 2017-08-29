<?php

/* suiviappelsortant/index.html.twig */
class __TwigTemplate_8c835ce9e6f8142fc7dd22a6fb7055b2841d2947c4014362eecc8e3ecc719c01 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::front.html.twig", "suiviappelsortant/index.html.twig", 1);
        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'contenu' => array($this, 'block_contenu'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::front.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_49ec107db244682fcb3d2d69f0f6b4a1b019830f3fd3d808cea94589fbc02b89 = $this->env->getExtension("native_profiler");
        $__internal_49ec107db244682fcb3d2d69f0f6b4a1b019830f3fd3d808cea94589fbc02b89->enter($__internal_49ec107db244682fcb3d2d69f0f6b4a1b019830f3fd3d808cea94589fbc02b89_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "suiviappelsortant/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_49ec107db244682fcb3d2d69f0f6b4a1b019830f3fd3d808cea94589fbc02b89->leave($__internal_49ec107db244682fcb3d2d69f0f6b4a1b019830f3fd3d808cea94589fbc02b89_prof);

    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_a667c765c413771b6f32ebfc0c87ccd1e708660ab0f6946fabc6bc316336f522 = $this->env->getExtension("native_profiler");
        $__internal_a667c765c413771b6f32ebfc0c87ccd1e708660ab0f6946fabc6bc316336f522->enter($__internal_a667c765c413771b6f32ebfc0c87ccd1e708660ab0f6946fabc6bc316336f522_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 4
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/suivi/css/style.css"), "html", null, true);
        echo "\" type=\"text/css\" />
    <link rel=\"stylesheet\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/select2/select2.css"), "html", null, true);
        echo "\" type=\"text/css\" />
    <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/jquery/css/jquery-ui.css"), "html", null, true);
        echo "\" type=\"text/css\" />
";
        
        $__internal_a667c765c413771b6f32ebfc0c87ccd1e708660ab0f6946fabc6bc316336f522->leave($__internal_a667c765c413771b6f32ebfc0c87ccd1e708660ab0f6946fabc6bc316336f522_prof);

    }

    // line 10
    public function block_contenu($context, array $blocks = array())
    {
        $__internal_9f1bc9ffd19dc02a469c3beddc9d8a0370f852b086ad6c6fbac3fa2b9acdba7c = $this->env->getExtension("native_profiler");
        $__internal_9f1bc9ffd19dc02a469c3beddc9d8a0370f852b086ad6c6fbac3fa2b9acdba7c->enter($__internal_9f1bc9ffd19dc02a469c3beddc9d8a0370f852b086ad6c6fbac3fa2b9acdba7c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "contenu"));

        // line 11
        echo "    ";
        $this->displayParentBlock("contenu", $context, $blocks);
        echo "
    ";
        // line 12
        $context["idJournee"] = 0;
        // line 13
        echo "    ";
        $context["hasCurrentUser"] = 0;
        // line 14
        echo "    ";
        $context["hasOtherUser"] = 0;
        // line 15
        echo "    ";
        $context["allValidated"] = 1;
        // line 16
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["operations"]) ? $context["operations"] : $this->getContext($context, "operations")));
        foreach ($context['_seq'] as $context["_key"] => $context["operation"]) {
            // line 17
            echo "        ";
            if ((($this->getAttribute($this->getAttribute($context["operation"], "operateur", array()), "id", array()) && ($this->getAttribute($this->getAttribute($context["operation"], "operateur", array()), "id", array()) == $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "id", array()))) && ($this->getAttribute($this->getAttribute(            // line 18
$context["operation"], "journee", array()), "dateOperation", array()) == twig_date_format_filter($this->env, "now", "Y-m-d H:i:s")))) {
                // line 19
                echo "            ";
                $context["idJournee"] = $this->getAttribute($this->getAttribute($context["operation"], "journee", array()), "id", array());
                // line 20
                echo "        ";
            } else {
                // line 21
                echo "            ";
                $context["idJournee"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["operations"]) ? $context["operations"] : $this->getContext($context, "operations")), 0, array(), "array"), "journee", array()), "id", array());
                // line 22
                echo "        ";
            }
            // line 23
            echo "            
        ";
            // line 24
            if (($this->getAttribute($this->getAttribute($context["operation"], "operateur", array()), "id", array()) != $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "id", array()))) {
                // line 25
                echo "            ";
                $context["hasOtherUser"] = 1;
                // line 26
                echo "            ";
                if ( !$this->getAttribute($context["operation"], "controle", array())) {
                    // line 27
                    echo "                ";
                    $context["allValidated"] = 0;
                    // line 28
                    echo "            ";
                }
                // line 29
                echo "        ";
            }
            // line 30
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['operation'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "    ";
        // line 34
        echo "    <h1>
        Expertise Auto ";
        // line 35
        if (((isset($context["idJournee"]) ? $context["idJournee"] : $this->getContext($context, "idJournee")) > 0)) {
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["operations"]) ? $context["operations"] : $this->getContext($context, "operations")), 0, array(), "array"), "journee", array()), "dateOperation", array()), "d/m/Y"), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "d/m/Y"), "html", null, true);
        }
        // line 36
        echo "    </h1>
    <form name=\"suiviappelsortant\" method=\"POST\">
        <input type=\"hidden\" name=\"idJournee\" class=\"idJournee\" value=\"";
        // line 38
        echo twig_escape_filter($this->env, (isset($context["idJournee"]) ? $context["idJournee"] : $this->getContext($context, "idJournee")), "html", null, true);
        echo "\" />
        <div class=\"filtre form-inline\">
            <input type=\"text\" id=\"filtre_date\" name=\"filtre_date\" class=\"form-control input-sm\" placeholder=\"Date des opérations\" value=\"";
        // line 40
        if ($this->getAttribute((isset($context["filtre"]) ? $context["filtre"] : null), "date", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["filtre"]) ? $context["filtre"] : $this->getContext($context, "filtre")), "date", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "d/m/Y"), "html", null, true);
        }
        echo "\" />
            <select name=\"filtre_agent\" class=\"form-control input-sm\" placeholder=\"Agent\">
                <option value=\"0\">Sélectionner un agent</option>
                ";
        // line 43
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["agents"]) ? $context["agents"] : $this->getContext($context, "agents")));
        foreach ($context['_seq'] as $context["_key"] => $context["agent"]) {
            // line 44
            echo "                    ";
            if ( !$this->getAttribute($context["agent"], "hasRole", array(0 => "ROLE_SUPER_ADMIN"), "method")) {
                // line 45
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["agent"], "id", array()), "html", null, true);
                echo "\"";
                if (($this->getAttribute((isset($context["filtre"]) ? $context["filtre"] : null), "agent", array(), "any", true, true) && ($this->getAttribute((isset($context["filtre"]) ? $context["filtre"] : $this->getContext($context, "filtre")), "agent", array()) == $this->getAttribute($context["agent"], "id", array())))) {
                    echo " selected=\"selected\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["agent"], "username", array()), "html", null, true);
                echo "</option>
                    ";
            }
            // line 47
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['agent'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "            </select>
            ";
        // line 49
        if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "hasRole", array(0 => "ROLE_ADMIN"), "method") || $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "hasRole", array(0 => "ROLE_SUPER_ADMIN"), "method"))) {
            // line 50
            echo "                <select name=\"filtre_cabinet\" class=\"form-control input-sm\" placeholder=\"Cabinet\">
                    <option value=\"0\">Sélectionner un cabinet</option>
                    ";
            // line 52
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["cabinets"]) ? $context["cabinets"] : $this->getContext($context, "cabinets")));
            foreach ($context['_seq'] as $context["_key"] => $context["cabinet"]) {
                // line 53
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["cabinet"], "id", array()), "html", null, true);
                echo "\"";
                if (($this->getAttribute((isset($context["filtre"]) ? $context["filtre"] : null), "cabinet", array(), "any", true, true) && ($this->getAttribute((isset($context["filtre"]) ? $context["filtre"] : $this->getContext($context, "filtre")), "cabinet", array()) == $this->getAttribute($context["cabinet"], "id", array())))) {
                    echo " selected=\"selected\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, (($this->getAttribute($context["cabinet"], "numero", array()) . " - ") . $this->getAttribute($context["cabinet"], "nom", array())), "html", null, true);
                echo "</option>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cabinet'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 55
            echo "                </select>
                <select name=\"filtre_garage\" class=\"form-control input-sm\" placeholder=\"Garage\">
                    <option value=\"0\">Sélectionner un garage</option>
                    ";
            // line 58
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["garages"]) ? $context["garages"] : $this->getContext($context, "garages")));
            foreach ($context['_seq'] as $context["_key"] => $context["garage"]) {
                // line 59
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["garage"], "id", array()), "html", null, true);
                echo "\"";
                if (($this->getAttribute((isset($context["filtre"]) ? $context["filtre"] : null), "garage", array(), "any", true, true) && ($this->getAttribute((isset($context["filtre"]) ? $context["filtre"] : $this->getContext($context, "filtre")), "garage", array()) == $this->getAttribute($context["garage"], "id", array())))) {
                    echo " selected=\"selected\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["garage"], "libelle", array()), "html", null, true);
                echo "</option>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['garage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 61
            echo "                </select>
            ";
        }
        // line 63
        echo "            <button name=\"filtrer_journee\" type=\"submit\" class=\"filtrer btn btn-default btn-sm\" title=\"Filtrer\" value=\"3\">
                <span class=\"glyphicon glyphicon-filter\" aria-hidden=\"true\"></span>
                Rechercher
            </button>
            <button name=\"reinitialiser_filtre\" type=\"submit\" class=\"reinitialiser btn btn-default btn-sm\" title=\"Réinitialiser\" value=\"4\">
                <span class=\"glyphicon glyphicon-refresh\" aria-hidden=\"true\"></span>
            </button>
        </div>
        <hr />
        ";
        // line 72
        if ((((isset($context["idJournee"]) ? $context["idJournee"] : $this->getContext($context, "idJournee")) > 0) && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["operations"]) ? $context["operations"] : $this->getContext($context, "operations")), 0, array(), "array"), "journee", array()), "validationDemandee", array()))) {
            // line 73
            echo "            <em>[En attente de validation]</em>
        ";
        }
        // line 75
        echo "        <table class=\"table table-bordered table-condensed table-striped\">
            <thead>
                <tr>
                    <th width=\"210\">Type d'action</th>
                    <th width=\"120\">Date de réception</th>
                    <th width=\"110\">N° de Dossier</th>
                    <th>Cabinet</th>
                    <th width=\"120\">Catégorie</th>
                    <th width=\"110\">Statut</th>
                    <th>Garage</th>
                    <th width=\"100\">Date Heure</th>
                    <th>Transmission</th> 
                    <th colspan=\"2\" class=\"text-center\">Action</th> 
                    ";
        // line 88
        if (((isset($context["hasOtherUser"]) ? $context["hasOtherUser"] : $this->getContext($context, "hasOtherUser")) > 0)) {
            // line 89
            echo "                        <th>Contrôle</th> 
                        <th width=\"100\">Process</th> 
                        <th></th> 
                    ";
        }
        // line 93
        echo "                </tr>
            </thead>
            <tbody>
                ";
        // line 96
        if ((((isset($context["idJournee"]) ? $context["idJournee"] : $this->getContext($context, "idJournee")) == 0) ||  !$this->getAttribute($this->getAttribute($this->getAttribute((isset($context["operations"]) ? $context["operations"] : $this->getContext($context, "operations")), 0, array(), "array"), "journee", array()), "validationDemandee", array()))) {
            // line 97
            echo "                    <tr>
                        <td>
                            <select name=\"typeAction\" class=\"typeAction form-control input-sm\">
                                ";
            // line 100
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["typeActions"]) ? $context["typeActions"] : $this->getContext($context, "typeActions")));
            foreach ($context['_seq'] as $context["_key"] => $context["typeAction"]) {
                // line 101
                echo "                                    <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["typeAction"], "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["typeAction"], "libelle", array()), "html", null, true);
                echo "</option>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['typeAction'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 103
            echo "                            </select>
                        </td>
                        <td>
                            <input id=\"jourReception\" type=\"text\" name=\"jourReception\" class=\"form-control input-sm\" value=\"";
            // line 106
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "d/m/Y"), "html", null, true);
            echo "\" placeholder=\"jj/mm/aaaa\" required=\"true\"/>
                        </td>
                        <td>
                            <input type=\"text\" name=\"numDossier\" class=\"numDossier form-control input-sm\" placeholder=\"N° de Dossier\" value=\"\" required=\"true\"/>
                            <input type=\"hidden\" name=\"idCabinet\" class=\"idCabinet\" value=\"\" />
                        </td>
                        <td class=\"cabinetInfos\">
                            <p class=\"form-control-static\">-</p>
                        </td>
                        <td>
                            <select name=\"categorie\" class=\"categorie form-control input-sm\" required=\"true\">
                                <option value=\"0\"></option>
                                ";
            // line 118
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : $this->getContext($context, "categories")));
            foreach ($context['_seq'] as $context["_key"] => $context["categorie"]) {
                // line 119
                echo "                                    <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["categorie"], "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["categorie"], "libelle", array()), "html", null, true);
                echo "</option>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['categorie'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 121
            echo "                            </select>
                        </td>
                        <td>
                            <select name=\"statut\" class=\"statut form-control input-sm\" required=\"true\">
                                <option value=\"0\"></option>
                                ";
            // line 126
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["statuts"]) ? $context["statuts"] : $this->getContext($context, "statuts")));
            foreach ($context['_seq'] as $context["_key"] => $context["statut"]) {
                // line 127
                echo "                                    <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["statut"], "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["statut"], "libelle", array()), "html", null, true);
                echo "</option>   
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['statut'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 129
            echo "                            </select>
                        </td>
                        <td>
                            <input type=\"text\" name=\"garage\" class=\"garage form-control input-sm\" required=\"true\"/>
                            <input type=\"hidden\" name=\"idGarage\" class=\"idgarage\" value=\"0\" />
                        </td>
                        <td></td>
                        <td>
                            <select name=\"transmission\" class=\"transmission form-control input-sm\" required=\"true\">
                                <option value=\"\"></option>
                                ";
            // line 139
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["transmissions"]) ? $context["transmissions"] : $this->getContext($context, "transmissions")));
            foreach ($context['_seq'] as $context["_key"] => $context["transmission"]) {
                // line 140
                echo "                                    <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["transmission"], "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["transmission"], "libelle", array()), "html", null, true);
                echo "</option>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['transmission'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 141
            echo "  
                            </select>
                        </td> 
                        <td class=\"box text-center\" width=\"50\">
                            <button type=\"button\" class=\"comment btn btn-default btn-sm\" title=\"Commenter\">
                                <span class=\"glyphicon glyphicon-comment\" aria-hidden=\"true\"></span>
                            </button>
                            <span class=\"textAFloat hidden text-left\" role=\"box\">
                                <strong>Commentaire</strong>
                                <button type=\"button\" class=\"close\" data-dismiss=\"box\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                                <textarea name=\"commentaireOperation\" class=\"commentaireOperation form-control\" required=\"true\"></textarea>
                            </span>
                        </td> 
                        <td class=\"text-center\" width=\"50\">
                            <button type=\"button\" class=\"save btn btn-primary btn-sm\" title=\"Enregistrer\">
                                <span class=\"glyphicon glyphicon-floppy-save\" aria-hidden=\"true\"></span>
                            </button>
                        </td> 
                        ";
            // line 159
            if (((isset($context["hasOtherUser"]) ? $context["hasOtherUser"] : $this->getContext($context, "hasOtherUser")) > 0)) {
                // line 160
                echo "                        <td colspan=\"3\"></td>
                        ";
            }
            // line 162
            echo "                    </tr>
                ";
        }
        // line 164
        echo "                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["operations"]) ? $context["operations"] : $this->getContext($context, "operations")));
        foreach ($context['_seq'] as $context["_key"] => $context["operation"]) {
            // line 165
            echo "                    <tr>
                        <td>
                            <p class=\"form-control-static\">";
            // line 167
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["operation"], "typeAction", array()), "libelle", array()), "html", null, true);
            echo "</p>
                            <input type=\"hidden\" name=\"idOperation\" value=\"";
            // line 168
            echo twig_escape_filter($this->env, $this->getAttribute($context["operation"], "id", array()), "html", null, true);
            echo "\" />
                        </td>
                        <td><p class=\"form-control-static text-center\">";
            // line 170
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["operation"], "dateReception", array()), "d/m/Y"), "html", null, true);
            echo "</p></td>
                        <td>
                            <input type=\"hidden\" name=\"idOperation\" class=\"idOperation\" value=\"";
            // line 172
            echo twig_escape_filter($this->env, $this->getAttribute($context["operation"], "id", array()), "html", null, true);
            echo "\" />
                            <p class=\"form-control-static\">";
            // line 173
            echo twig_escape_filter($this->env, $this->getAttribute($context["operation"], "numeroDossier", array()), "html", null, true);
            echo "</p>
                        </td>
                        <td class=\"cabinetInfos\"><p class=\"form-control-static\">";
            // line 175
            if ($this->getAttribute($context["operation"], "cabinet", array())) {
                echo "<a href=\"javascript:void(0);\" data-cabinet=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["operation"], "cabinet", array()), "numero", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["operation"], "cabinet", array()), "nom", array()), "html", null, true);
                echo "</a>";
            } else {
                echo "-";
            }
            echo "</p></td>
                        <td><p class=\"form-control-static\">";
            // line 176
            if ($this->getAttribute($context["operation"], "categorieAppel", array())) {
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["operation"], "categorieAppel", array()), "libelle", array()), "html", null, true);
                echo " ";
            } else {
                echo "-";
            }
            echo "</p></td>
                        <td>
                            <select name='operation[";
            // line 178
            echo twig_escape_filter($this->env, $this->getAttribute($context["operation"], "id", array()), "html", null, true);
            echo "][statutOperation]' class=\"statutOperation form-control input-sm\">
                                ";
            // line 179
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["operation"], "typeAction", array()), "statuts", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["statut"]) {
                // line 180
                echo "                                    ";
                if (($this->getAttribute($context["operation"], "categorieAppel", array()) && (twig_lower_filter($this->env, $this->getAttribute($this->getAttribute($context["operation"], "categorieAppel", array()), "libelle", array())) == "autre"))) {
                    // line 181
                    echo "                                        ";
                    if ((twig_lower_filter($this->env, $this->getAttribute($context["statut"], "libelle", array())) == "hors proces")) {
                        // line 182
                        echo "                                            <option value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["statut"], "id", array()), "html", null, true);
                        echo "\" selected=\"selected\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["statut"], "libelle", array()), "html", null, true);
                        echo "</option>
                                        ";
                    }
                    // line 184
                    echo "                                    ";
                } else {
                    // line 185
                    echo "                                        <option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["statut"], "id", array()), "html", null, true);
                    echo "\" ";
                    if (($this->getAttribute($this->getAttribute($context["operation"], "statut", array()), "id", array()) == $this->getAttribute($context["statut"], "id", array()))) {
                        echo "selected=\"selected\"";
                    }
                    echo ">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["statut"], "libelle", array()), "html", null, true);
                    echo "</option>
                                    ";
                }
                // line 187
                echo "                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['statut'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 188
            echo "                            </select>
                        </td>
                        <td><p class=\"form-control-static\">";
            // line 190
            if ($this->getAttribute($context["operation"], "garage", array())) {
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["operation"], "garage", array()), "libelle", array()), "html", null, true);
            } else {
                echo "-";
            }
            echo "</p></td>
                        <td><p class=\"form-control-static text-center\">";
            // line 191
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["operation"], "dateHeureTraitement", array()), "d/m/Y H:i:s"), "html", null, true);
            echo "</p></td>
                        <td><p class=\"form-control-static\">";
            // line 192
            if ($this->getAttribute($context["operation"], "transmission", array())) {
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["operation"], "transmission", array()), "libelle", array()), "html", null, true);
            } else {
                echo "-";
            }
            echo "</p></td>
                        
                    ";
            // line 194
            if (($this->getAttribute($this->getAttribute($context["operation"], "operateur", array()), "id", array()) != $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "id", array()))) {
                // line 195
                echo "                        <input type=\"hidden\" name=\"operation[";
                echo twig_escape_filter($this->env, $this->getAttribute($context["operation"], "id", array()), "html", null, true);
                echo "][id]\" class=\"idOperation\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["operation"], "id", array()), "html", null, true);
                echo "\" />
                        <input type=\"hidden\" name=\"operation[";
                // line 196
                echo twig_escape_filter($this->env, $this->getAttribute($context["operation"], "id", array()), "html", null, true);
                echo "][journee]\" class=\"idJournee\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["operation"], "journee", array()), "id", array()), "html", null, true);
                echo "\" />
                        <td>
                            ";
                // line 198
                if (twig_length_filter($this->env, $this->getAttribute($context["operation"], "commentaireOperation", array()))) {
                    // line 199
                    echo "                                <p class=\"form-control-static text-center\">
                                    <a class=\"comment text-success\" role=\"button\" data-toggle=\"popover\" data-trigger=\"focus hover\" title=\"Commentaire\" data-html=\"true\" data-content=\"";
                    // line 200
                    echo nl2br(twig_escape_filter($this->env, $this->getAttribute($context["operation"], "commentaireOperation", array()), "html", null, true));
                    echo "\" data-placement=\"left\">
                                        <span class=\"glyphicon glyphicon-comment\" aria-hidden=\"true\"></span>
                                    </a>
                                </p>
                            ";
                }
                // line 205
                echo "                        </td>
                        <td></td>
                        <td>
                            ";
                // line 208
                $context["toggleEnable"] = "";
                // line 209
                echo "                            ";
                if ($this->getAttribute($context["operation"], "controle", array())) {
                    // line 210
                    echo "                                ";
                    $context["toggleEnable"] = "disabled";
                    // line 211
                    echo "                            ";
                }
                // line 212
                echo "                            ";
                if (((isset($context["toggleEnable"]) ? $context["toggleEnable"] : $this->getContext($context, "toggleEnable")) != "")) {
                    // line 213
                    echo "                                <input type=\"hidden\" name=\"operation[";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["operation"], "id", array()), "html", null, true);
                    echo "][controle]\"  value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["operation"], "controle", array()), "id", array()), "html", null, true);
                    echo "\" />
                                <input type=\"hidden\" name=\"operation[";
                    // line 214
                    echo twig_escape_filter($this->env, $this->getAttribute($context["operation"], "id", array()), "html", null, true);
                    echo "][process]\" value=\"";
                    if (twig_length_filter($this->env, $this->getAttribute($context["operation"], "process", array()))) {
                        echo nl2br($this->getAttribute($context["operation"], "process", array()));
                    }
                    echo "\" />
                                <input type=\"hidden\" name=\"operation[";
                    // line 215
                    echo twig_escape_filter($this->env, $this->getAttribute($context["operation"], "id", array()), "html", null, true);
                    echo "][commentaireCtrl]\" value=\"";
                    if (twig_length_filter($this->env, $this->getAttribute($context["operation"], "commentaireControle", array()))) {
                        echo nl2br($this->getAttribute($context["operation"], "commentaireControle", array()));
                    }
                    echo "\" />
                            ";
                }
                // line 217
                echo "                            <select name='operation[";
                echo twig_escape_filter($this->env, $this->getAttribute($context["operation"], "id", array()), "html", null, true);
                echo "][controle]' ";
                echo twig_escape_filter($this->env, (isset($context["toggleEnable"]) ? $context["toggleEnable"] : $this->getContext($context, "toggleEnable")), "html", null, true);
                echo " class=\"form-control input-sm\">
                                ";
                // line 218
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["controles"]) ? $context["controles"] : $this->getContext($context, "controles")));
                foreach ($context['_seq'] as $context["_key"] => $context["controle"]) {
                    // line 219
                    echo "                                    ";
                    if ($this->getAttribute($context["operation"], "controle", array())) {
                        // line 220
                        echo "                                        ";
                        if (($this->getAttribute($this->getAttribute($context["operation"], "controle", array()), "id", array()) == $this->getAttribute($context["controle"], "id", array()))) {
                            // line 221
                            echo "                                            <option selected value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["controle"], "id", array()), "html", null, true);
                            echo "\" >";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["controle"], "libelle", array()), "html", null, true);
                            echo "</option>
                                        ";
                        }
                        // line 223
                        echo "                                    ";
                    } else {
                        // line 224
                        echo "                                        <option value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["controle"], "id", array()), "html", null, true);
                        echo "\" >";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["controle"], "libelle", array()), "html", null, true);
                        echo "</option>
                                    ";
                    }
                    // line 225
                    echo "    
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['controle'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 227
                echo "                            </select>
                        </td>
                        <td>
                            <textarea ";
                // line 230
                echo twig_escape_filter($this->env, (isset($context["toggleEnable"]) ? $context["toggleEnable"] : $this->getContext($context, "toggleEnable")), "html", null, true);
                echo " name=\"operation[";
                echo twig_escape_filter($this->env, $this->getAttribute($context["operation"], "id", array()), "html", null, true);
                echo "][process]\" class=\"process form-control\">";
                if (twig_length_filter($this->env, $this->getAttribute($context["operation"], "process", array()))) {
                    echo nl2br($this->getAttribute($context["operation"], "process", array()));
                }
                echo "</textarea>
                        </td>
                        <td class=\"box text-center\">
                            <button type=\"button\" class=\"commentctrl btn btn-default btn-sm\" title=\"Commenter\">
                                <span class=\"glyphicon glyphicon-comment\" aria-hidden=\"true\"></span>
                            </button>
                            <span class=\"textAFloat hidden text-left\" role=\"box\">
                                <strong>Commentaire</strong>
                                <button type=\"button\" class=\"close\" data-dismiss=\"box\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                                <textarea ";
                // line 239
                echo twig_escape_filter($this->env, (isset($context["toggleEnable"]) ? $context["toggleEnable"] : $this->getContext($context, "toggleEnable")), "html", null, true);
                echo " name=\"operation[";
                echo twig_escape_filter($this->env, $this->getAttribute($context["operation"], "id", array()), "html", null, true);
                echo "][commentaireCtrl]\" class=\"commentaireCtrl form-control\">";
                if (twig_length_filter($this->env, $this->getAttribute($context["operation"], "commentaireControle", array()))) {
                    echo nl2br($this->getAttribute($context["operation"], "commentaireControle", array()));
                }
                echo "</textarea>
                            </span>
                        </td>
                    ";
            } else {
                // line 243
                echo "                        ";
                $context["hasCurrentUser"] = 1;
                // line 244
                echo "                        <td class=\"box text-center\">
                            <button type=\"button\" class=\"comment btn btn-";
                // line 245
                if (twig_length_filter($this->env, $this->getAttribute($context["operation"], "commentaireOperation", array()))) {
                    echo "success";
                } else {
                    echo "default";
                }
                echo " btn-sm\" title=\"Commenter\">
                                <span class=\"glyphicon glyphicon-comment\" aria-hidden=\"true\"></span>
                            </button>
                            <span class=\"textAFloat hidden text-left\" role=\"box\">
                                <strong>Commentaire</strong>
                                <button type=\"button\" class=\"close\" data-dismiss=\"box\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                                <textarea name=\"commentaireOperation\" class=\"commentaireOperation form-control\"></textarea>
                                ";
                // line 252
                if (twig_length_filter($this->env, $this->getAttribute($context["operation"], "commentaireOperation", array()))) {
                    // line 253
                    echo "                                    <span>";
                    echo nl2br($this->getAttribute($context["operation"], "commentaireOperation", array()));
                    echo "</span>
                                ";
                }
                // line 255
                echo "                            </span>
                        </td>
                        <td class=\"text-center\">
                            <button type=\"button\" class=\"save-modif btn btn-default btn-sm\" title=\"Enregistrer\">
                                <span class=\"glyphicon glyphicon-floppy-disk\" aria-hidden=\"true\"></span>
                                <span class=\"glyphicon glyphicon-\" aria-hidden=\"true\"></span>
                            </button>
                        </td>
                        ";
                // line 263
                if (((isset($context["hasOtherUser"]) ? $context["hasOtherUser"] : $this->getContext($context, "hasOtherUser")) > 0)) {
                    // line 264
                    echo "                        <td colspan=\"3\"></td>
                        ";
                }
                // line 266
                echo "                    ";
            }
            // line 267
            echo "                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['operation'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 269
        echo "            </tbody>
        </table>
        <div class=\"text-right\">
            ";
        // line 272
        if (((((isset($context["idJournee"]) ? $context["idJournee"] : $this->getContext($context, "idJournee")) > 0) &&  !$this->getAttribute($this->getAttribute($this->getAttribute((isset($context["operations"]) ? $context["operations"] : $this->getContext($context, "operations")), 0, array(), "array"), "journee", array()), "validationDemandee", array())) && ((isset($context["hasCurrentUser"]) ? $context["hasCurrentUser"] : $this->getContext($context, "hasCurrentUser")) > 0))) {
            // line 273
            echo "                <button name=\"valider_journee\" type=\"submit\" class=\"demander_validation btn btn-success btn-sm\" title=\"Demander validation\" value=\"1\">
                    <span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>
                    Valider ma journée
                </button>
            ";
        }
        // line 278
        echo "            ";
        if (((isset($context["idJournee"]) ? $context["idJournee"] : $this->getContext($context, "idJournee")) > 0)) {
            // line 279
            echo "                ";
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "hasRole", array(0 => "ROLE_ADMIN"), "method") || $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "hasRole", array(0 => "ROLE_SUPER_ADMIN"), "method"))) {
                // line 280
                echo "                <button name=\"exporter_journee\" type=\"submit\" class=\"exporter btn btn-info btn-sm\" title=\"Exporter\" value=\"2\">
                    <span class=\"glyphicon glyphicon-export\" aria-hidden=\"true\"></span>
                    Exporter
                </button>
                ";
            }
            // line 285
            echo "            ";
        }
        // line 286
        echo "            ";
        if ((((isset($context["hasOtherUser"]) ? $context["hasOtherUser"] : $this->getContext($context, "hasOtherUser")) > 0) && ((isset($context["allValidated"]) ? $context["allValidated"] : $this->getContext($context, "allValidated")) == 0))) {
            // line 287
            echo "                <button name=\"valider_controles\" type=\"submit\" class=\"valider_controles btn btn-success btn-sm\" title=\"Valider les contrôles\" value=\"3\">
                    <span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>
                    Valider les contrôles
                </button>
            ";
        }
        // line 292
        echo "            
        </div>
    </form>
    <div class=\"associations hidden\">
        <div id=\"ref_type_action_categorie\">
            ";
        // line 297
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["typeActions"]) ? $context["typeActions"] : $this->getContext($context, "typeActions")));
        foreach ($context['_seq'] as $context["_key"] => $context["typeAction"]) {
            // line 298
            echo "                <p id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["typeAction"], "id", array()), "html", null, true);
            echo "\">";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["typeAction"], "categories", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["categorie"]) {
                if ( !$this->getAttribute($context["loop"], "first", array())) {
                    echo "_";
                }
                echo twig_escape_filter($this->env, $this->getAttribute($context["categorie"], "id", array()), "html", null, true);
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['categorie'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "</p>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['typeAction'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 300
        echo "        </div>
        <div id=\"ref_type_action_statut\">
            ";
        // line 302
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["typeActions"]) ? $context["typeActions"] : $this->getContext($context, "typeActions")));
        foreach ($context['_seq'] as $context["_key"] => $context["typeAction"]) {
            // line 303
            echo "                <p id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["typeAction"], "id", array()), "html", null, true);
            echo "\">";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["typeAction"], "statuts", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["statut"]) {
                if ( !$this->getAttribute($context["loop"], "first", array())) {
                    echo "_";
                }
                echo twig_escape_filter($this->env, $this->getAttribute($context["statut"], "id", array()), "html", null, true);
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['statut'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "</p>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['typeAction'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 305
        echo "        </div>
        <div id=\"ref_cabinets\">
            ";
        // line 307
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cabinets"]) ? $context["cabinets"] : $this->getContext($context, "cabinets")));
        foreach ($context['_seq'] as $context["_key"] => $context["cabinet"]) {
            // line 308
            echo "                <p id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["cabinet"], "numero", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["cabinet"], "datas", array()), "html", null, true);
            echo "</p>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cabinet'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 310
        echo "        </div>
        <div id=\"ref_garages\">
            ";
        // line 312
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["garages"]) ? $context["garages"] : $this->getContext($context, "garages")));
        foreach ($context['_seq'] as $context["_key"] => $context["garage"]) {
            // line 313
            echo "                <p id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["garage"], "libelle", array()), "html", null, true);
            echo "\" data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["garage"], "id", array()), "html", null, true);
            echo "\"></p>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['garage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 315
        echo "        </div>
    </div>
<div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h4 class=\"modal-title\" id=\"myModalLabel\">Boîte de dialogue</h4>
            </div>
            <div class=\"modal-body\">
                <label>Veuillez remplir les champs vides svp!</label>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Fermer</button>
            </div>
        </div>
    </div>
</div>
            
";
        
        $__internal_9f1bc9ffd19dc02a469c3beddc9d8a0370f852b086ad6c6fbac3fa2b9acdba7c->leave($__internal_9f1bc9ffd19dc02a469c3beddc9d8a0370f852b086ad6c6fbac3fa2b9acdba7c_prof);

    }

    // line 335
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_1292b24179f6d5ec6e07eab242d2e43804e9128893243242942b536f1ebb1e91 = $this->env->getExtension("native_profiler");
        $__internal_1292b24179f6d5ec6e07eab242d2e43804e9128893243242942b536f1ebb1e91->enter($__internal_1292b24179f6d5ec6e07eab242d2e43804e9128893243242942b536f1ebb1e91_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 336
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script type=\"text/javascript\">
        var dataGarages = [];
        ";
        // line 339
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["garages"]) ? $context["garages"] : $this->getContext($context, "garages")));
        foreach ($context['_seq'] as $context["_key"] => $context["garage"]) {
            // line 340
            echo "            dataGarages.push(\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["garage"], "libelle", array()), "html", null, true);
            echo "\");
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['garage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 342
        echo "            var url_action = \"";
        echo $this->env->getExtension('routing')->getPath("suivi_appelsortant_save");
        echo "\";
            var url_liste = \"";
        // line 343
        echo $this->env->getExtension('routing')->getPath("suivi_appel_sortant");
        echo "\";
            var garagesJson = \"";
        // line 344
        echo $this->env->getExtension('routing')->getPath("suivi_appel_sortant_garage_json");
        echo "\";
    </script>
    <script src=\"";
        // line 346
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/jquery/jquery.maskedinput.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 347
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/typeahead/typeahead.jquery.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 348
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/typeahead/bloodhound.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 349
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/typeahead/typeahead.bundle.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 350
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/suivi/js/suiviappelsortant.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 351
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/jquery/jquery-ui.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
";
        
        $__internal_1292b24179f6d5ec6e07eab242d2e43804e9128893243242942b536f1ebb1e91->leave($__internal_1292b24179f6d5ec6e07eab242d2e43804e9128893243242942b536f1ebb1e91_prof);

    }

    public function getTemplateName()
    {
        return "suiviappelsortant/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1022 => 351,  1018 => 350,  1014 => 349,  1010 => 348,  1006 => 347,  1002 => 346,  997 => 344,  993 => 343,  988 => 342,  979 => 340,  975 => 339,  968 => 336,  962 => 335,  936 => 315,  925 => 313,  921 => 312,  917 => 310,  906 => 308,  902 => 307,  898 => 305,  856 => 303,  852 => 302,  848 => 300,  806 => 298,  802 => 297,  795 => 292,  788 => 287,  785 => 286,  782 => 285,  775 => 280,  772 => 279,  769 => 278,  762 => 273,  760 => 272,  755 => 269,  748 => 267,  745 => 266,  741 => 264,  739 => 263,  729 => 255,  723 => 253,  721 => 252,  707 => 245,  704 => 244,  701 => 243,  688 => 239,  670 => 230,  665 => 227,  658 => 225,  650 => 224,  647 => 223,  639 => 221,  636 => 220,  633 => 219,  629 => 218,  622 => 217,  613 => 215,  605 => 214,  598 => 213,  595 => 212,  592 => 211,  589 => 210,  586 => 209,  584 => 208,  579 => 205,  571 => 200,  568 => 199,  566 => 198,  559 => 196,  552 => 195,  550 => 194,  540 => 192,  536 => 191,  527 => 190,  523 => 188,  517 => 187,  505 => 185,  502 => 184,  494 => 182,  491 => 181,  488 => 180,  484 => 179,  480 => 178,  469 => 176,  457 => 175,  452 => 173,  448 => 172,  443 => 170,  438 => 168,  434 => 167,  430 => 165,  425 => 164,  421 => 162,  417 => 160,  415 => 159,  395 => 141,  384 => 140,  380 => 139,  368 => 129,  357 => 127,  353 => 126,  346 => 121,  335 => 119,  331 => 118,  316 => 106,  311 => 103,  300 => 101,  296 => 100,  291 => 97,  289 => 96,  284 => 93,  278 => 89,  276 => 88,  261 => 75,  257 => 73,  255 => 72,  244 => 63,  240 => 61,  225 => 59,  221 => 58,  216 => 55,  201 => 53,  197 => 52,  193 => 50,  191 => 49,  188 => 48,  182 => 47,  170 => 45,  167 => 44,  163 => 43,  153 => 40,  148 => 38,  144 => 36,  138 => 35,  135 => 34,  133 => 31,  127 => 30,  124 => 29,  121 => 28,  118 => 27,  115 => 26,  112 => 25,  110 => 24,  107 => 23,  104 => 22,  101 => 21,  98 => 20,  95 => 19,  93 => 18,  91 => 17,  86 => 16,  83 => 15,  80 => 14,  77 => 13,  75 => 12,  70 => 11,  64 => 10,  55 => 7,  51 => 6,  47 => 5,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '::front.html.twig' %}*/
/* */
/* {% block stylesheets %}*/
/*     {{ parent() }}*/
/*     <link rel="stylesheet" href="{{ asset('bundles/suivi/css/style.css') }}" type="text/css" />*/
/*     <link rel="stylesheet" href="{{ asset('bundles/select2/select2.css') }}" type="text/css" />*/
/*     <link rel="stylesheet" href="{{ asset('bundles/jquery/css/jquery-ui.css') }}" type="text/css" />*/
/* {% endblock %}*/
/* */
/* {% block contenu %}*/
/*     {{ parent() }}*/
/*     {% set idJournee = 0 %}*/
/*     {% set hasCurrentUser = 0 %}*/
/*     {% set hasOtherUser = 0 %}*/
/*     {% set allValidated = 1 %}*/
/*     {% for operation in operations %}*/
/*         {% if operation.operateur.id and operation.operateur.id == app.user.id and */
/* operation.journee.dateOperation == "now"|date('Y-m-d H:i:s') %}*/
/*             {% set idJournee = operation.journee.id %}*/
/*         {% else %}*/
/*             {% set idJournee = operations[0].journee.id %}*/
/*         {% endif %}*/
/*             */
/*         {% if operation.operateur.id != app.user.id %}*/
/*             {% set hasOtherUser = 1 %}*/
/*             {% if not operation.controle %}*/
/*                 {% set allValidated = 0 %}*/
/*             {% endif %}*/
/*         {% endif %}*/
/*     {% endfor %}*/
/*     {# if operations|length %}*/
/*         {% set idJournee = operations[0].journee.id %}*/
/*     {% endif #}*/
/*     <h1>*/
/*         Expertise Auto {% if idJournee > 0 %}{{ operations[0].journee.dateOperation|date('d/m/Y') }}{% else %}{{ "now"|date('d/m/Y') }}{% endif %}*/
/*     </h1>*/
/*     <form name="suiviappelsortant" method="POST">*/
/*         <input type="hidden" name="idJournee" class="idJournee" value="{{ idJournee }}" />*/
/*         <div class="filtre form-inline">*/
/*             <input type="text" id="filtre_date" name="filtre_date" class="form-control input-sm" placeholder="Date des opérations" value="{% if filtre.date is defined %}{{ filtre.date }}{% else %}{{ "now"|date("d/m/Y") }}{% endif %}" />*/
/*             <select name="filtre_agent" class="form-control input-sm" placeholder="Agent">*/
/*                 <option value="0">Sélectionner un agent</option>*/
/*                 {% for agent in agents %}*/
/*                     {% if not agent.hasRole('ROLE_SUPER_ADMIN') %}*/
/*                         <option value="{{ agent.id }}"{% if filtre.agent is defined and filtre.agent == agent.id %} selected="selected"{% endif %}>{{ agent.username }}</option>*/
/*                     {% endif %}*/
/*                 {% endfor %}*/
/*             </select>*/
/*             {% if app.user.hasRole('ROLE_ADMIN') or app.user.hasRole('ROLE_SUPER_ADMIN') %}*/
/*                 <select name="filtre_cabinet" class="form-control input-sm" placeholder="Cabinet">*/
/*                     <option value="0">Sélectionner un cabinet</option>*/
/*                     {% for cabinet in cabinets %}*/
/*                         <option value="{{ cabinet.id }}"{% if filtre.cabinet is defined and filtre.cabinet == cabinet.id %} selected="selected"{% endif %}>{{ cabinet.numero ~ " - " ~ cabinet.nom }}</option>*/
/*                     {% endfor %}*/
/*                 </select>*/
/*                 <select name="filtre_garage" class="form-control input-sm" placeholder="Garage">*/
/*                     <option value="0">Sélectionner un garage</option>*/
/*                     {% for garage in garages %}*/
/*                         <option value="{{ garage.id }}"{% if filtre.garage is defined and filtre.garage == garage.id %} selected="selected"{% endif %}>{{ garage.libelle }}</option>*/
/*                     {% endfor %}*/
/*                 </select>*/
/*             {% endif %}*/
/*             <button name="filtrer_journee" type="submit" class="filtrer btn btn-default btn-sm" title="Filtrer" value="3">*/
/*                 <span class="glyphicon glyphicon-filter" aria-hidden="true"></span>*/
/*                 Rechercher*/
/*             </button>*/
/*             <button name="reinitialiser_filtre" type="submit" class="reinitialiser btn btn-default btn-sm" title="Réinitialiser" value="4">*/
/*                 <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>*/
/*             </button>*/
/*         </div>*/
/*         <hr />*/
/*         {% if idJournee > 0 and operations[0].journee.validationDemandee %}*/
/*             <em>[En attente de validation]</em>*/
/*         {% endif %}*/
/*         <table class="table table-bordered table-condensed table-striped">*/
/*             <thead>*/
/*                 <tr>*/
/*                     <th width="210">Type d'action</th>*/
/*                     <th width="120">Date de réception</th>*/
/*                     <th width="110">N° de Dossier</th>*/
/*                     <th>Cabinet</th>*/
/*                     <th width="120">Catégorie</th>*/
/*                     <th width="110">Statut</th>*/
/*                     <th>Garage</th>*/
/*                     <th width="100">Date Heure</th>*/
/*                     <th>Transmission</th> */
/*                     <th colspan="2" class="text-center">Action</th> */
/*                     {% if hasOtherUser > 0 %}*/
/*                         <th>Contrôle</th> */
/*                         <th width="100">Process</th> */
/*                         <th></th> */
/*                     {% endif %}*/
/*                 </tr>*/
/*             </thead>*/
/*             <tbody>*/
/*                 {% if idJournee == 0 or not operations[0].journee.validationDemandee %}*/
/*                     <tr>*/
/*                         <td>*/
/*                             <select name="typeAction" class="typeAction form-control input-sm">*/
/*                                 {% for typeAction in typeActions %}*/
/*                                     <option value="{{ typeAction.id }}">{{ typeAction.libelle }}</option>*/
/*                                 {% endfor %}*/
/*                             </select>*/
/*                         </td>*/
/*                         <td>*/
/*                             <input id="jourReception" type="text" name="jourReception" class="form-control input-sm" value="{{ "now"|date('d/m/Y') }}" placeholder="jj/mm/aaaa" required="true"/>*/
/*                         </td>*/
/*                         <td>*/
/*                             <input type="text" name="numDossier" class="numDossier form-control input-sm" placeholder="N° de Dossier" value="" required="true"/>*/
/*                             <input type="hidden" name="idCabinet" class="idCabinet" value="" />*/
/*                         </td>*/
/*                         <td class="cabinetInfos">*/
/*                             <p class="form-control-static">-</p>*/
/*                         </td>*/
/*                         <td>*/
/*                             <select name="categorie" class="categorie form-control input-sm" required="true">*/
/*                                 <option value="0"></option>*/
/*                                 {% for categorie in categories %}*/
/*                                     <option value="{{ categorie.id }}">{{ categorie.libelle }}</option>*/
/*                                 {% endfor %}*/
/*                             </select>*/
/*                         </td>*/
/*                         <td>*/
/*                             <select name="statut" class="statut form-control input-sm" required="true">*/
/*                                 <option value="0"></option>*/
/*                                 {% for statut in statuts %}*/
/*                                     <option value="{{ statut.id }}">{{ statut.libelle }}</option>   */
/*                                 {% endfor %}*/
/*                             </select>*/
/*                         </td>*/
/*                         <td>*/
/*                             <input type="text" name="garage" class="garage form-control input-sm" required="true"/>*/
/*                             <input type="hidden" name="idGarage" class="idgarage" value="0" />*/
/*                         </td>*/
/*                         <td></td>*/
/*                         <td>*/
/*                             <select name="transmission" class="transmission form-control input-sm" required="true">*/
/*                                 <option value=""></option>*/
/*                                 {% for transmission in transmissions %}*/
/*                                     <option value="{{ transmission.id }}">{{ transmission.libelle }}</option>*/
/*                                 {% endfor %}  */
/*                             </select>*/
/*                         </td> */
/*                         <td class="box text-center" width="50">*/
/*                             <button type="button" class="comment btn btn-default btn-sm" title="Commenter">*/
/*                                 <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>*/
/*                             </button>*/
/*                             <span class="textAFloat hidden text-left" role="box">*/
/*                                 <strong>Commentaire</strong>*/
/*                                 <button type="button" class="close" data-dismiss="box" aria-label="Close"><span aria-hidden="true">&times;</span></button>*/
/*                                 <textarea name="commentaireOperation" class="commentaireOperation form-control" required="true"></textarea>*/
/*                             </span>*/
/*                         </td> */
/*                         <td class="text-center" width="50">*/
/*                             <button type="button" class="save btn btn-primary btn-sm" title="Enregistrer">*/
/*                                 <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>*/
/*                             </button>*/
/*                         </td> */
/*                         {% if hasOtherUser > 0 %}*/
/*                         <td colspan="3"></td>*/
/*                         {% endif %}*/
/*                     </tr>*/
/*                 {% endif %}*/
/*                 {% for operation in operations %}*/
/*                     <tr>*/
/*                         <td>*/
/*                             <p class="form-control-static">{{ operation.typeAction.libelle }}</p>*/
/*                             <input type="hidden" name="idOperation" value="{{ operation.id }}" />*/
/*                         </td>*/
/*                         <td><p class="form-control-static text-center">{{ operation.dateReception|date('d/m/Y') }}</p></td>*/
/*                         <td>*/
/*                             <input type="hidden" name="idOperation" class="idOperation" value="{{ operation.id }}" />*/
/*                             <p class="form-control-static">{{ operation.numeroDossier }}</p>*/
/*                         </td>*/
/*                         <td class="cabinetInfos"><p class="form-control-static">{% if operation.cabinet %}<a href="javascript:void(0);" data-cabinet="{{ operation.cabinet.numero }}">{{ operation.cabinet.nom }}</a>{% else %}-{% endif %}</p></td>*/
/*                         <td><p class="form-control-static">{% if operation.categorieAppel %} {{ operation.categorieAppel.libelle }} {% else %}-{% endif %}</p></td>*/
/*                         <td>*/
/*                             <select name='operation[{{operation.id}}][statutOperation]' class="statutOperation form-control input-sm">*/
/*                                 {% for statut in operation.typeAction.statuts %}*/
/*                                     {% if operation.categorieAppel and operation.categorieAppel.libelle|lower == "autre" %}*/
/*                                         {% if statut.libelle|lower == "hors proces" %}*/
/*                                             <option value="{{ statut.id }}" selected="selected">{{ statut.libelle }}</option>*/
/*                                         {% endif %}*/
/*                                     {% else %}*/
/*                                         <option value="{{ statut.id }}" {% if operation.statut.id == statut.id %}selected="selected"{% endif %}>{{ statut.libelle }}</option>*/
/*                                     {% endif %}*/
/*                                 {% endfor %}*/
/*                             </select>*/
/*                         </td>*/
/*                         <td><p class="form-control-static">{% if operation.garage %} {{ operation.garage.libelle }}{% else %}-{% endif %}</p></td>*/
/*                         <td><p class="form-control-static text-center">{{ operation.dateHeureTraitement|date('d/m/Y H:i:s') }}</p></td>*/
/*                         <td><p class="form-control-static">{% if operation.transmission %} {{ operation.transmission.libelle }}{% else %}-{% endif %}</p></td>*/
/*                         */
/*                     {% if operation.operateur.id != app.user.id %}*/
/*                         <input type="hidden" name="operation[{{ operation.id }}][id]" class="idOperation" value="{{ operation.id }}" />*/
/*                         <input type="hidden" name="operation[{{ operation.id }}][journee]" class="idJournee" value="{{ operation.journee.id }}" />*/
/*                         <td>*/
/*                             {% if operation.commentaireOperation|length %}*/
/*                                 <p class="form-control-static text-center">*/
/*                                     <a class="comment text-success" role="button" data-toggle="popover" data-trigger="focus hover" title="Commentaire" data-html="true" data-content="{{ operation.commentaireOperation|nl2br }}" data-placement="left">*/
/*                                         <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>*/
/*                                     </a>*/
/*                                 </p>*/
/*                             {% endif %}*/
/*                         </td>*/
/*                         <td></td>*/
/*                         <td>*/
/*                             {% set toggleEnable = "" %}*/
/*                             {% if operation.controle %}*/
/*                                 {% set toggleEnable = "disabled" %}*/
/*                             {% endif %}*/
/*                             {% if toggleEnable != "" %}*/
/*                                 <input type="hidden" name="operation[{{operation.id}}][controle]"  value="{{ operation.controle.id }}" />*/
/*                                 <input type="hidden" name="operation[{{ operation.id }}][process]" value="{% if operation.process|length %}{{ operation.process|raw|nl2br }}{% endif %}" />*/
/*                                 <input type="hidden" name="operation[{{ operation.id }}][commentaireCtrl]" value="{% if operation.commentaireControle|length %}{{ operation.commentaireControle|raw|nl2br }}{% endif %}" />*/
/*                             {% endif %}*/
/*                             <select name='operation[{{operation.id}}][controle]' {{ toggleEnable }} class="form-control input-sm">*/
/*                                 {% for controle in controles %}*/
/*                                     {% if operation.controle %}*/
/*                                         {% if operation.controle.id == controle.id %}*/
/*                                             <option selected value="{{ controle.id }}" >{{ controle.libelle }}</option>*/
/*                                         {% endif %}*/
/*                                     {% else %}*/
/*                                         <option value="{{ controle.id }}" >{{ controle.libelle }}</option>*/
/*                                     {% endif %}    */
/*                                 {% endfor %}*/
/*                             </select>*/
/*                         </td>*/
/*                         <td>*/
/*                             <textarea {{ toggleEnable }} name="operation[{{operation.id}}][process]" class="process form-control">{% if operation.process|length %}{{ operation.process|raw|nl2br }}{% endif %}</textarea>*/
/*                         </td>*/
/*                         <td class="box text-center">*/
/*                             <button type="button" class="commentctrl btn btn-default btn-sm" title="Commenter">*/
/*                                 <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>*/
/*                             </button>*/
/*                             <span class="textAFloat hidden text-left" role="box">*/
/*                                 <strong>Commentaire</strong>*/
/*                                 <button type="button" class="close" data-dismiss="box" aria-label="Close"><span aria-hidden="true">&times;</span></button>*/
/*                                 <textarea {{ toggleEnable }} name="operation[{{operation.id}}][commentaireCtrl]" class="commentaireCtrl form-control">{% if operation.commentaireControle|length %}{{ operation.commentaireControle|raw|nl2br }}{% endif %}</textarea>*/
/*                             </span>*/
/*                         </td>*/
/*                     {% else %}*/
/*                         {% set hasCurrentUser = 1 %}*/
/*                         <td class="box text-center">*/
/*                             <button type="button" class="comment btn btn-{% if operation.commentaireOperation|length %}success{% else %}default{% endif %} btn-sm" title="Commenter">*/
/*                                 <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>*/
/*                             </button>*/
/*                             <span class="textAFloat hidden text-left" role="box">*/
/*                                 <strong>Commentaire</strong>*/
/*                                 <button type="button" class="close" data-dismiss="box" aria-label="Close"><span aria-hidden="true">&times;</span></button>*/
/*                                 <textarea name="commentaireOperation" class="commentaireOperation form-control"></textarea>*/
/*                                 {% if operation.commentaireOperation|length %}*/
/*                                     <span>{{ operation.commentaireOperation|raw|nl2br }}</span>*/
/*                                 {% endif %}*/
/*                             </span>*/
/*                         </td>*/
/*                         <td class="text-center">*/
/*                             <button type="button" class="save-modif btn btn-default btn-sm" title="Enregistrer">*/
/*                                 <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>*/
/*                                 <span class="glyphicon glyphicon-" aria-hidden="true"></span>*/
/*                             </button>*/
/*                         </td>*/
/*                         {% if hasOtherUser > 0 %}*/
/*                         <td colspan="3"></td>*/
/*                         {% endif %}*/
/*                     {% endif %}*/
/*                 </tr>*/
/*             {% endfor %}*/
/*             </tbody>*/
/*         </table>*/
/*         <div class="text-right">*/
/*             {% if idJournee > 0 and not operations[0].journee.validationDemandee and hasCurrentUser > 0 %}*/
/*                 <button name="valider_journee" type="submit" class="demander_validation btn btn-success btn-sm" title="Demander validation" value="1">*/
/*                     <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>*/
/*                     Valider ma journée*/
/*                 </button>*/
/*             {% endif %}*/
/*             {% if idJournee > 0 %}*/
/*                 {% if app.user.hasRole('ROLE_ADMIN') or app.user.hasRole('ROLE_SUPER_ADMIN') %}*/
/*                 <button name="exporter_journee" type="submit" class="exporter btn btn-info btn-sm" title="Exporter" value="2">*/
/*                     <span class="glyphicon glyphicon-export" aria-hidden="true"></span>*/
/*                     Exporter*/
/*                 </button>*/
/*                 {% endif %}*/
/*             {% endif %}*/
/*             {% if hasOtherUser > 0 and allValidated == 0 %}*/
/*                 <button name="valider_controles" type="submit" class="valider_controles btn btn-success btn-sm" title="Valider les contrôles" value="3">*/
/*                     <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>*/
/*                     Valider les contrôles*/
/*                 </button>*/
/*             {% endif %}*/
/*             */
/*         </div>*/
/*     </form>*/
/*     <div class="associations hidden">*/
/*         <div id="ref_type_action_categorie">*/
/*             {% for typeAction in typeActions %}*/
/*                 <p id="{{ typeAction.id }}">{% for categorie in typeAction.categories %}{% if not loop.first %}_{% endif %}{{ categorie.id }}{% endfor %}</p>*/
/*             {% endfor %}*/
/*         </div>*/
/*         <div id="ref_type_action_statut">*/
/*             {% for typeAction in typeActions %}*/
/*                 <p id="{{ typeAction.id }}">{% for statut in typeAction.statuts %}{% if not loop.first %}_{% endif %}{{ statut.id }}{% endfor %}</p>*/
/*             {% endfor %}*/
/*         </div>*/
/*         <div id="ref_cabinets">*/
/*             {% for cabinet in cabinets %}*/
/*                 <p id="{{ cabinet.numero }}">{{ cabinet.datas }}</p>*/
/*             {% endfor %}*/
/*         </div>*/
/*         <div id="ref_garages">*/
/*             {% for garage in garages %}*/
/*                 <p id="{{ garage.libelle }}" data-id="{{ garage.id }}"></p>*/
/*             {% endfor %}*/
/*         </div>*/
/*     </div>*/
/* <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">*/
/*     <div class="modal-dialog" role="document">*/
/*         <div class="modal-content">*/
/*             <div class="modal-header">*/
/*                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>*/
/*                 <h4 class="modal-title" id="myModalLabel">Boîte de dialogue</h4>*/
/*             </div>*/
/*             <div class="modal-body">*/
/*                 <label>Veuillez remplir les champs vides svp!</label>*/
/*             </div>*/
/*             <div class="modal-footer">*/
/*                 <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/*             */
/* {% endblock %}*/
/* {% block javascripts %}*/
/*     {{ parent() }}*/
/*     <script type="text/javascript">*/
/*         var dataGarages = [];*/
/*         {% for garage in garages %}*/
/*             dataGarages.push("{{ garage.libelle }}");*/
/*         {% endfor %}*/
/*             var url_action = "{{ path('suivi_appelsortant_save') }}";*/
/*             var url_liste = "{{ path('suivi_appel_sortant') }}";*/
/*             var garagesJson = "{{ path('suivi_appel_sortant_garage_json') }}";*/
/*     </script>*/
/*     <script src="{{ asset('bundles/jquery/jquery.maskedinput.js') }}" type="text/javascript"></script>*/
/*     <script src="{{ asset('bundles/typeahead/typeahead.jquery.js') }}" type="text/javascript"></script>*/
/*     <script src="{{ asset('bundles/typeahead/bloodhound.js') }}" type="text/javascript"></script>*/
/*     <script src="{{ asset('bundles/typeahead/typeahead.bundle.js') }}" type="text/javascript"></script>*/
/*     <script src="{{ asset('bundles/suivi/js/suiviappelsortant.js') }}" type="text/javascript"></script>*/
/*     <script src="{{ asset('bundles/jquery/jquery-ui.js') }}" type="text/javascript"></script>*/
/* {% endblock javascripts %}*/
/* */
