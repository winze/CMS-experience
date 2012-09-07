<?php

/* SensioDistributionBundle:Configurator:form.html.twig */
class __TwigTemplate_d1700257a5f326529a5043e133c0c4c4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("form_div_layout.html.twig");

        $this->blocks = array(
            'field_rows' => array($this, 'block_field_rows'),
            'field_row' => array($this, 'block_field_row'),
            'field_label' => array($this, 'block_field_label'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "form_div_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_field_rows($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"symfony-form-errors\">
        ";
        // line 5
        echo $this->env->getExtension('form')->renderErrors($this->getContext($context, "form"));
        echo "
    </div>
    ";
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "form"), "children"));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 8
            echo "        ";
            echo $this->env->getExtension('form')->renderRow($this->getContext($context, "child"));
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
    }

    // line 12
    public function block_field_row($context, array $blocks = array())
    {
        // line 13
        echo "    <div class=\"symfony-form-row\">
        ";
        // line 14
        echo $this->env->getExtension('form')->renderLabel($this->getContext($context, "form"));
        echo "
        <div class=\"symfony-form-field\">
            ";
        // line 16
        echo $this->env->getExtension('form')->renderWidget($this->getContext($context, "form"));
        echo "
            <div class=\"symfony-form-errors\">
                ";
        // line 18
        echo $this->env->getExtension('form')->renderErrors($this->getContext($context, "form"));
        echo "
            </div>
        </div>
    </div>
";
    }

    // line 24
    public function block_field_label($context, array $blocks = array())
    {
        // line 25
        echo "    <label for=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\">
        ";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getContext($context, "label")), "html", null, true);
        echo "
        ";
        // line 27
        if ($this->getContext($context, "required")) {
            // line 28
            echo "            <span class=\"symfony-form-required\" title=\"This field is required\">*</span>
        ";
        }
        // line 30
        echo "    </label>
";
    }

    public function getTemplateName()
    {
        return "SensioDistributionBundle:Configurator:form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  332 => 137,  329 => 136,  323 => 135,  321 => 134,  314 => 133,  310 => 132,  304 => 129,  301 => 128,  298 => 127,  296 => 126,  276 => 117,  231 => 95,  229 => 94,  217 => 87,  203 => 81,  201 => 80,  194 => 76,  183 => 69,  180 => 68,  175 => 66,  118 => 36,  271 => 114,  262 => 111,  258 => 110,  255 => 109,  250 => 108,  248 => 107,  235 => 107,  228 => 103,  221 => 99,  214 => 95,  143 => 49,  170 => 63,  154 => 45,  151 => 53,  150 => 43,  130 => 48,  100 => 27,  114 => 34,  306 => 130,  297 => 124,  291 => 121,  288 => 124,  286 => 123,  282 => 121,  277 => 116,  272 => 113,  266 => 110,  263 => 109,  261 => 108,  257 => 107,  252 => 105,  247 => 102,  241 => 99,  238 => 99,  236 => 98,  232 => 96,  227 => 94,  222 => 90,  216 => 88,  213 => 85,  207 => 83,  202 => 83,  197 => 80,  191 => 77,  186 => 75,  182 => 74,  172 => 69,  166 => 66,  163 => 65,  157 => 55,  147 => 60,  138 => 55,  136 => 40,  164 => 59,  155 => 59,  149 => 56,  144 => 54,  140 => 48,  112 => 34,  65 => 16,  66 => 21,  101 => 37,  85 => 28,  83 => 26,  68 => 20,  56 => 14,  45 => 9,  21 => 3,  119 => 34,  106 => 35,  98 => 35,  36 => 5,  110 => 40,  76 => 25,  61 => 16,  209 => 84,  205 => 82,  196 => 77,  192 => 78,  189 => 73,  178 => 71,  176 => 70,  165 => 63,  161 => 58,  152 => 61,  148 => 57,  145 => 49,  141 => 56,  134 => 51,  132 => 43,  127 => 23,  123 => 38,  109 => 36,  93 => 28,  90 => 36,  54 => 12,  133 => 49,  124 => 22,  111 => 33,  80 => 25,  60 => 14,  52 => 13,  72 => 21,  64 => 21,  53 => 13,  42 => 8,  34 => 5,  26 => 3,  224 => 91,  215 => 90,  211 => 86,  204 => 84,  200 => 87,  195 => 80,  193 => 79,  190 => 78,  188 => 76,  185 => 75,  179 => 72,  177 => 67,  171 => 67,  162 => 63,  158 => 57,  156 => 56,  153 => 59,  146 => 55,  142 => 48,  137 => 46,  126 => 39,  120 => 37,  117 => 44,  103 => 28,  74 => 38,  47 => 15,  32 => 8,  97 => 30,  95 => 30,  88 => 32,  78 => 21,  71 => 20,  40 => 8,  25 => 5,  23 => 29,  22 => 3,  17 => 1,  92 => 23,  86 => 27,  79 => 24,  29 => 5,  24 => 3,  19 => 1,  69 => 21,  63 => 28,  58 => 26,  49 => 11,  43 => 8,  37 => 7,  20 => 2,  139 => 47,  131 => 54,  128 => 49,  125 => 36,  121 => 21,  115 => 26,  107 => 41,  99 => 34,  96 => 36,  91 => 27,  82 => 25,  77 => 23,  75 => 21,  57 => 13,  50 => 13,  46 => 11,  44 => 10,  39 => 7,  33 => 4,  30 => 7,  27 => 3,  135 => 41,  129 => 38,  122 => 47,  116 => 33,  113 => 43,  108 => 28,  104 => 40,  102 => 6,  94 => 32,  89 => 22,  87 => 26,  84 => 29,  81 => 24,  73 => 23,  70 => 18,  67 => 18,  62 => 17,  59 => 21,  55 => 14,  51 => 18,  48 => 12,  41 => 7,  38 => 12,  35 => 7,  31 => 4,  28 => 3,);
    }
}
