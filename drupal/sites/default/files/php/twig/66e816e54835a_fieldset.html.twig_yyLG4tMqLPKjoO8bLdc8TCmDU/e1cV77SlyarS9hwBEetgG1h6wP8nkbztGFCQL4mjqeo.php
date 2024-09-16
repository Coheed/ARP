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

/* themes/contrib/bootstrap_barrio/templates/form/fieldset.html.twig */
class __TwigTemplate_a3ac58b54c2e331b56c51215fe58064a extends Template
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
        // line 24
        $context["classes"] = ["js-form-item", "form-item", "js-form-wrapper", "form-wrapper", "mb-3", ((        // line 30
($context["errors"] ?? null)) ? ("has-error") : (""))];
        // line 33
        yield "<fieldset";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 33), 33, $this->source), "html", null, true);
        yield ">
  ";
        // line 35
        $context["legend_span_classes"] = ["fieldset-legend", ((        // line 37
($context["required"] ?? null)) ? ("js-form-required") : ("")), ((        // line 38
($context["required"] ?? null)) ? ("form-required") : (""))];
        // line 41
        yield "  ";
        // line 42
        yield "  <legend";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["legend"] ?? null), "attributes", [], "any", false, false, true, 42), 42, $this->source), "html", null, true);
        yield ">
    <span";
        // line 43
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["legend_span"] ?? null), "attributes", [], "any", false, false, true, 43), "addClass", [($context["legend_span_classes"] ?? null)], "method", false, false, true, 43), 43, $this->source), "html", null, true);
        yield ">";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["legend"] ?? null), "title", [], "any", false, false, true, 43), 43, $this->source), "html", null, true);
        yield "</span>
  </legend>
  <div class=\"fieldset-wrapper\">
    ";
        // line 46
        if (($context["errors"] ?? null)) {
            // line 47
            yield "      <div class=\"alert alert-danger\" role=\"alert\">
        <strong>";
            // line 48
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["errors"] ?? null), 48, $this->source), "html", null, true);
            yield "</strong>
      </div>
    ";
        }
        // line 51
        yield "    ";
        if (($context["prefix"] ?? null)) {
            // line 52
            yield "      <span class=\"field-prefix\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["prefix"] ?? null), 52, $this->source), "html", null, true);
            yield "</span>
    ";
        }
        // line 54
        yield "    ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null), 54, $this->source), "html", null, true);
        yield "
    ";
        // line 55
        if (($context["suffix"] ?? null)) {
            // line 56
            yield "      <span class=\"field-suffix\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["suffix"] ?? null), 56, $this->source), "html", null, true);
            yield "</span>
    ";
        }
        // line 58
        yield "    ";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 58)) {
            // line 59
            yield "      <small";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 59), "addClass", ["description", "text-muted"], "method", false, false, true, 59), 59, $this->source), "html", null, true);
            yield ">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 59), 59, $this->source), "html", null, true);
            yield "</small>
    ";
        }
        // line 61
        yield "  </div>
</fieldset>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["errors", "attributes", "required", "legend", "legend_span", "prefix", "children", "suffix", "description"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/contrib/bootstrap_barrio/templates/form/fieldset.html.twig";
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
        return array (  111 => 61,  103 => 59,  100 => 58,  94 => 56,  92 => 55,  87 => 54,  81 => 52,  78 => 51,  72 => 48,  69 => 47,  67 => 46,  59 => 43,  54 => 42,  52 => 41,  50 => 38,  49 => 37,  48 => 35,  43 => 33,  41 => 30,  40 => 24,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override for a fieldset element and its children.
 *
 * Available variables:
 * - attributes: HTML attributes for the fieldset element.
 * - errors: (optional) Any errors for this fieldset element, may not be set.
 * - required: Boolean indicating whether the fieldeset element is required.
 * - legend: The legend element containing the following properties:
 *   - title: Title of the fieldset, intended for use as the text of the legend.
 *   - attributes: HTML attributes to apply to the legend.
 * - description: The description element containing the following properties:
 *   - content: The description content of the fieldset.
 *   - attributes: HTML attributes to apply to the description container.
 * - children: The rendered child elements of the fieldset.
 * - prefix: The content to add before the fieldset children.
 * - suffix: The content to add after the fieldset children.
 *
 * @see template_preprocess_fieldset()
 */
#}
{%
  set classes = [
    'js-form-item',
    'form-item',
    'js-form-wrapper',
    'form-wrapper',
    'mb-3',
    errors ? 'has-error',
  ]
%}
<fieldset{{ attributes.addClass(classes) }}>
  {%
    set legend_span_classes = [
      'fieldset-legend',
      required ? 'js-form-required',
      required ? 'form-required',
    ]
  %}
  {#  Always wrap fieldset legends in a SPAN for CSS positioning. #}
  <legend{{ legend.attributes }}>
    <span{{ legend_span.attributes.addClass(legend_span_classes) }}>{{ legend.title }}</span>
  </legend>
  <div class=\"fieldset-wrapper\">
    {% if errors %}
      <div class=\"alert alert-danger\" role=\"alert\">
        <strong>{{ errors }}</strong>
      </div>
    {% endif %}
    {% if prefix %}
      <span class=\"field-prefix\">{{ prefix }}</span>
    {% endif %}
    {{ children }}
    {% if suffix %}
      <span class=\"field-suffix\">{{ suffix }}</span>
    {% endif %}
    {% if description.content %}
      <small{{ description.attributes.addClass('description', 'text-muted') }}>{{ description.content }}</small>
    {% endif %}
  </div>
</fieldset>
", "themes/contrib/bootstrap_barrio/templates/form/fieldset.html.twig", "/var/www/html/drupal/themes/contrib/bootstrap_barrio/templates/form/fieldset.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 24, "if" => 46);
        static $filters = array("escape" => 33);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape'],
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
