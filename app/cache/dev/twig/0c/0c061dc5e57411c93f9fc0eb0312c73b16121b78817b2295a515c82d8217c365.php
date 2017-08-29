<?php

/* ::base.html.twig */
class __TwigTemplate_3829a2fcb9de6c5e324168de2182074d446573dc4fd9d84f75352e0c008c785c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e494cb6aaa7f9fa2140ffa0ed8f8439be6abdce81636c43632bc3045478aa929 = $this->env->getExtension("native_profiler");
        $__internal_e494cb6aaa7f9fa2140ffa0ed8f8439be6abdce81636c43632bc3045478aa929->enter($__internal_e494cb6aaa7f9fa2140ffa0ed8f8439be6abdce81636c43632bc3045478aa929_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 9
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 12
        $this->displayBlock('body', $context, $blocks);
        // line 13
        echo "        
        ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashBag", array()), "get", array(0 => "info"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flash_message"]) {
            // line 15
            echo "            <div class=\"alert alert-info alert-dismissible\" role=\"alert\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                ";
            // line 17
            echo twig_escape_filter($this->env, $context["flash_message"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flash_message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "        
        ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashBag", array()), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flash_message"]) {
            // line 22
            echo "            <div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                ";
            // line 24
            echo twig_escape_filter($this->env, $context["flash_message"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flash_message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "        
        ";
        // line 28
        $this->displayBlock('javascripts', $context, $blocks);
        // line 32
        echo "    </body>
</html>
";
        
        $__internal_e494cb6aaa7f9fa2140ffa0ed8f8439be6abdce81636c43632bc3045478aa929->leave($__internal_e494cb6aaa7f9fa2140ffa0ed8f8439be6abdce81636c43632bc3045478aa929_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_a0558863415e91da2b55c4dcc096d57023ee95578bd423a97777cde705b80996 = $this->env->getExtension("native_profiler");
        $__internal_a0558863415e91da2b55c4dcc096d57023ee95578bd423a97777cde705b80996->enter($__internal_a0558863415e91da2b55c4dcc096d57023ee95578bd423a97777cde705b80996_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "BPO Nacre";
        
        $__internal_a0558863415e91da2b55c4dcc096d57023ee95578bd423a97777cde705b80996->leave($__internal_a0558863415e91da2b55c4dcc096d57023ee95578bd423a97777cde705b80996_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_89fdf860b6c83b377167a6a56af92c697d7574daccab43a71fe5432f1e49d6da = $this->env->getExtension("native_profiler");
        $__internal_89fdf860b6c83b377167a6a56af92c697d7574daccab43a71fe5432f1e49d6da->enter($__internal_89fdf860b6c83b377167a6a56af92c697d7574daccab43a71fe5432f1e49d6da_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 7
        echo "            <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/bootstrap/css/bootstrap.css"), "html", null, true);
        echo "\" type=\"text/css\" />
        ";
        
        $__internal_89fdf860b6c83b377167a6a56af92c697d7574daccab43a71fe5432f1e49d6da->leave($__internal_89fdf860b6c83b377167a6a56af92c697d7574daccab43a71fe5432f1e49d6da_prof);

    }

    // line 12
    public function block_body($context, array $blocks = array())
    {
        $__internal_f6a28f5e3549b2d42818bbf66e30a5ab77a1b127c4005dd2b84e7a88523a4a57 = $this->env->getExtension("native_profiler");
        $__internal_f6a28f5e3549b2d42818bbf66e30a5ab77a1b127c4005dd2b84e7a88523a4a57->enter($__internal_f6a28f5e3549b2d42818bbf66e30a5ab77a1b127c4005dd2b84e7a88523a4a57_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_f6a28f5e3549b2d42818bbf66e30a5ab77a1b127c4005dd2b84e7a88523a4a57->leave($__internal_f6a28f5e3549b2d42818bbf66e30a5ab77a1b127c4005dd2b84e7a88523a4a57_prof);

    }

    // line 28
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_aaacaefb622f3397b8be48fb080727bc875e0c2e64e2e79910cd60dcc5e723e6 = $this->env->getExtension("native_profiler");
        $__internal_aaacaefb622f3397b8be48fb080727bc875e0c2e64e2e79910cd60dcc5e723e6->enter($__internal_aaacaefb622f3397b8be48fb080727bc875e0c2e64e2e79910cd60dcc5e723e6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 29
        echo "            <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/jquery/jquery.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
            <script src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/bootstrap/js/bootstrap.js"), "html", null, true);
        echo "\"></script>
        ";
        
        $__internal_aaacaefb622f3397b8be48fb080727bc875e0c2e64e2e79910cd60dcc5e723e6->leave($__internal_aaacaefb622f3397b8be48fb080727bc875e0c2e64e2e79910cd60dcc5e723e6_prof);

    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  151 => 30,  146 => 29,  140 => 28,  129 => 12,  119 => 7,  113 => 6,  101 => 5,  92 => 32,  90 => 28,  87 => 27,  78 => 24,  74 => 22,  70 => 21,  67 => 20,  58 => 17,  54 => 15,  50 => 14,  47 => 13,  45 => 12,  38 => 9,  36 => 6,  32 => 5,  26 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>{% block title %}BPO Nacre{% endblock %}</title>*/
/*         {% block stylesheets %}*/
/*             <link rel="stylesheet" href="{{ asset('bundles/bootstrap/css/bootstrap.css') }}" type="text/css" />*/
/*         {% endblock %}*/
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*     </head>*/
/*     <body>*/
/*         {% block body %}{% endblock %}*/
/*         */
/*         {% for flash_message in app.session.flashBag.get('info') %}*/
/*             <div class="alert alert-info alert-dismissible" role="alert">*/
/*                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>*/
/*                 {{ flash_message }}*/
/*             </div>*/
/*         {% endfor %}*/
/*         */
/*         {% for flash_message in app.session.flashBag.get('error') %}*/
/*             <div class="alert alert-danger alert-dismissible" role="alert">*/
/*                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>*/
/*                 {{ flash_message }}*/
/*             </div>*/
/*         {% endfor %}*/
/*         */
/*         {% block javascripts %}*/
/*             <script src="{{ asset('bundles/jquery/jquery.js') }}" type="text/javascript"></script>*/
/*             <script src="{{ asset('bundles/bootstrap/js/bootstrap.js') }}"></script>*/
/*         {% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
