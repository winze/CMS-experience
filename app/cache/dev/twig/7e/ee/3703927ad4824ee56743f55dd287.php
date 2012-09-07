<?php

/* AcmeDemoBundle::layout.html.twig */
class __TwigTemplate_7eee3703927ad4824ee56743f55dd287 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content_header' => array($this, 'block_content_header'),
            'content_header_more' => array($this, 'block_content_header_more'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmedemo/css/demo.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
        <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"shortcut icon\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        <div id=\"symfony-wrapper\">
            <div id=\"symfony-header\">
                <a href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_welcome"), "html", null, true);
        echo "\">
                    <img src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmedemo/images/logo.gif"), "html", null, true);
        echo "\" alt=\"Symfony\">
                </a>
                <form id=\"symfony-search\" method=\"GET\" action=\"http://symfony.com/search\">
                    <label for=\"symfony-search-field\"><span>Search on Symfony Website</span></label>
                    <input name=\"q\" id=\"symfony-search-field\" type=\"search\" placeholder=\"Search on Symfony website\" class=\"medium_txt\">
                    <input type=\"submit\" class=\"symfony-button-grey\" value=\"OK\" />
                </form>
            </div>

            ";
        // line 22
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flash", array(0 => "notice"), "method")) {
            // line 23
            echo "                <div class=\"flash-message\">
                    <em>Notice</em>: ";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flash", array(0 => "notice"), "method"), "html", null, true);
            echo "
                </div>
            ";
        }
        // line 27
        echo "
            ";
        // line 28
        $this->displayBlock('content_header', $context, $blocks);
        // line 37
        echo "
            <div class=\"symfony-content\">
                ";
        // line 39
        $this->displayBlock('content', $context, $blocks);
        // line 41
        echo "            </div>

            ";
        // line 43
        if (array_key_exists("code", $context)) {
            // line 44
            echo "                <h2>Code behind this page</h2>
                <div class=\"symfony-content\">";
            // line 45
            echo $this->getContext($context, "code");
            echo "</div>
            ";
        }
        // line 47
        echo "        </div>
    </body>
</html>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "Demo Bundle";
    }

    // line 28
    public function block_content_header($context, array $blocks = array())
    {
        // line 29
        echo "                <ul id=\"menu\">
                    ";
        // line 30
        $this->displayBlock('content_header_more', $context, $blocks);
        // line 33
        echo "                </ul>

                <div style=\"clear: both\"></div>
            ";
    }

    // line 30
    public function block_content_header_more($context, array $blocks = array())
    {
        // line 31
        echo "                        <li><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_demo"), "html", null, true);
        echo "\">Demo Home</a></li>
                    ";
    }

    // line 39
    public function block_content($context, array $blocks = array())
    {
        // line 40
        echo "                ";
    }

    public function getTemplateName()
    {
        return "AcmeDemoBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 27,  130 => 24,  100 => 19,  114 => 30,  306 => 131,  297 => 124,  291 => 121,  288 => 120,  286 => 119,  282 => 118,  277 => 116,  272 => 113,  266 => 110,  263 => 109,  261 => 108,  257 => 107,  252 => 105,  247 => 102,  241 => 99,  238 => 98,  236 => 97,  232 => 96,  227 => 94,  222 => 91,  216 => 88,  213 => 87,  207 => 85,  202 => 83,  197 => 80,  191 => 77,  186 => 75,  182 => 74,  172 => 69,  166 => 66,  163 => 65,  157 => 63,  147 => 60,  138 => 55,  136 => 40,  164 => 66,  155 => 59,  149 => 56,  144 => 54,  140 => 53,  112 => 34,  65 => 17,  66 => 17,  101 => 37,  85 => 43,  83 => 28,  68 => 18,  56 => 15,  45 => 12,  21 => 1,  119 => 43,  106 => 43,  98 => 35,  36 => 8,  110 => 40,  76 => 26,  61 => 23,  209 => 84,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 64,  152 => 61,  148 => 57,  145 => 56,  141 => 56,  134 => 51,  132 => 52,  127 => 23,  123 => 30,  109 => 33,  93 => 35,  90 => 45,  54 => 11,  133 => 39,  124 => 22,  111 => 29,  80 => 32,  60 => 18,  52 => 14,  72 => 24,  64 => 24,  53 => 13,  42 => 11,  34 => 4,  26 => 4,  224 => 96,  215 => 90,  211 => 86,  204 => 84,  200 => 83,  195 => 80,  193 => 79,  190 => 78,  188 => 76,  185 => 76,  179 => 72,  177 => 72,  171 => 67,  162 => 63,  158 => 61,  156 => 60,  153 => 59,  146 => 55,  142 => 54,  137 => 51,  126 => 31,  120 => 48,  117 => 44,  103 => 20,  74 => 13,  47 => 13,  32 => 7,  97 => 23,  95 => 47,  88 => 20,  78 => 21,  71 => 19,  40 => 9,  25 => 4,  23 => 3,  22 => 3,  17 => 1,  92 => 37,  86 => 31,  79 => 39,  29 => 5,  24 => 3,  19 => 2,  69 => 18,  63 => 20,  58 => 15,  49 => 12,  43 => 12,  37 => 7,  20 => 2,  139 => 26,  131 => 54,  128 => 49,  125 => 42,  121 => 21,  115 => 26,  107 => 41,  99 => 34,  96 => 36,  91 => 21,  82 => 33,  77 => 14,  75 => 37,  57 => 12,  50 => 18,  46 => 11,  44 => 6,  39 => 10,  33 => 7,  30 => 8,  27 => 5,  135 => 50,  129 => 47,  122 => 47,  116 => 33,  113 => 43,  108 => 28,  104 => 29,  102 => 6,  94 => 22,  89 => 31,  87 => 44,  84 => 27,  81 => 41,  73 => 28,  70 => 27,  67 => 25,  62 => 19,  59 => 22,  55 => 13,  51 => 12,  48 => 9,  41 => 8,  38 => 6,  35 => 7,  31 => 6,  28 => 2,);
    }
}
