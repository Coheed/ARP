<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* core/themes/claro/templates/filter/filter-guidelines.html.twig */
class __TwigTemplate_bc1190cef75921c3704b8df3d2af95d9 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension(SandboxExtension::class);
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 21
        $context["classes"] = ["filter-guidelines__item", ("filter-guidelines__item--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source,         // line 23
($context["format"] ?? null), "id", [], "any", false, false, true, 23), 23, $this->source)))];
        // line 26
        yield "<div";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 26), 26, $this->source), "html", null, true);
        yield ">
  <h4 class=\"label\">";
        // line 27
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["format"] ?? null), "label", [], "any", false, false, true, 27), 27, $this->source), "html", null, true);
        yield "</h4>
  ";
        // line 28
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["tips"] ?? null), 28, $this->source), "html", null, true);
        yield "
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["format", "attributes", "tips"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "core/themes/claro/templates/filter/filter-guidelines.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  52 => 28,  48 => 27,  43 => 26,  41 => 23,  40 => 21,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override for guidelines for a text format.
 *
 * Available variables:
 * - format: Contains information about the current text format, including the
 *   following:
 *   - name: The name of the text format, potentially unsafe and needs to be
 *     escaped.
 *   - format: The machine name of the text format, e.g. 'basic_html'.
 * - attributes: HTML attributes for the containing element.
 * - tips: Descriptions and a CSS ID in the form of 'module-name/filter-id'
 *   (only used when 'long' is TRUE) for each filter in one or more text
 *   formats.
 *
 * @see template_preprocess_filter_tips()
 */
#}
{%
  set classes = [
    'filter-guidelines__item',
    'filter-guidelines__item--' ~ format.id|clean_class,
  ]
%}
<div{{ attributes.addClass(classes) }}>
  <h4 class=\"label\">{{ format.label }}</h4>
  {{ tips }}
</div>
", "core/themes/claro/templates/filter/filter-guidelines.html.twig", "/var/www/html/drupal/core/themes/claro/templates/filter/filter-guidelines.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 21);
        static $filters = array("clean_class" => 23, "escape" => 26);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set'],
                ['clean_class', 'escape'],
                [],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
