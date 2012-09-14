<?php

/* ::base.html.twig */
class __TwigTemplate_698ac01d21968e65e8e5fb1f8bfabfce extends Twig_Template
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
        // line 7
        echo "        <link rel=\"shortcut icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome!";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
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
        return array (  67 => 11,  62 => 10,  57 => 6,  51 => 5,  45 => 12,  31 => 6,  27 => 5,  21 => 1,  156 => 55,  152 => 54,  148 => 53,  144 => 52,  140 => 51,  135 => 50,  132 => 49,  127 => 45,  121 => 46,  119 => 45,  108 => 37,  96 => 31,  83 => 26,  77 => 23,  73 => 22,  68 => 21,  66 => 20,  53 => 9,  50 => 8,  44 => 6,  40 => 10,  33 => 7,  30 => 2,  104 => 40,  102 => 34,  95 => 35,  91 => 28,  88 => 33,  86 => 32,  82 => 30,  80 => 29,  70 => 21,  64 => 18,  60 => 16,  58 => 15,  52 => 12,  48 => 10,  46 => 9,  42 => 11,  36 => 4,  32 => 4,  29 => 3,  26 => 2,);
    }
}
