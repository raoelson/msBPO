<?php

/* ::front.html.twig */
class __TwigTemplate_edc0701a9f94cce006e56dd30aee7e46516e786f10b80de478d49c11e4bb1119 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "::front.html.twig", 1);
        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'contenu' => array($this, 'block_contenu'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_eb42a349f04c3112ae5c18040a0663566438f0481f6082c5c217b12b1d9de273 = $this->env->getExtension("native_profiler");
        $__internal_eb42a349f04c3112ae5c18040a0663566438f0481f6082c5c217b12b1d9de273->enter($__internal_eb42a349f04c3112ae5c18040a0663566438f0481f6082c5c217b12b1d9de273_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::front.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_eb42a349f04c3112ae5c18040a0663566438f0481f6082c5c217b12b1d9de273->leave($__internal_eb42a349f04c3112ae5c18040a0663566438f0481f6082c5c217b12b1d9de273_prof);

    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_683883c1a427bdae4b1a8938984492cc0b83a76b0bb297882faf8b56f433a8ce = $this->env->getExtension("native_profiler");
        $__internal_683883c1a427bdae4b1a8938984492cc0b83a76b0bb297882faf8b56f433a8ce->enter($__internal_683883c1a427bdae4b1a8938984492cc0b83a76b0bb297882faf8b56f433a8ce_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 4
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/css/style.css"), "html", null, true);
        echo "\" type=\"text/css\" />
";
        
        $__internal_683883c1a427bdae4b1a8938984492cc0b83a76b0bb297882faf8b56f433a8ce->leave($__internal_683883c1a427bdae4b1a8938984492cc0b83a76b0bb297882faf8b56f433a8ce_prof);

    }

    // line 8
    public function block_body($context, array $blocks = array())
    {
        $__internal_44caa33cc793822744546b30a094c7f709188e61d35869c14aad8a149287e3a4 = $this->env->getExtension("native_profiler");
        $__internal_44caa33cc793822744546b30a094c7f709188e61d35869c14aad8a149287e3a4->enter($__internal_44caa33cc793822744546b30a094c7f709188e61d35869c14aad8a149287e3a4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 9
        echo "    <nav class=\"navbar navbar-default navbar-static-top\">
        <div class=\"container-fluid\">
            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"collapsable-bar\" aria-expanded=\"false\">
                    <span class=\"sr-only\">Toggle</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </button>
                <a class=\"navbar-brand\" href=\"#\">
                    BPO
                    <img src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/images/nacre.png"), "html", null, true);
        echo "\" alt=\"logo\" />
                </a>
            </div>
            
            <div class=\"collapse navbar-collapse\" id=\"collapsable-bar\">
                <ul class=\"nav navbar-nav\">
                    <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Suivi et validation <span class=\"caret\"></span></a>
                        <ul class=\"dropdown-menu\">
                            <li><a href=\"";
        // line 29
        echo $this->env->getExtension('routing')->getPath("suivi");
        echo "\">Suivi</a></li>
                            <li><a href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("suivi_appel_sortant");
        echo "\">Suivi Appel sortant</a></li>
                            <li role=\"separator\" class=\"divider\"></li>
                            <li><a href=\"";
        // line 32
        echo $this->env->getExtension('routing')->getPath("validation");
        echo "\">Validation</a></li>
                        </ul>
                    </li>
                    ";
        // line 35
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 36
            echo "                    <li class=\"dropdown\">
                        <a href=\"";
            // line 37
            echo $this->env->getExtension('routing')->getPath("admin_homepage");
            echo "\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Administration <span class=\"caret\"></span></a>
                        <ul class=\"dropdown-menu\">
                            <li><a href=\"";
            // line 39
            echo $this->env->getExtension('routing')->getPath("admin_utilisateurs");
            echo "\">Gestion des utilisateurs</a></li>
                            <li role=\"separator\" class=\"divider\"></li>
                            <li><a href=\"";
            // line 41
            echo $this->env->getExtension('routing')->getPath("admin_cabinets");
            echo "\">Référentiel <strong>Cabinet</strong></a></li>
                            <li><a href=\"";
            // line 42
            echo $this->env->getExtension('routing')->getPath("admin_typeactions");
            echo "\">Référentiel <strong>Type d'action</strong>, <strong>statut</strong> et  <strong>catégorie d'appel</strong></a></li>
                            <li><a href=\"";
            // line 43
            echo $this->env->getExtension('routing')->getPath("admin_interlocuteurs");
            echo "\">Référentiel <strong>Type d'interlocuteur</strong> et <strong>documents</strong></a></li>
                            <li><a href=\"";
            // line 44
            echo $this->env->getExtension('routing')->getPath("admin_controles");
            echo "\">Référentiel <strong>Contrôle</strong></a></li>
                            <li><a href=\"";
            // line 45
            echo $this->env->getExtension('routing')->getPath("admin_garages");
            echo "\">Référentiel <strong>Garage</strong></a></li>
                            <li><a href=\"";
            // line 46
            echo $this->env->getExtension('routing')->getPath("admin_transmissions");
            echo "\">Référentiel <strong>Transmission</strong></a></li>
                            <li><a href=\"";
            // line 47
            echo $this->env->getExtension('routing')->getPath("admin_statut");
            echo "\">Référentiel <strong>Statut</strong></a></li>
                            <li><a href=\"";
            // line 48
            echo $this->env->getExtension('routing')->getPath("admin_categorie");
            echo "\">Référentiel <strong>Catégorie</strong></a></li>
                        </ul>
                    </li>
                    ";
            // line 51
            if ((is_string($__internal_946e07df2229c57bfcace828ce77947f27c73626bcd7c93e2095d87687b5a0ab = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method")) && is_string($__internal_31a33d5f7dfe1ae47f7d7f874fab93a96ecd9c944f9c00533a079347834f724f = "admin_cabinet_") && ('' === $__internal_31a33d5f7dfe1ae47f7d7f874fab93a96ecd9c944f9c00533a079347834f724f || 0 === strpos($__internal_946e07df2229c57bfcace828ce77947f27c73626bcd7c93e2095d87687b5a0ab, $__internal_31a33d5f7dfe1ae47f7d7f874fab93a96ecd9c944f9c00533a079347834f724f)))) {
                echo "<li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("admin_cabinets");
                echo "\">Liste des cabinets</a></li>";
            }
            // line 52
            echo "                    ";
            if ((is_string($__internal_77af86928ce11d1f60d9f1f3d249dd7dcb81499c2c0e50aff256f3c5c8efa066 = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method")) && is_string($__internal_f824044213c63ca7b055a982775f004c3255a705abc026daa48fee1c04e77540 = "admin_utilisateur_") && ('' === $__internal_f824044213c63ca7b055a982775f004c3255a705abc026daa48fee1c04e77540 || 0 === strpos($__internal_77af86928ce11d1f60d9f1f3d249dd7dcb81499c2c0e50aff256f3c5c8efa066, $__internal_f824044213c63ca7b055a982775f004c3255a705abc026daa48fee1c04e77540)))) {
                echo "<li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("admin_utilisateurs");
                echo "\">Liste des utilisateurs</a></li>";
            }
            // line 53
            echo "                    ";
        }
        // line 54
        echo "                </ul>
                <ul class=\"nav navbar-nav navbar-right\">
                    <li><a href=\"";
        // line 56
        echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
        echo "\">Déconnexion</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class=\"container-fluid\">";
        // line 61
        $this->displayBlock('contenu', $context, $blocks);
        echo "</div>
";
        
        $__internal_44caa33cc793822744546b30a094c7f709188e61d35869c14aad8a149287e3a4->leave($__internal_44caa33cc793822744546b30a094c7f709188e61d35869c14aad8a149287e3a4_prof);

    }

    public function block_contenu($context, array $blocks = array())
    {
        $__internal_384966b5e40ad824be401fb8229ee6b68a12ef51c5e1cc98658770ccc43bf64b = $this->env->getExtension("native_profiler");
        $__internal_384966b5e40ad824be401fb8229ee6b68a12ef51c5e1cc98658770ccc43bf64b->enter($__internal_384966b5e40ad824be401fb8229ee6b68a12ef51c5e1cc98658770ccc43bf64b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "contenu"));

        
        $__internal_384966b5e40ad824be401fb8229ee6b68a12ef51c5e1cc98658770ccc43bf64b->leave($__internal_384966b5e40ad824be401fb8229ee6b68a12ef51c5e1cc98658770ccc43bf64b_prof);

    }

    public function getTemplateName()
    {
        return "::front.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  179 => 61,  171 => 56,  167 => 54,  164 => 53,  157 => 52,  151 => 51,  145 => 48,  141 => 47,  137 => 46,  133 => 45,  129 => 44,  125 => 43,  121 => 42,  117 => 41,  112 => 39,  107 => 37,  104 => 36,  102 => 35,  96 => 32,  91 => 30,  87 => 29,  75 => 20,  62 => 9,  56 => 8,  47 => 5,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '::base.html.twig' %}*/
/* */
/* {% block stylesheets %}*/
/*     {{ parent() }}*/
/*     <link rel="stylesheet" href="{{ asset('bundles/front/css/style.css') }}" type="text/css" />*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     <nav class="navbar navbar-default navbar-static-top">*/
/*         <div class="container-fluid">*/
/*             <div class="navbar-header">*/
/*                 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="collapsable-bar" aria-expanded="false">*/
/*                     <span class="sr-only">Toggle</span>*/
/*                     <span class="icon-bar"></span>*/
/*                     <span class="icon-bar"></span>*/
/*                     <span class="icon-bar"></span>*/
/*                 </button>*/
/*                 <a class="navbar-brand" href="#">*/
/*                     BPO*/
/*                     <img src="{{ asset('bundles/images/nacre.png') }}" alt="logo" />*/
/*                 </a>*/
/*             </div>*/
/*             */
/*             <div class="collapse navbar-collapse" id="collapsable-bar">*/
/*                 <ul class="nav navbar-nav">*/
/*                     <li class="dropdown">*/
/*                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Suivi et validation <span class="caret"></span></a>*/
/*                         <ul class="dropdown-menu">*/
/*                             <li><a href="{{ path("suivi") }}">Suivi</a></li>*/
/*                             <li><a href="{{ path("suivi_appel_sortant") }}">Suivi Appel sortant</a></li>*/
/*                             <li role="separator" class="divider"></li>*/
/*                             <li><a href="{{ path('validation') }}">Validation</a></li>*/
/*                         </ul>*/
/*                     </li>*/
/*                     {% if is_granted("ROLE_ADMIN") %}*/
/*                     <li class="dropdown">*/
/*                         <a href="{{ path("admin_homepage") }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administration <span class="caret"></span></a>*/
/*                         <ul class="dropdown-menu">*/
/*                             <li><a href="{{ path("admin_utilisateurs") }}">Gestion des utilisateurs</a></li>*/
/*                             <li role="separator" class="divider"></li>*/
/*                             <li><a href="{{ path('admin_cabinets') }}">Référentiel <strong>Cabinet</strong></a></li>*/
/*                             <li><a href="{{ path('admin_typeactions') }}">Référentiel <strong>Type d'action</strong>, <strong>statut</strong> et  <strong>catégorie d'appel</strong></a></li>*/
/*                             <li><a href="{{ path('admin_interlocuteurs') }}">Référentiel <strong>Type d'interlocuteur</strong> et <strong>documents</strong></a></li>*/
/*                             <li><a href="{{ path('admin_controles') }}">Référentiel <strong>Contrôle</strong></a></li>*/
/*                             <li><a href="{{ path('admin_garages') }}">Référentiel <strong>Garage</strong></a></li>*/
/*                             <li><a href="{{ path('admin_transmissions') }}">Référentiel <strong>Transmission</strong></a></li>*/
/*                             <li><a href="{{ path('admin_statut') }}">Référentiel <strong>Statut</strong></a></li>*/
/*                             <li><a href="{{ path('admin_categorie') }}">Référentiel <strong>Catégorie</strong></a></li>*/
/*                         </ul>*/
/*                     </li>*/
/*                     {% if app.request.attributes.get('_route') starts with "admin_cabinet_" %}<li><a href="{{ path("admin_cabinets") }}">Liste des cabinets</a></li>{% endif %}*/
/*                     {% if app.request.attributes.get('_route') starts with "admin_utilisateur_" %}<li><a href="{{ path("admin_utilisateurs") }}">Liste des utilisateurs</a></li>{% endif %}*/
/*                     {% endif %}*/
/*                 </ul>*/
/*                 <ul class="nav navbar-nav navbar-right">*/
/*                     <li><a href="{{ path('fos_user_security_logout') }}">Déconnexion</a></li>*/
/*                 </ul>*/
/*             </div>*/
/*         </div>*/
/*     </nav>*/
/*     <div class="container-fluid">{% block contenu %}{% endblock %}</div>*/
/* {% endblock %}*/
/* */
