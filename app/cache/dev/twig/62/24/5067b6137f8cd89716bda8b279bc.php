<?php

/* WebProfilerBundle:Profiler:search.html.twig */
class __TwigTemplate_62245067b6137f8cd89716bda8b279bc extends Twig_Template
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
        echo "<div class=\"search clearfix\">
    <h3>
        <img style=\"margin: 0 5px 0 0; vertical-align: middle;\" width=\"16\" height=\"16\" alt=\"Search\" src=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webprofiler/images/search.png"), "html", null, true);
        echo "\" />
        Search
    </h3>
    <form action=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_profiler_search"), "html", null, true);
        echo "\" method=\"get\">
        <label for=\"ip\">IP</label>
        <input type=\"text\" name=\"ip\" id=\"ip\" value=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getContext($context, "ip"), "html", null, true);
        echo "\" />
        <div class=\"clear_fix\"></div>
        <label for=\"url\">URL</label>
        <input type=\"text\" name=\"url\" id=\"url\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getContext($context, "url"), "html", null, true);
        echo "\" />
        <div class=\"clear_fix\"></div>
        <label for=\"token\">Token</label>
        <input type=\"text\" name=\"token\" id=\"token\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "\" />
        <div class=\"clear_fix\"></div>
        <label for=\"limit\">Limit</label>
        <select name=\"limit\" id=\"limit\">
            ";
        // line 18
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(array(0 => 10, 1 => 50, 2 => 100));
        foreach ($context['_seq'] as $context["_key"] => $context["l"]) {
            // line 19
            echo "                <option";
            echo ((($this->getContext($context, "l") == $this->getContext($context, "limit"))) ? (" selected=\"selected\"") : (""));
            echo ">";
            echo twig_escape_filter($this->env, $this->getContext($context, "l"), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['l'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 21
        echo "        </select>

        <button type=\"submit\">
            <span class=\"border_l\">
                <span class=\"border_r\">
                    <span class=\"btn_bg\">SEARCH</span>
                </span>
            </span>
        </button>
        <div class=\"clear_fix\"></div>
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:search.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  332 => 137,  329 => 136,  323 => 135,  321 => 134,  314 => 133,  310 => 132,  304 => 129,  301 => 128,  298 => 127,  296 => 126,  276 => 117,  231 => 95,  229 => 94,  217 => 87,  203 => 81,  201 => 80,  194 => 76,  183 => 69,  180 => 68,  175 => 66,  118 => 36,  271 => 114,  262 => 111,  258 => 110,  255 => 109,  250 => 108,  248 => 107,  235 => 107,  228 => 103,  221 => 99,  214 => 95,  143 => 49,  170 => 63,  154 => 45,  151 => 53,  18 => 1,  150 => 43,  130 => 48,  100 => 27,  114 => 34,  306 => 130,  297 => 124,  291 => 121,  288 => 124,  286 => 123,  282 => 121,  277 => 116,  272 => 113,  266 => 110,  263 => 109,  261 => 108,  257 => 107,  252 => 105,  247 => 102,  241 => 99,  238 => 99,  236 => 98,  232 => 96,  227 => 94,  222 => 90,  216 => 88,  213 => 85,  207 => 83,  202 => 83,  197 => 80,  191 => 77,  186 => 75,  182 => 74,  172 => 69,  166 => 66,  163 => 65,  157 => 55,  147 => 60,  138 => 55,  136 => 40,  164 => 59,  155 => 59,  149 => 56,  112 => 34,  106 => 35,  65 => 18,  101 => 37,  85 => 28,  56 => 14,  45 => 9,  21 => 3,  144 => 54,  140 => 48,  119 => 34,  83 => 26,  68 => 20,  66 => 21,  36 => 8,  110 => 40,  76 => 27,  61 => 17,  209 => 84,  205 => 82,  196 => 77,  192 => 78,  189 => 73,  178 => 71,  176 => 70,  165 => 63,  161 => 58,  152 => 61,  148 => 53,  145 => 49,  141 => 56,  134 => 51,  132 => 43,  127 => 23,  123 => 38,  109 => 36,  93 => 35,  90 => 36,  54 => 13,  133 => 49,  124 => 22,  111 => 33,  80 => 25,  60 => 27,  52 => 13,  72 => 17,  64 => 24,  53 => 23,  42 => 10,  34 => 11,  26 => 3,  224 => 91,  215 => 90,  211 => 86,  204 => 84,  200 => 87,  195 => 80,  193 => 79,  190 => 78,  188 => 76,  185 => 75,  179 => 72,  177 => 67,  171 => 67,  162 => 63,  158 => 57,  156 => 56,  153 => 59,  146 => 55,  142 => 48,  137 => 46,  126 => 39,  120 => 37,  117 => 44,  103 => 28,  74 => 21,  47 => 11,  32 => 8,  97 => 26,  95 => 30,  88 => 20,  78 => 25,  71 => 21,  40 => 9,  25 => 5,  23 => 29,  22 => 3,  17 => 1,  92 => 23,  86 => 27,  79 => 20,  29 => 4,  24 => 3,  19 => 2,  69 => 21,  63 => 28,  58 => 26,  49 => 12,  43 => 10,  37 => 6,  20 => 1,  139 => 47,  131 => 54,  128 => 49,  125 => 36,  121 => 21,  115 => 26,  107 => 41,  99 => 34,  96 => 36,  91 => 31,  82 => 20,  77 => 24,  75 => 18,  57 => 13,  50 => 12,  46 => 11,  44 => 14,  39 => 10,  33 => 5,  30 => 4,  27 => 6,  135 => 41,  129 => 38,  122 => 47,  116 => 33,  113 => 43,  108 => 28,  104 => 40,  102 => 6,  94 => 32,  89 => 22,  87 => 44,  84 => 29,  81 => 28,  73 => 23,  70 => 24,  67 => 25,  62 => 22,  59 => 21,  55 => 19,  51 => 18,  48 => 10,  41 => 9,  38 => 11,  35 => 6,  31 => 10,  28 => 3,);
    }
}
