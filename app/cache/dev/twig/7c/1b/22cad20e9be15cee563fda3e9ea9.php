<?php

/* WebProfilerBundle:Profiler:toolbar_js.html.twig */
class __TwigTemplate_7c1b22cad20e9be15cee563fda3e9ea9 extends Twig_Template
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
        echo "<div id=\"sfwdt";
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "\" style=\"display: none\"></div>
<script type=\"text/javascript\">/*<![CDATA[*/
    (function () {
        var wdt, xhr;
        wdt = document.getElementById('sfwdt";
        // line 5
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "');
        if (window.XMLHttpRequest) {
            xhr = new XMLHttpRequest();
        } else {
            xhr = new ActiveXObject('Microsoft.XMLHTTP');
        }
        xhr.open('GET', '";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_wdt", array("token" => $this->getContext($context, "token"))), "html", null, true);
        echo "', true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function(state) {
            if (4 === xhr.readyState && 200 === xhr.status && -1 !== xhr.responseText.indexOf('sf-toolbarreset')) {
                wdt.innerHTML = xhr.responseText;
                wdt.style.display = 'block';
            }
        };
        xhr.send('');
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:toolbar_js.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 13,  49 => 12,  41 => 8,  69 => 18,  66 => 17,  64 => 16,  59 => 15,  53 => 13,  46 => 11,  37 => 7,  26 => 4,  24 => 3,  19 => 2,  115 => 26,  111 => 24,  94 => 22,  88 => 20,  71 => 19,  68 => 18,  65 => 17,  56 => 15,  47 => 13,  39 => 8,  35 => 7,  32 => 6,  29 => 5,  25 => 5,  22 => 3,  20 => 2,  17 => 1,  67 => 11,  62 => 10,  45 => 12,  42 => 9,  33 => 7,  27 => 5,  21 => 1,  43 => 10,  38 => 6,  36 => 8,  150 => 27,  136 => 26,  133 => 25,  130 => 24,  127 => 23,  124 => 22,  121 => 21,  103 => 20,  100 => 19,  97 => 23,  91 => 21,  77 => 14,  74 => 13,  57 => 6,  54 => 11,  51 => 12,  48 => 5,  40 => 9,  34 => 11,  31 => 6,  28 => 2,);
    }
}
