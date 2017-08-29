<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_210fd2fc5bb3d78830b3a1846c1893ac0b9d29bbb4aee69471c5fd76e59662cf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_952c854ef489fc4d255c80c24f87b895429a9b36e5ad969d3d4e11d2b281d00d = $this->env->getExtension("native_profiler");
        $__internal_952c854ef489fc4d255c80c24f87b895429a9b36e5ad969d3d4e11d2b281d00d->enter($__internal_952c854ef489fc4d255c80c24f87b895429a9b36e5ad969d3d4e11d2b281d00d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_952c854ef489fc4d255c80c24f87b895429a9b36e5ad969d3d4e11d2b281d00d->leave($__internal_952c854ef489fc4d255c80c24f87b895429a9b36e5ad969d3d4e11d2b281d00d_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_6d3195c77ef83d2be0e8823b2b07ffbc283f195222b7c0e705a9e920503ba731 = $this->env->getExtension("native_profiler");
        $__internal_6d3195c77ef83d2be0e8823b2b07ffbc283f195222b7c0e705a9e920503ba731->enter($__internal_6d3195c77ef83d2be0e8823b2b07ffbc283f195222b7c0e705a9e920503ba731_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_6d3195c77ef83d2be0e8823b2b07ffbc283f195222b7c0e705a9e920503ba731->leave($__internal_6d3195c77ef83d2be0e8823b2b07ffbc283f195222b7c0e705a9e920503ba731_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_dbbfdcecbcd36d6fe44925ca6b1cc617682cb6923a40d2d8881d2e3075976480 = $this->env->getExtension("native_profiler");
        $__internal_dbbfdcecbcd36d6fe44925ca6b1cc617682cb6923a40d2d8881d2e3075976480->enter($__internal_dbbfdcecbcd36d6fe44925ca6b1cc617682cb6923a40d2d8881d2e3075976480_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_dbbfdcecbcd36d6fe44925ca6b1cc617682cb6923a40d2d8881d2e3075976480->leave($__internal_dbbfdcecbcd36d6fe44925ca6b1cc617682cb6923a40d2d8881d2e3075976480_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_19d189c559fa9522c782d443359aa368573cf45057962a42755188fe94e760c7 = $this->env->getExtension("native_profiler");
        $__internal_19d189c559fa9522c782d443359aa368573cf45057962a42755188fe94e760c7->enter($__internal_19d189c559fa9522c782d443359aa368573cf45057962a42755188fe94e760c7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_19d189c559fa9522c782d443359aa368573cf45057962a42755188fe94e760c7->leave($__internal_19d189c559fa9522c782d443359aa368573cf45057962a42755188fe94e760c7_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
