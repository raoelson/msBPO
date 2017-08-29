<?php

/* administration/interlocuteur/index.html.twig */
class __TwigTemplate_5d3efee816cb334e90ff06eac46414e3f6f306354eba1cd80870ce94aaa01b73 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::front.html.twig", "administration/interlocuteur/index.html.twig", 1);
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
        $__internal_9ba9d56185cd1800fec0ae53af7e3d387ec2e850b4b0c6fa6a026758afce18c1 = $this->env->getExtension("native_profiler");
        $__internal_9ba9d56185cd1800fec0ae53af7e3d387ec2e850b4b0c6fa6a026758afce18c1->enter($__internal_9ba9d56185cd1800fec0ae53af7e3d387ec2e850b4b0c6fa6a026758afce18c1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "administration/interlocuteur/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_9ba9d56185cd1800fec0ae53af7e3d387ec2e850b4b0c6fa6a026758afce18c1->leave($__internal_9ba9d56185cd1800fec0ae53af7e3d387ec2e850b4b0c6fa6a026758afce18c1_prof);

    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_d7ec87a151c3ca22c1ea58b095206995d900ba9847cf7ed59ad873d79912bacb = $this->env->getExtension("native_profiler");
        $__internal_d7ec87a151c3ca22c1ea58b095206995d900ba9847cf7ed59ad873d79912bacb->enter($__internal_d7ec87a151c3ca22c1ea58b095206995d900ba9847cf7ed59ad873d79912bacb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 4
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/css/style.css"), "html", null, true);
        echo "\" type=\"text/css\" />
    <link rel=\"stylesheet\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/select2/select2.css"), "html", null, true);
        echo "\" type=\"text/css\" />
    <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/css/interlocuteur.css"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "YmdHis"), "html", null, true);
        echo "\" type=\"text/css\" />
