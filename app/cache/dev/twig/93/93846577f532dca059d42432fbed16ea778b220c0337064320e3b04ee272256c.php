<?php

/* FOSUserBundle::layout.html.twig */
class __TwigTemplate_eefc99aa2da615d1fb1867bcd79f6c37d55e62bb30e50a049a29b017b5a15597 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "FOSUserBundle::layout.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'fos_user_content' => array($this, 'block_fos_user_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_6faa2e553ae8c447bf322b1f75bf7fa1d555453ac3edffd140a39ac761017297 = $this->env->getExtension("native_profiler");
        $__internal_6faa2e553ae8c447bf322b1f75bf7fa1d555453ac3edffd140a39ac761017297->enter($__internal_6faa2e553ae8c447bf322b1f75bf7fa1d555453ac3edffd140a39ac761017297_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle::layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6faa2e553ae8c447bf322b1f75bf7fa1d555453ac3edffd140a39ac761017297->leave($__internal_6faa2e553ae8c447bf322b1f75bf7fa1d555453ac3edffd140a39ac761017297_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_65cb2859f4291be95d89d4c32437a9c0b547eaf558959b0d4cbfd05b3e4e4f10 = $this->env->getExtension("native_profiler");
        $__internal_65cb2859f4291be95d89d4c32437a9c0b547eaf558959b0d4cbfd05b3e4e4f10->enter($__internal_65cb2859f4291be95d89d4c32437a9c0b547eaf558959b0d4cbfd05b3e4e4f10_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 4
        echo "    ";
        $this->displayParentBlock("title", $context, $blocks);
        echo " - Connexion
";
        
        $__internal_65cb2859f4291be95d89d4c32437a9c0b547eaf558959b0d4cbfd05b3e4e4f10->leave($__internal_65cb2859f4291be95d89d4c32437a9c0b547eaf558959b0d4cbfd05b3e4e4f10_prof);

    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_b498fd08677c09b428f98b7ba218d3881d63bd0d0d8f9339ef8f4e11b4dc0632 = $this->env->getExtension("native_profiler");
        $__internal_b498fd08677c09b428f98b7ba218d3881d63bd0d0d8f9339ef8f4e11b4dc0632->enter($__internal_b498fd08677c09b428f98b7ba218d3881d63bd0d0d8f9339ef8f4e11b4dc0632_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 8
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/login/css/style.css"), "html", null, true);
        echo "\" type=\"text/css\" />
";
        
        $__internal_b498fd08677c09b428f98b7ba218d3881d63bd0d0d8f9339ef8f4e11b4dc0632->leave($__internal_b498fd08677c09b428f98b7ba218d3881d63bd0d0d8f9339ef8f4e11b4dc0632_prof);

    }

    // line 12
    public function block_body($context, array $blocks = array())
    {
        $__internal_73d3448943fd69eb09e6307975d7ee286ec644fcbce1f594136780202a469aee = $this->env->getExtension("native_profiler");
        $__internal_73d3448943fd69eb09e6307975d7ee286ec644fcbce1f594136780202a469aee->enter($__internal_73d3448943fd69eb09e6307975d7ee286ec644fcbce1f594136780202a469aee_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 13
        echo "    ";
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    <div id=\"connexion\" class=\"col-sm-offset-4 col-sm-3\">
        <div>
            <a class=\"connexion\" href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
        echo "\">
                <span>BPO</span>
                ";
        // line 19
        echo "                <img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/images/nacre.png"), "html", null, true);
        echo "\" alt=\"logo\" />
            </a>
            ";
        // line 21
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 22
            echo "                ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logged_in_as", array("%username%" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "username", array())), "FOSUserBundle"), "html", null, true);
            echo " |
                <a href=\"";
            // line 23
            echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
            echo "\">
                    ";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logout", array(), "FOSUserBundle"), "html", null, true);
            echo "
                </a>
            ";
        }
        // line 27
        echo "        </div>

        ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashBag", array()), "all", array()));
        foreach ($context['_seq'] as $context["type"] => $context["messages"]) {
            // line 30
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 31
                echo "                <div class=\"";
                echo twig_escape_filter($this->env, $context["type"], "html", null, true);
                echo "\">
                    ";
                // line 32
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["message"], array(), "FOSUserBundle"), "html", null, true);
                echo "
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['messages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "
        <div>
            ";
        // line 38
        $this->displayBlock('fos_user_content', $context, $blocks);
        // line 40
        echo "        </div>
    </div>
";
        
        $__internal_73d3448943fd69eb09e6307975d7ee286ec644fcbce1f594136780202a469aee->leave($__internal_73d3448943fd69eb09e6307975d7ee286ec644fcbce1f594136780202a469aee_prof);

    }

    // line 38
    public function block_fos_user_content($context, array $blocks = array())
    {
        $__internal_30b18f55aed70d639dd9ca9a5a03701822dbe861e51ad7cc2b30f0d93bb5e7c2 = $this->env->getExtension("native_profiler");
        $__internal_30b18f55aed70d639dd9ca9a5a03701822dbe861e51ad7cc2b30f0d93bb5e7c2->enter($__internal_30b18f55aed70d639dd9ca9a5a03701822dbe861e51ad7cc2b30f0d93bb5e7c2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        // line 39
        echo "            ";
        
        $__internal_30b18f55aed70d639dd9ca9a5a03701822dbe861e51ad7cc2b30f0d93bb5e7c2->leave($__internal_30b18f55aed70d639dd9ca9a5a03701822dbe861e51ad7cc2b30f0d93bb5e7c2_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  168 => 39,  162 => 38,  153 => 40,  151 => 38,  147 => 36,  141 => 35,  132 => 32,  127 => 31,  122 => 30,  118 => 29,  114 => 27,  108 => 24,  104 => 23,  99 => 22,  97 => 21,  91 => 19,  86 => 16,  79 => 13,  73 => 12,  64 => 9,  59 => 8,  53 => 7,  43 => 4,  37 => 3,  11 => 1,);
    }
}
/* {% extends '::base.html.twig' %}*/
/* */
/* {% block title %}*/
/*     {{ parent() }} - Connexion*/
/* {% endblock %}*/
/* */
/* {% block stylesheets %}*/
/*     {{ parent() }}*/
/*     <link rel="stylesheet" href="{{ asset('bundles/login/css/style.css') }}" type="text/css" />*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {{ parent() }}*/
/*     <div id="connexion" class="col-sm-offset-4 col-sm-3">*/
/*         <div>*/
/*             <a class="connexion" href="{{ path('fos_user_security_login') }}">*/
/*                 <span>BPO</span>*/
/*                 {#{{ 'layout.login'|trans({}, 'FOSUserBundle') }}#}*/
/*                 <img src="{{ asset('bundles/images/nacre.png') }}" alt="logo" />*/
/*             </a>*/
/*             {% if is_granted("IS_AUTHENTICATED_REMEMBERED") %}*/
/*                 {{ 'layout.logged_in_as'|trans({'%username%': app.user.username}, 'FOSUserBundle') }} |*/
/*                 <a href="{{ path('fos_user_security_logout') }}">*/
/*                     {{ 'layout.logout'|trans({}, 'FOSUserBundle') }}*/
/*                 </a>*/
/*             {% endif %}*/
/*         </div>*/
/* */
/*         {% for type, messages in app.session.flashBag.all %}*/
/*             {% for message in messages %}*/
/*                 <div class="{{ type }}">*/
/*                     {{ message|trans({}, 'FOSUserBundle') }}*/
/*                 </div>*/
/*             {% endfor %}*/
/*         {% endfor %}*/
/* */
/*         <div>*/
/*             {% block fos_user_content %}*/
/*             {% endblock fos_user_content %}*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
/* */
