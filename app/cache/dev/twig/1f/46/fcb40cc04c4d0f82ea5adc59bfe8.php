<?php

/* AcmeDemoBundle:Demo:contact.html.twig */
class __TwigTemplate_1f46fcb40cc04c4d0f82ea5adc59bfe8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AcmeDemoBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AcmeDemoBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Symfony - Contact form";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <form action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_demo_contact"), "html", null, true);
        echo "\" method=\"POST\" id=\"contact_form\">
        ";
        // line 7
        echo $this->env->getExtension('form')->renderErrors($this->getContext($context, "form"));
        echo "

        ";
        // line 9
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "email"));
        echo "
        ";
        // line 10
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "message"));
        echo "

        ";
        // line 12
        echo $this->env->getExtension('form')->renderRest($this->getContext($context, "form"));
        echo "
        <input type=\"submit\" value=\"Send\" class=\"symfony-button-grey\" />
    </form>
";
    }

    public function getTemplateName()
    {
        return "AcmeDemoBundle:Demo:contact.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  18 => 1,  150 => 27,  130 => 24,  100 => 19,  114 => 30,  306 => 131,  297 => 124,  291 => 121,  288 => 120,  286 => 119,  282 => 118,  277 => 116,  272 => 113,  266 => 110,  263 => 109,  261 => 108,  257 => 107,  252 => 105,  247 => 102,  241 => 99,  238 => 98,  236 => 97,  232 => 96,  227 => 94,  222 => 91,  216 => 88,  213 => 87,  207 => 85,  202 => 83,  197 => 80,  191 => 77,  186 => 75,  182 => 74,  172 => 69,  166 => 66,  163 => 65,  157 => 63,  147 => 60,  138 => 55,  136 => 40,  164 => 66,  155 => 59,  149 => 56,  112 => 34,  106 => 43,  65 => 22,  101 => 37,  85 => 31,  56 => 17,  45 => 8,  21 => 1,  144 => 54,  140 => 53,  119 => 45,  83 => 16,  68 => 18,  66 => 17,  36 => 6,  110 => 40,  76 => 27,  61 => 20,  209 => 84,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 64,  152 => 61,  148 => 53,  145 => 56,  141 => 56,  134 => 51,  132 => 52,  127 => 23,  123 => 30,  109 => 33,  93 => 35,  90 => 45,  54 => 11,  133 => 39,  124 => 22,  111 => 29,  80 => 29,  60 => 19,  52 => 15,  72 => 24,  64 => 24,  53 => 12,  42 => 11,  34 => 5,  26 => 3,  224 => 96,  215 => 90,  211 => 86,  204 => 84,  200 => 83,  195 => 80,  193 => 79,  190 => 78,  188 => 76,  185 => 76,  179 => 72,  177 => 72,  171 => 67,  162 => 63,  158 => 61,  156 => 55,  153 => 59,  146 => 55,  142 => 54,  137 => 51,  126 => 31,  120 => 48,  117 => 44,  103 => 20,  74 => 23,  47 => 10,  32 => 5,  97 => 23,  95 => 47,  88 => 20,  78 => 25,  71 => 19,  40 => 7,  25 => 4,  23 => 29,  22 => 3,  17 => 1,  92 => 37,  86 => 31,  79 => 39,  29 => 3,  24 => 9,  19 => 2,  69 => 18,  63 => 20,  58 => 14,  49 => 11,  43 => 8,  37 => 6,  20 => 1,  139 => 26,  131 => 54,  128 => 49,  125 => 42,  121 => 21,  115 => 26,  107 => 41,  99 => 34,  96 => 36,  91 => 21,  82 => 33,  77 => 14,  75 => 37,  57 => 13,  50 => 10,  46 => 9,  44 => 8,  39 => 10,  33 => 5,  30 => 2,  27 => 3,  135 => 50,  129 => 47,  122 => 47,  116 => 33,  113 => 43,  108 => 28,  104 => 29,  102 => 6,  94 => 22,  89 => 31,  87 => 44,  84 => 27,  81 => 41,  73 => 28,  70 => 24,  67 => 25,  62 => 19,  59 => 19,  55 => 12,  51 => 11,  48 => 8,  41 => 7,  38 => 6,  35 => 5,  31 => 4,  28 => 3,);
    }
}
