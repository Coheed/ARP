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

/* core/modules/media/templates/media-reference-help.html.twig */
class __TwigTemplate_f82b795a3eacb420c686f2a4b30df584 extends Template
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
        // line 10
        $context["classes"] = ["js-form-item", "form-item", "js-form-wrapper", "form-wrapper"];
        // line 17
        yield "<fieldset";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 17), 17, $this->source), "html", null, true);
        yield ">
  ";
        // line 19
        $context["legend_span_classes"] = ["fieldset-legend", ((        // line 21
($context["required"] ?? null)) ? ("js-form-required") : ("")), ((        // line 22
($context["required"] ?? null)) ? ("form-required") : (""))];
        // line 25
        yield "  ";
        // line 26
        yield "  <legend";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["legend_attributes"] ?? null), 26, $this->source), "html", null, true);
        yield ">
    <span";
        // line 27
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["legend_span_attributes"] ?? null), "addClass", [($context["legend_span_classes"] ?? null)], "method", false, false, true, 27), 27, $this->source), "html", null, true);
        yield ">";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["original_label"] ?? null), 27, $this->source), "html", null, true);
        yield "</span>
  </legend>

  <div class=\"js-form-item form-item\">
    ";
        // line 31
        if (($context["media_add_help"] ?? null)) {
            // line 32
            yield "      <h4";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["header_attributes"] ?? null), "addClass", ["label"], "method", false, false, true, 32), 32, $this->source), "html", null, true);
            yield ">
        ";
            // line 33
            yield t("Create new media", array());
            // line 36
            yield "      </h4><br />
      <div class=\"description\">
        ";
            // line 38
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["media_add_help"] ?? null), 38, $this->source), "html", null, true);
            yield "
      </div>
    ";
        }
        // line 41
        yield "
    ";
        // line 42
        if (($context["multiple"] ?? null)) {
            // line 43
            yield "      ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["table"] ?? null), 43, $this->source), "html", null, true);
            yield "
    ";
        } else {
            // line 45
            yield "      ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["elements"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
                // line 46
                yield "        ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["element"], 46, $this->source), "html", null, true);
                yield "
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 48
            yield "    ";
        }
        // line 49
        yield "
    <div";
        // line 50
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 50), "addClass", ["description"], "method", false, false, true, 50), 50, $this->source), "html", null, true);
        yield ">
      ";
        // line 51
        if ((($context["multiple"] ?? null) && CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 51))) {
            // line 52
            yield "        <ul>
          <li>";
            // line 53
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["media_list_help"] ?? null), 53, $this->source), "html", null, true);
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["media_list_link"] ?? null), 53, $this->source), "html", null, true);
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["allowed_types_help"] ?? null), 53, $this->source), "html", null, true);
            yield "</li>
          <li>";
            // line 54
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 54), 54, $this->source), "html", null, true);
            yield "</li>
        </ul>
      ";
        } else {
            // line 57
            yield "        ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["media_list_help"] ?? null), 57, $this->source), "html", null, true);
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["media_list_link"] ?? null), 57, $this->source), "html", null, true);
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["allowed_types_help"] ?? null), 57, $this->source), "html", null, true);
            yield "
      ";
        }
        // line 59
        yield "      ";
        if ((($context["multiple"] ?? null) && ($context["button"] ?? null))) {
            // line 60
            yield "        <div class=\"clearfix\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["button"] ?? null), 60, $this->source), "html", null, true);
            yield "</div>
      ";
        }
        // line 62
        yield "    </div>

  </div>
</fieldset>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "required", "legend_attributes", "legend_span_attributes", "original_label", "media_add_help", "header_attributes", "multiple", "table", "elements", "description", "media_list_help", "media_list_link", "allowed_types_help", "button"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "core/modules/media/templates/media-reference-help.html.twig";
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
        return array (  159 => 62,  153 => 60,  150 => 59,  140 => 57,  134 => 54,  126 => 53,  123 => 52,  121 => 51,  117 => 50,  114 => 49,  111 => 48,  102 => 46,  97 => 45,  91 => 43,  89 => 42,  86 => 41,  80 => 38,  76 => 36,  74 => 33,  69 => 32,  67 => 31,  58 => 27,  53 => 26,  51 => 25,  49 => 22,  48 => 21,  47 => 19,  42 => 17,  40 => 10,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override for media reference fields.
 *
 * @see template_preprocess_field_multiple_value_form()
 */
#}
{%
  set classes = [
    'js-form-item',
    'form-item',
    'js-form-wrapper',
    'form-wrapper',
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
  {# Always wrap fieldset legends in a <span> for CSS positioning. #}
  <legend{{ legend_attributes }}>
    <span{{ legend_span_attributes.addClass(legend_span_classes) }}>{{ original_label }}</span>
  </legend>

  <div class=\"js-form-item form-item\">
    {% if media_add_help %}
      <h4{{ header_attributes.addClass('label') }}>
        {% trans %}
          Create new media
        {% endtrans %}
      </h4><br />
      <div class=\"description\">
        {{ media_add_help }}
      </div>
    {% endif %}

    {% if multiple %}
      {{ table }}
    {% else %}
      {% for element in elements %}
        {{ element }}
      {% endfor %}
    {% endif %}

    <div{{ description.attributes.addClass('description') }}>
      {% if multiple and description.content %}
        <ul>
          <li>{{ media_list_help }} {{ media_list_link }} {{ allowed_types_help }}</li>
          <li>{{ description.content }}</li>
        </ul>
      {% else %}
        {{ media_list_help }} {{ media_list_link }} {{ allowed_types_help }}
      {% endif %}
      {% if multiple and button %}
        <div class=\"clearfix\">{{ button }}</div>
      {% endif %}
    </div>

  </div>
</fieldset>
", "core/modules/media/templates/media-reference-help.html.twig", "/var/www/html/drupal/core/modules/media/templates/media-reference-help.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 10, "if" => 31, "trans" => 33, "for" => 45);
        static $filters = array("escape" => 17);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'trans', 'for'],
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
