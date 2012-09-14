<?php

/* SensioDistributionBundle:Configurator:steps.html.twig */
class __TwigTemplate_e745991591b43577539938f8a058b246 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"symfony-block-steps\">
    ";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, $this->getContext($context, "count")));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 3
            echo "
      ";
            // line 4
            if (($this->getContext($context, "i") == ($this->getContext($context, "index") + 1))) {
                // line 5
                echo "          <span class=\"selected\">Step ";
                echo twig_escape_filter($this->env, $this->getContext($context, "i"), "html", null, true);
                echo "</span>
      ";
            } else {
                // line 7
                echo "          <span>Step ";
                echo twig_escape_filter($this->env, $this->getContext($context, "i"), "html", null, true);
                echo "</span>
      ";
            }
            // line 9
            echo "
      ";
            // line 10
            if (($this->getContext($context, "i") != $this->getContext($context, "count"))) {
                // line 11
                echo "        &gt;
      ";
            }
            // line 13
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 14
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "SensioDistributionBundle:Configurator:steps.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  332 => 137,  329 => 136,  323 => 135,  321 => 134,  314 => 133,  310 => 132,  304 => 129,  301 => 128,  298 => 127,  296 => 126,  276 => 117,  231 => 95,  229 => 94,  217 => 87,  203 => 81,  201 => 80,  194 => 76,  183 => 69,  180 => 68,  175 => 66,  118 => 36,  271 => 114,  262 => 111,  258 => 110,  255 => 109,  250 => 108,  248 => 107,  235 => 107,  228 => 103,  221 => 99,  214 => 95,  143 => 49,  170 => 63,  154 => 45,  151 => 53,  18 => 1,  150 => 43,  130 => 48,  100 => 27,  114 => 34,  306 => 130,  297 => 124,  291 => 121,  288 => 124,  286 => 123,  282 => 121,  277 => 116,  272 => 113,  266 => 110,  263 => 109,  261 => 108,  257 => 107,  252 => 105,  247 => 102,  241 => 99,  238 => 99,  236 => 98,  232 => 96,  227 => 94,  222 => 90,  216 => 88,  213 => 85,  207 => 83,  202 => 83,  197 => 80,  191 => 77,  186 => 75,  182 => 74,  172 => 69,  166 => 66,  163 => 65,  157 => 55,  147 => 60,  138 => 55,  136 => 40,  164 => 59,  155 => 59,  149 => 56,  112 => 34,  106 => 35,  65 => 17,  101 => 37,  85 => 28,  56 => 14,  45 => 9,  21 => 3,  144 => 54,  140 => 48,  119 => 34,  83 => 26,  68 => 20,  66 => 21,  36 => 6,  110 => 40,  76 => 25,  61 => 16,  209 => 84,  205 => 82,  196 => 77,  192 => 78,  189 => 73,  178 => 71,  176 => 70,  165 => 63,  161 => 58,  152 => 61,  148 => 53,  145 => 49,  141 => 56,  134 => 51,  132 => 43,  127 => 23,  123 => 38,  109 => 36,  93 => 35,  90 => 36,  54 => 19,  133 => 49,  124 => 22,  111 => 33,  80 => 25,  60 => 20,  52 => 13,  72 => 17,  64 => 21,  53 => 23,  42 => 8,  34 => 11,  26 => 3,  224 => 91,  215 => 90,  211 => 86,  204 => 84,  200 => 87,  195 => 80,  193 => 79,  190 => 78,  188 => 76,  185 => 75,  179 => 72,  177 => 67,  171 => 67,  162 => 63,  158 => 57,  156 => 56,  153 => 59,  146 => 55,  142 => 48,  137 => 46,  126 => 39,  120 => 37,  117 => 44,  103 => 28,  74 => 38,  47 => 15,  32 => 8,  97 => 26,  95 => 30,  88 => 32,  78 => 25,  71 => 20,  40 => 8,  25 => 5,  23 => 29,  22 => 3,  17 => 1,  92 => 23,  86 => 27,  79 => 20,  29 => 5,  24 => 3,  19 => 1,  69 => 21,  63 => 28,  58 => 26,  49 => 16,  43 => 10,  37 => 6,  20 => 2,  139 => 47,  131 => 54,  128 => 49,  125 => 36,  121 => 21,  115 => 26,  107 => 41,  99 => 34,  96 => 36,  91 => 31,  82 => 28,  77 => 25,  75 => 21,  57 => 15,  50 => 13,  46 => 11,  44 => 10,  39 => 7,  33 => 5,  30 => 7,  27 => 4,  135 => 41,  129 => 38,  122 => 47,  116 => 33,  113 => 43,  108 => 28,  104 => 40,  102 => 6,  94 => 32,  89 => 22,  87 => 44,  84 => 29,  81 => 24,  73 => 23,  70 => 24,  67 => 15,  62 => 17,  59 => 21,  55 => 19,  51 => 18,  48 => 12,  41 => 9,  38 => 12,  35 => 7,  31 => 10,  28 => 7,);
    }
}