";
        
        $__internal_d7ec87a151c3ca22c1ea58b095206995d900ba9847cf7ed59ad873d79912bacb->leave($__internal_d7ec87a151c3ca22c1ea58b095206995d900ba9847cf7ed59ad873d79912bacb_prof);

    }

    // line 10
    public function block_contenu($context, array $blocks = array())
    {
        $__internal_9c6d7388d137ee68aa3761269ef063fabc50ffe6673fb5dc0c9dfb363bbd0f36 = $this->env->getExtension("native_profiler");
        $__internal_9c6d7388d137ee68aa3761269ef063fabc50ffe6673fb5dc0c9dfb363bbd0f36->enter($__internal_9c6d7388d137ee68aa3761269ef063fabc50ffe6673fb5dc0c9dfb363bbd0f36_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "contenu"));

        // line 11
        echo "    <h1>
        Interlocuteurs et documents
    </h1>
    <form name=\"ajouter\" method=\"POST\" action=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("admin_interlocuteur_ajouter");
        echo "\">
        <table class=\"table table-bordered table-condensed table-striped\">
            <thead>
                <tr>
                    <th width=\"30%\">Interlocuteurs</th>
                    <th>Documents (s'il y a plusieurs, séparez-les par un ;)</th>
                    <th width=\"85\">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type=\"text\" name=\"interlocuteur\" class=\"interlocuteur form-control\" placeholder=\"Libellé de l'interlocuteur\" required=\"required\" /></td>
                    <td><input type=\"hidden\" name=\"documents\" class=\"documents\" style=\"width: 100%;\" /></td>
                    <td>
                        <button type=\"submit\" class=\"btn btn-primary\" title=\"Enregistrer\">
                            <span class=\"glyphicon glyphicon-plus\" aria-hidden=\"true\"></span>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    ";
        // line 36
        if (twig_length_filter($this->env, (isset($context["interlocuteurs"]) ? $context["interlocuteurs"] : $this->getContext($context, "interlocuteurs")))) {
            // line 37
            echo "    <div>
        <ul class=\"nav nav-tabs\" role=\"tablist\">
            ";
            // line 39
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["interlocuteurs"]) ? $context["interlocuteurs"] : $this->getContext($context, "interlocuteurs")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 40
                echo "                <li role=\"presentation\" class=\"";
                if ($this->getAttribute($context["loop"], "first", array())) {
                    echo "active";
                }
                echo "\">
                    <a href=\"#interlocuteur-";
                // line 41
                echo twig_escape_filter($this->env, $this->getAttribute($context["i"], "id", array()), "html", null, true);
                echo "\" aria-controls=\"interlocuteur-";
                echo twig_escape_filter($this->env, $this->getAttribute($context["i"], "id", array()), "html", null, true);
                echo "\" role=\"tab\" data-toggle=\"tab\">
                        ";
                // line 42
                echo twig_escape_filter($this->env, $this->getAttribute($context["i"], "libelle", array()), "html", null, true);
                echo "
                    </a>
                </li>
            ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 46
            echo "        </ul>
        <div class=\"tab-content\">
            ";
            // line 48
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["interlocuteurs"]) ? $context["interlocuteurs"] : $this->getContext($context, "interlocuteurs")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 49
                echo "                <div role=\"tabpanel\" class=\"tab-pane ";
                if ($this->getAttribute($context["loop"], "first", array())) {
                    echo "active";
                }
                echo "\" id=\"interlocuteur-";
                echo twig_escape_filter($this->env, $this->getAttribute($context["i"], "id", array()), "html", null, true);
                echo "\">
                    <form name=\"editer\" method=\"POST\" action=\"";
                // line 50
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_interlocuteur_modifier", array("idInterlocuteur" => $this->getAttribute($context["i"], "id", array()))), "html", null, true);
                echo "\">
                        <strong>Interlocuteur</strong>
                        <table class=\"table table-striped table-bordered table-condensed\">
                            <tr>
                                <td>
                                    <input type=\"text\" name=\"interlocuteur\" class=\"form-control input-sm interlocuteur\" placeholder=\"Interlocuteur\" value=\"";
                // line 55
                echo twig_escape_filter($this->env, $this->getAttribute($context["i"], "libelle", array()), "html", null, true);
                echo "\"  required=\"required\"/>
                                </td>
                                <td width=\"85\">
                                    <button type=\"submit\" class=\"btn btn-default btn-sm\" title=\"Modifier\" name=\"editer\" value=\"";
                // line 58
                echo twig_escape_filter($this->env, $this->getAttribute($context["i"], "id", array()), "html", null, true);
                echo "\">
                                        <span class=\"glyphicon glyphicon-floppy-disk\" aria-hidden=\"true\"></span>
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <form name=\"ajouter\" method=\"POST\" action=\"";
                // line 65
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_interlocuteur_modifier", array("idInterlocuteur" => $this->getAttribute($context["i"], "id", array()))), "html", null, true);
                echo "\">
                        <strong>Documents</strong>
                        <table class=\"table table-striped table-bordered table-condensed\">
                            <tr>
                                <td>
                                    <input type=\"hidden\" name=\"document[0][idDocument]\" value=\"0\" />
                                    <input type=\"text\" name=\"document[0][documentType]\" class=\"form-control input-sm documentType\" placeholder=\"Libellé du document\" style=\"width: 100%;\" />
                                </td>
                                <td width=\"85\">
                                    <button type=\"submit\" class=\"btn btn-primary btn-sm\" title=\"Ajouter\" name=\"submit\" value=\"0\">
                                        <span class=\"glyphicon glyphicon-plus\" aria-hidden=\"true\"></span>
                                    </button>
                                </td>
                            </tr>
                            ";
                // line 79
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["i"], "docuemnts", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
                    // line 80
                    echo "                            <tr>
                                <td>
                                    <input type=\"hidden\" name=\"document[";
                    // line 82
                    echo twig_escape_filter($this->env, $this->getAttribute($context["d"], "id", array()), "html", null, true);
                    echo "][idDocument]\" value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["d"], "id", array()), "html", null, true);
                    echo "\" />
                                    <input type=\"text\" name=\"document[";
                    // line 83
                    echo twig_escape_filter($this->env, $this->getAttribute($context["d"], "id", array()), "html", null, true);
                    echo "][documentType]\" class=\"form-control input-sm documentType\" value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["d"], "documentType", array()), "html", null, true);
                    echo "\" required=\"required\" style=\"width: 100%;\" />
                                </td>
                                <td>
                                    <button type=\"submit\" class=\"btn btn-default btn-sm\" title=\"Modifier\" name=\"submit\" value=\"";
                    // line 86
                    echo twig_escape_filter($this->env, $this->getAttribute($context["d"], "id", array()), "html", null, true);
                    echo "\">
                                        <span class=\"glyphicon glyphicon-floppy-disk\" aria-hidden=\"true\"></span>
                                    </button>
                                    <button type=\"submit\" class=\"btn btn-danger btn-sm\" title=\"Supprimer\" name=\"supprimer\" value=\"";
                    // line 89
                    echo twig_escape_filter($this->env, $this->getAttribute($context["d"], "id", array()), "html", null, true);
                    echo "\">
                                        <span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span>
                                    </button>
                                </td>
                            </tr>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 95
                echo "                        </table>
                    </form>
                </div>
            ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 99
            echo "        </div>
    </div>
    ";
        }
        
        $__internal_9c6d7388d137ee68aa3761269ef063fabc50ffe6673fb5dc0c9dfb363bbd0f36->leave($__internal_9c6d7388d137ee68aa3761269ef063fabc50ffe6673fb5dc0c9dfb363bbd0f36_prof);

    }

    // line 103
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_39ad0eee84414aa28729ecc6f0c234c1b1bebadb690e1bb2028e664d26137c21 = $this->env->getExtension("native_profiler");
        $__internal_39ad0eee84414aa28729ecc6f0c234c1b1bebadb690e1bb2028e664d26137c21->enter($__internal_39ad0eee84414aa28729ecc6f0c234c1b1bebadb690e1bb2028e664d26137c21_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 104
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script type=\"text/javascript\">
        var url_index_type_action = \"";
        // line 106
        echo $this->env->getExtension('routing')->getPath("admin_interlocuteurs");
        echo "\";
        var url_ajout_type_action = \"";
        // line 107
        echo $this->env->getExtension('routing')->getPath("admin_interlocuteur_ajouter");
        echo "\";
        var url_modification_type_action = \"";
        // line 108
        echo $this->env->getExtension('routing')->getPath("admin_interlocuteur_modifier", array("idInterlocuteur" => "idInterlocuteur"));
        echo "\";
        var documentJson = \"";
        // line 109
        echo $this->env->getExtension('routing')->getPath("interlocuteur_document_json");
        echo "\";
        var dataDocuments = [];
        ";
        // line 111
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["documents"]) ? $context["documents"] : $this->getContext($context, "documents")));
        foreach ($context['_seq'] as $context["_key"] => $context["libelle"]) {
            // line 112
            echo "            dataDocuments.push(\"";
            echo twig_escape_filter($this->env, $context["libelle"], "html", null, true);
            echo "\");
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['libelle'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 114
        echo "    </script>
    <script src=\"";
        // line 115
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/select2/select2.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 116
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/select2/select2_locale_fr.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 117
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/typeahead/typeahead.jquery.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 118
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/typeahead/bloodhound.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 119
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/typeahead/typeahead.bundle.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 120
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/js/interlocuteur.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
";
        
        $__internal_39ad0eee84414aa28729ecc6f0c234c1b1bebadb690e1bb2028e664d26137c21->leave($__internal_39ad0eee84414aa28729ecc6f0c234c1b1bebadb690e1bb2028e664d26137c21_prof);

    }

    public function getTemplateName()
    {
        return "administration/interlocuteur/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  359 => 120,  355 => 119,  351 => 118,  347 => 117,  343 => 116,  339 => 115,  336 => 114,  327 => 112,  323 => 111,  318 => 109,  314 => 108,  310 => 107,  306 => 106,  300 => 104,  294 => 103,  284 => 99,  267 => 95,  255 => 89,  249 => 86,  241 => 83,  235 => 82,  231 => 80,  227 => 79,  210 => 65,  200 => 58,  194 => 55,  186 => 50,  177 => 49,  160 => 48,  156 => 46,  138 => 42,  132 => 41,  125 => 40,  108 => 39,  104 => 37,  102 => 36,  77 => 14,  72 => 11,  66 => 10,  55 => 7,  51 => 6,  47 => 5,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '::front.html.twig' %}*/
/* */
/* {% block stylesheets %}*/
/*     {{ parent() }}*/
/*     <link rel="stylesheet" href="{{ asset('bundles/admin/css/style.css') }}" type="text/css" />*/
/*     <link rel="stylesheet" href="{{ asset('bundles/select2/select2.css') }}" type="text/css" />*/
/*     <link rel="stylesheet" href="{{ asset('bundles/admin/css/interlocuteur.css') }}?{{ "now"|date('YmdHis') }}" type="text/css" />*/
/* {% endblock %}*/
/* */
/* {% block contenu %}*/
/*     <h1>*/
/*         Interlocuteurs et documents*/
/*     </h1>*/
/*     <form name="ajouter" method="POST" action="{{ path('admin_interlocuteur_ajouter') }}">*/
/*         <table class="table table-bordered table-condensed table-striped">*/
/*             <thead>*/
/*                 <tr>*/
/*                     <th width="30%">Interlocuteurs</th>*/
/*                     <th>Documents (s'il y a plusieurs, séparez-les par un ;)</th>*/
/*                     <th width="85">Actions</th>*/
/*                 </tr>*/
/*             </thead>*/
/*             <tbody>*/
/*                 <tr>*/
/*                     <td><input type="text" name="interlocuteur" class="interlocuteur form-control" placeholder="Libellé de l'interlocuteur" required="required" /></td>*/
/*                     <td><input type="hidden" name="documents" class="documents" style="width: 100%;" /></td>*/
/*                     <td>*/
/*                         <button type="submit" class="btn btn-primary" title="Enregistrer">*/
/*                             <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>*/
/*                         </button>*/
/*                     </td>*/
/*                 </tr>*/
/*             </tbody>*/
/*         </table>*/
/*     </form>*/
/*     {% if interlocuteurs|length %}*/
/*     <div>*/
/*         <ul class="nav nav-tabs" role="tablist">*/
/*             {% for i in interlocuteurs %}*/
/*                 <li role="presentation" class="{% if loop.first %}active{% endif %}">*/
/*                     <a href="#interlocuteur-{{ i.id }}" aria-controls="interlocuteur-{{ i.id }}" role="tab" data-toggle="tab">*/
/*                         {{ i.libelle }}*/
/*                     </a>*/
/*                 </li>*/
/*             {% endfor %}*/
/*         </ul>*/
/*         <div class="tab-content">*/
/*             {% for i in interlocuteurs %}*/
/*                 <div role="tabpanel" class="tab-pane {% if loop.first %}active{% endif %}" id="interlocuteur-{{ i.id }}">*/
/*                     <form name="editer" method="POST" action="{{ path('admin_interlocuteur_modifier', {'idInterlocuteur': i.id}) }}">*/
/*                         <strong>Interlocuteur</strong>*/
/*                         <table class="table table-striped table-bordered table-condensed">*/
/*                             <tr>*/
/*                                 <td>*/
/*                                     <input type="text" name="interlocuteur" class="form-control input-sm interlocuteur" placeholder="Interlocuteur" value="{{ i.libelle }}"  required="required"/>*/
/*                                 </td>*/
/*                                 <td width="85">*/
/*                                     <button type="submit" class="btn btn-default btn-sm" title="Modifier" name="editer" value="{{ i.id }}">*/
/*                                         <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>*/
/*                                     </button>*/
/*                                 </td>*/
/*                             </tr>*/
/*                         </table>*/
/*                     </form>*/
/*                     <form name="ajouter" method="POST" action="{{ path('admin_interlocuteur_modifier', {'idInterlocuteur': i.id}) }}">*/
/*                         <strong>Documents</strong>*/
/*                         <table class="table table-striped table-bordered table-condensed">*/
/*                             <tr>*/
/*                                 <td>*/
/*                                     <input type="hidden" name="document[0][idDocument]" value="0" />*/
/*                                     <input type="text" name="document[0][documentType]" class="form-control input-sm documentType" placeholder="Libellé du document" style="width: 100%;" />*/
/*                                 </td>*/
/*                                 <td width="85">*/
/*                                     <button type="submit" class="btn btn-primary btn-sm" title="Ajouter" name="submit" value="0">*/
/*                                         <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>*/
/*                                     </button>*/
/*                                 </td>*/
/*                             </tr>*/
/*                             {% for d in i.docuemnts %}*/
/*                             <tr>*/
/*                                 <td>*/
/*                                     <input type="hidden" name="document[{{ d.id }}][idDocument]" value="{{ d.id }}" />*/
/*                                     <input type="text" name="document[{{ d.id }}][documentType]" class="form-control input-sm documentType" value="{{ d.documentType }}" required="required" style="width: 100%;" />*/
/*                                 </td>*/
/*                                 <td>*/
/*                                     <button type="submit" class="btn btn-default btn-sm" title="Modifier" name="submit" value="{{ d.id }}">*/
/*                                         <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>*/
/*                                     </button>*/
/*                                     <button type="submit" class="btn btn-danger btn-sm" title="Supprimer" name="supprimer" value="{{ d.id }}">*/
/*                                         <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>*/
/*                                     </button>*/
/*                                 </td>*/
/*                             </tr>*/
/*                             {% endfor %}*/
/*                         </table>*/
/*                     </form>*/
/*                 </div>*/
/*             {% endfor %}*/
/*         </div>*/
/*     </div>*/
/*     {% endif %}*/
/* {% endblock %}*/
/* {% block javascripts %}*/
/*     {{ parent() }}*/
/*     <script type="text/javascript">*/
/*         var url_index_type_action = "{{ path("admin_interlocuteurs") }}";*/
/*         var url_ajout_type_action = "{{ path("admin_interlocuteur_ajouter") }}";*/
/*         var url_modification_type_action = "{{ path("admin_interlocuteur_modifier", {'idInterlocuteur': 'idInterlocuteur'}) }}";*/
/*         var documentJson = "{{ path("interlocuteur_document_json") }}";*/
/*         var dataDocuments = [];*/
/*         {% for libelle in documents %}*/
/*             dataDocuments.push("{{ libelle }}");*/
/*         {% endfor %}*/
/*     </script>*/
/*     <script src="{{ asset('bundles/select2/select2.js') }}" type="text/javascript"></script>*/
/*     <script src="{{ asset('bundles/select2/select2_locale_fr.js') }}" type="text/javascript"></script>*/
/*     <script src="{{ asset('bundles/typeahead/typeahead.jquery.js') }}" type="text/javascript"></script>*/
/*     <script src="{{ asset('bundles/typeahead/bloodhound.js') }}" type="text/javascript"></script>*/
/*     <script src="{{ asset('bundles/typeahead/typeahead.bundle.js') }}" type="text/javascript"></script>*/
/*     <script src="{{ asset('bundles/admin/js/interlocuteur.js') }}" type="text/javascript"></script>*/
/* {% endblock %}*/
