<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_6a8fe7a4890ec8473457a0d7781183aefc6b61a14e662fe9bd6936273ac37dd8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_9456f977be39d0e57be55fc6a9d7fec28701922e9a4943d7fb1f7ca4aae444ce = $this->env->getExtension("native_profiler");
        $__internal_9456f977be39d0e57be55fc6a9d7fec28701922e9a4943d7fb1f7ca4aae444ce->enter($__internal_9456f977be39d0e57be55fc6a9d7fec28701922e9a4943d7fb1f7ca4aae444ce_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_9456f977be39d0e57be55fc6a9d7fec28701922e9a4943d7fb1f7ca4aae444ce->leave($__internal_9456f977be39d0e57be55fc6a9d7fec28701922e9a4943d7fb1f7ca4aae444ce_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_9514aedef948700daa1ade4acb3d03150c6512b2bae608f45b009461a36c5c69 = $this->env->getExtension("native_profiler");
        $__internal_9514aedef948700daa1ade4acb3d03150c6512b2bae608f45b009461a36c5c69->enter($__internal_9514aedef948700daa1ade4acb3d03150c6512b2bae608f45b009461a36c5c69_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_9514aedef948700daa1ade4acb3d03150c6512b2bae608f45b009461a36c5c69->leave($__internal_9514aedef948700daa1ade4acb3d03150c6512b2bae608f45b009461a36c5c69_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_314e7fc12de486011c8f5753411316816c9d2cf6bc8149a8d799ec0b779487b8 = $this->env->getExtension("native_profiler");
        $__internal_314e7fc12de486011c8f5753411316816c9d2cf6bc8149a8d799ec0b779487b8->enter($__internal_314e7fc12de486011c8f5753411316816c9d2cf6bc8149a8d799ec0b779487b8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_314e7fc12de486011c8f5753411316816c9d2cf6bc8149a8d799ec0b779487b8->leave($__internal_314e7fc12de486011c8f5753411316816c9d2cf6bc8149a8d799ec0b779487b8_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_5ff91ff419191f3c42fcd7e09e133bbbef189bc9262cf62cbf4d269f7b6b5813 = $this->env->getExtension("native_profiler");
        $__internal_5ff91ff419191f3c42fcd7e09e133bbbef189bc9262cf62cbf4d269f7b6b5813->enter($__internal_5ff91ff419191f3c42fcd7e09e133bbbef189bc9262cf62cbf4d269f7b6b5813_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_5ff91ff419191f3c42fcd7e09e133bbbef189bc9262cf62cbf4d269f7b6b5813->leave($__internal_5ff91ff419191f3c42fcd7e09e133bbbef189bc9262cf62cbf4d269f7b6b5813_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
