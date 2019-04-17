<?php

/* C:\xampp\htdocs/themes/realtec/pages/index.htm */
class __TwigTemplate_c93bb8e9990be7d7d7cc9ccd14885f97b33bbbc860b351b8a522dc5422fe9ebd extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!DOCTYPE html><html><head><meta charset=utf-8><meta name=token content=\"";
        echo twig_escape_filter($this->env, ($context["token"] ?? null), "html", null, true);
        echo "\"><meta name=viewport content=\"width=device-width,initial-scale=1\"><link href=\"https://fonts.googleapis.com/css?family=Open+Sans:300,400\" rel=stylesheet><link rel=stylesheet href=https://use.fontawesome.com/releases/v5.8.1/css/all.css integrity=sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf crossorigin=anonymous><title>Realtec - Cotação</title><link href=/themes/realtec/assets/static/css/app.eede209e6b85eafa3e910a13a0359ea4.css rel=stylesheet></head><body><div id=app></div><script type=text/javascript src=/themes/realtec/assets/static/js/manifest.97752d5d79e7cddddb7d.js></script><script type=text/javascript src=/themes/realtec/assets/static/js/vendor.d3287bfe89f177703b08.js></script><script type=text/javascript src=/themes/realtec/assets/static/js/app.4750160b16a58f21f8c1.js></script></body></html>";
    }

    public function getTemplateName()
    {
        return "C:\\xampp\\htdocs/themes/realtec/pages/index.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html><html><head><meta charset=utf-8><meta name=token content=\"{{ token }}\"><meta name=viewport content=\"width=device-width,initial-scale=1\"><link href=\"https://fonts.googleapis.com/css?family=Open+Sans:300,400\" rel=stylesheet><link rel=stylesheet href=https://use.fontawesome.com/releases/v5.8.1/css/all.css integrity=sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf crossorigin=anonymous><title>Realtec - Cotação</title><link href=/themes/realtec/assets/static/css/app.eede209e6b85eafa3e910a13a0359ea4.css rel=stylesheet></head><body><div id=app></div><script type=text/javascript src=/themes/realtec/assets/static/js/manifest.97752d5d79e7cddddb7d.js></script><script type=text/javascript src=/themes/realtec/assets/static/js/vendor.d3287bfe89f177703b08.js></script><script type=text/javascript src=/themes/realtec/assets/static/js/app.4750160b16a58f21f8c1.js></script></body></html>", "C:\\xampp\\htdocs/themes/realtec/pages/index.htm", "");
    }
}
