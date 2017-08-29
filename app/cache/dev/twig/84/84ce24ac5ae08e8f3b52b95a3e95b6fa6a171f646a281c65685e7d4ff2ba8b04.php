<?php

/* FOSUserBundle:Security:login.html.twig */
class __TwigTemplate_82e192764454d2bfbc67e37e67f32031a9b4d98d9c4220fb9165c1c67d16a194 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FOSUserBundle::layout.html.twig", "FOSUserBundle:Security:login.html.twig", 1);
        $this->blocks = array(
            'fos_user_content' => array($this, 'block_fos_user_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FOSUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_75392be7c7ec4b2cfe6e5b0a2008728fa780519ce7ffd2096b438ebeb43f984a = $this->env->getExtension("native_profiler");
        $__internal_75392be7c7ec4b2cfe6e5b0a2008728fa780519ce7ffd2096b438ebeb43f984a->enter($__internal_75392be7c7ec4b2cfe6e5b0a2008728fa780519ce7ffd2096b438ebeb43f984a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Security:login.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_75392be7c7ec4b2cfe6e5b0a2008728fa780519ce7ffd2096b438ebeb43f984a->leave($__internal_75392be7c7ec4b2cfe6e5b0a2008728fa780519ce7ffd2096b438ebeb43f984a_prof);

    }

    // line 5
    public function block_fos_user_content($context, array $blocks = array())
    {
        $__internal_9959f0f4bf5b22c56bb66358e796daf0f27cf4e4fde9b45ccb49542f3cb3d8e0 = $this->env->getExtension("native_profiler");
        $__internal_9959f0f4bf5b22c56bb66358e796daf0f27cf4e4fde9b45ccb49542f3cb3d8e0->enter($__internal_9959f0f4bf5b22c56bb66358e796daf0f27cf4e4fde9b45ccb49542f3cb3d8e0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        // line 6
        echo "    ";
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 7
            echo "        <div class=\"text-danger\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), array(), "FOSUserBundle"), "html", null, true);
            echo "</div>
    ";
        }
        // line 9
        echo "
    <form action=\"";
        // line 10
        echo $this->env->getExtension('routing')->getPath("fos_user_security_check");
        echo "\" method=\"post\" class=\"form-horizontal\">
        <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : $this->getContext($context, "csrf_token")), "html", null, true);
        echo "\" />

        <div class=\"\">
            <label for=\"username\">";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.username", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
            <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" required=\"required\" class=\"form-control\" placeholder=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.username", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
        </div>

        <div class=\"\">
            <label for=\"password\">";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.password", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
            <input type=\"password\" id=\"password\" name=\"_password\" required=\"required\" class=\"form-control\" placeholder=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.password", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
        </div>

        <div class=\"\">
            <label>
                <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" value=\"on\" />
                ";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.remember_me", array(), "FOSUserBundle"), "html", null, true);
        echo "
            </label>
        </div>

        <input type=\"submit\" class=\"btn btn-primary\" id=\"_submit\" name=\"_submit\" value=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
    </form>
";
        
        $__internal_9959f0f4bf5b22c56bb66358e796daf0f27cf4e4fde9b45ccb49542f3cb3d8e0->leave($__internal_9959f0f4bf5b22c56bb66358e796daf0f27cf4e4fde9b45ccb49542f3cb3d8e0_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 30,  88 => 26,  79 => 20,  75 => 19,  66 => 15,  62 => 14,  56 => 11,  52 => 10,  49 => 9,  43 => 7,  40 => 6,  34 => 5,  11 => 1,);
    }
}
/* {% extends "FOSUserBundle::layout.html.twig" %}*/
/* */
/* {% trans_default_domain 'FOSUserBundle' %}*/
/* */
/* {% block fos_user_content %}*/
/*     {% if error %}*/
/*         <div class="text-danger">{{ error|trans() }}</div>*/
/*     {% endif %}*/
/* */
/*     <form action="{{ path("fos_user_security_check") }}" method="post" class="form-horizontal">*/
/*         <input type="hidden" name="_csrf_token" value="{{ csrf_token }}" />*/
/* */
/*         <div class="">*/
/*             <label for="username">{{ 'security.login.username'|trans }}</label>*/
/*             <input type="text" id="username" name="_username" value="{{ last_username }}" required="required" class="form-control" placeholder="{{ 'security.login.username'|trans }}" />*/
/*         </div>*/
/* */
/*         <div class="">*/
/*             <label for="password">{{ 'security.login.password'|trans }}</label>*/
/*             <input type="password" id="password" name="_password" required="required" class="form-control" placeholder="{{ 'security.login.password'|trans }}" />*/
/*         </div>*/
/* */
/*         <div class="">*/
/*             <label>*/
/*                 <input type="checkbox" id="remember_me" name="_remember_me" value="on" />*/
/*                 {{ 'security.login.remember_me'|trans }}*/
/*             </label>*/
/*         </div>*/
/* */
/*         <input type="submit" class="btn btn-primary" id="_submit" name="_submit" value="{{ 'security.login.submit'|trans }}" />*/
/*     </form>*/
/* {% endblock fos_user_content %}*/
