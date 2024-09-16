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

/* themes/custom/martex/templates/form/form-element.html.twig */
class __TwigTemplate_e5e2a77fc874a03413b8e831c2ccac0a extends Template
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
        // line 47
        yield "
";
        // line 49
        $context["label_attributes"] = ((($context["label_attributes"] ?? null)) ? (($context["label_attributes"] ?? null)) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
        // line 51
        yield "
";
        // line 52
        if ((($context["type"] ?? null) == "checkbox")) {
            // line 53
            yield "  ";
            $context["wrapperclass"] = "form-check";
            // line 54
            yield "  ";
            $context["labelclass"] = "form-check-label";
            // line 55
            yield "  ";
            $context["inputclass"] = "form-check-input";
        }
        // line 57
        yield "
";
        // line 58
        if ((($context["type"] ?? null) == "radio")) {
            // line 59
            yield "  ";
            $context["wrapperclass"] = "form-check";
            // line 60
            yield "  ";
            $context["labelclass"] = "form-check-label";
            // line 61
            yield "  ";
            $context["inputclass"] = "form-check-input";
        }
        // line 63
        yield "
";
        // line 65
        $context["classes"] = ["js-form-item", ("js-form-type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 67
($context["type"] ?? null), 67, $this->source))), ((CoreExtension::inFilter(        // line 68
($context["type"] ?? null), ["checkbox", "radio"])) ? (\Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["type"] ?? null), 68, $this->source))) : (("form-type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["type"] ?? null), 68, $this->source))))), ((CoreExtension::inFilter(        // line 69
($context["type"] ?? null), ["checkbox", "radio"])) ? (($context["wrapperclass"] ?? null)) : ("")), ((CoreExtension::inFilter(        // line 70
($context["type"] ?? null), ["checkbox"])) ? ("mb-4") : ("")), ("js-form-item-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 71
($context["name"] ?? null), 71, $this->source))), ("form-item-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 72
($context["name"] ?? null), 72, $this->source))), ((!CoreExtension::inFilter(        // line 73
($context["title_display"] ?? null), ["after", "before"])) ? ("form-no-label") : ("")), (((        // line 74
($context["disabled"] ?? null) == "disabled")) ? ("disabled") : ("")), ((        // line 75
($context["errors"] ?? null)) ? ("has-error") : (""))];
        // line 78
        yield "
";
        // line 79
        if ((($context["title_display"] ?? null) == "invisible")) {
            // line 80
            yield "  ";
            if (array_key_exists("labelclass", $context)) {
                // line 81
                yield "    ";
                $context["labelclass"] = ($this->sandbox->ensureToStringAllowed(($context["labelclass"] ?? null), 81, $this->source) . " visually-hidden");
                // line 82
                yield "  ";
            } else {
                // line 83
                yield "    ";
                $context["labelclass"] = "visually-hidden";
                // line 84
                yield "  ";
            }
        }
        // line 86
        yield "
";
        // line 88
        $context["description_classes"] = ["description", "text-muted", (((        // line 91
($context["description_display"] ?? null) == "invisible")) ? ("visually-hidden") : (""))];
        // line 94
        if (CoreExtension::inFilter(($context["type"] ?? null), ["checkbox", "radio"])) {
            // line 95
            yield "  <div";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 95), 95, $this->source), "html", null, true);
            yield ">
    ";
            // line 96
            if ( !Twig\Extension\CoreExtension::testEmpty(($context["prefix"] ?? null))) {
                // line 97
                yield "      <span class=\"field-prefix\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["prefix"] ?? null), 97, $this->source), "html", null, true);
                yield "</span>
    ";
            }
            // line 99
            yield "    ";
            if (((($context["description_display"] ?? null) == "before") && CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 99))) {
                // line 100
                yield "      <div";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 100), 100, $this->source), "html", null, true);
                yield ">
        ";
                // line 101
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 101), 101, $this->source), "html", null, true);
                yield "
      </div>
    ";
            }
            // line 104
            yield "    ";
            if (CoreExtension::inFilter(($context["label_display"] ?? null), ["before", "invisible"])) {
                // line 105
                yield "      <label ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["label_attributes"] ?? null), "addClass", [($context["labelclass"] ?? null)], "method", false, false, true, 105), "setAttribute", ["for", CoreExtension::getAttribute($this->env, $this->source, ($context["input_attributes"] ?? null), "id", [], "any", false, false, true, 105)], "method", false, false, true, 105), 105, $this->source), "html", null, true);
                yield ">
        ";
                // line 106
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["input_title"] ?? null), 106, $this->source));
                yield "
      </label>
    ";
            }
            // line 109
            yield "    <input";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["input_attributes"] ?? null), "addClass", [($context["inputclass"] ?? null)], "method", false, false, true, 109), 109, $this->source), "html", null, true);
            yield ">
    ";
            // line 110
            if ((($context["label_display"] ?? null) == "after")) {
                // line 111
                yield "      <label ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["label_attributes"] ?? null), "addClass", [($context["labelclass"] ?? null)], "method", false, false, true, 111), "setAttribute", ["for", CoreExtension::getAttribute($this->env, $this->source, ($context["input_attributes"] ?? null), "id", [], "any", false, false, true, 111)], "method", false, false, true, 111), 111, $this->source), "html", null, true);
                yield ">
        ";
                // line 112
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["input_title"] ?? null), 112, $this->source));
                yield "
      </label>
    ";
            }
            // line 115
            yield "    ";
            if ( !Twig\Extension\CoreExtension::testEmpty(($context["suffix"] ?? null))) {
                // line 116
                yield "      <span class=\"field-suffix\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["suffix"] ?? null), 116, $this->source), "html", null, true);
                yield "</span>
    ";
            }
            // line 118
            yield "    ";
            if (($context["errors"] ?? null)) {
                // line 119
                yield "      <div class=\"invalid-feedback\">
        ";
                // line 120
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["errors"] ?? null), 120, $this->source), "html", null, true);
                yield "
      </div>
    ";
            }
            // line 123
            yield "    ";
            if ((CoreExtension::inFilter(($context["description_display"] ?? null), ["after", "invisible"]) && CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 123))) {
                // line 124
                yield "      <small";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 124), "addClass", [($context["description_classes"] ?? null)], "method", false, false, true, 124), 124, $this->source), "html", null, true);
                yield ">
        ";
                // line 125
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 125), 125, $this->source), "html", null, true);
                yield "
      </small>
    ";
            }
            // line 128
            yield "  </div>
";
        } else {
            // line 130
            yield "  <div";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null), "mb-4", ((($context["float_label"] ?? null)) ? ("form-floating") : (""))], "method", false, false, true, 130), 130, $this->source), "html", null, true);
            yield ">
    ";
            // line 131
            if (CoreExtension::inFilter(($context["label_display"] ?? null), ["before", "invisible"])) {
                // line 132
                yield "      ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 132, $this->source), "html", null, true);
                yield "
    ";
            }
            // line 134
            yield "    ";
            if (( !Twig\Extension\CoreExtension::testEmpty(($context["prefix"] ?? null)) ||  !Twig\Extension\CoreExtension::testEmpty(($context["suffix"] ?? null)))) {
                // line 135
                yield "      <div class=\"input-group";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["errors"] ?? null)) ? (" is-invalid") : ("")));
                yield "\">
    ";
            }
            // line 137
            yield "    ";
            if ( !Twig\Extension\CoreExtension::testEmpty(($context["prefix"] ?? null))) {
                // line 138
                yield "      <div class=\"input-group-prepend\">
        <span class=\"field-prefix input-group-text\">";
                // line 139
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["prefix"] ?? null), 139, $this->source), "html", null, true);
                yield "</span>
      </div>
    ";
            }
            // line 142
            yield "    ";
            if (((($context["description_display"] ?? null) == "before") && CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 142))) {
                // line 143
                yield "      <div";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 143), 143, $this->source), "html", null, true);
                yield ">
        ";
                // line 144
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 144), 144, $this->source), "html", null, true);
                yield "
      </div>
    ";
            }
            // line 147
            yield "    ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null), 147, $this->source), "html", null, true);
            yield "
    ";
            // line 148
            if ( !Twig\Extension\CoreExtension::testEmpty(($context["suffix"] ?? null))) {
                // line 149
                yield "      <div class=\"input-group-append\">
        <span class=\"field-suffix input-group-text\">";
                // line 150
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["suffix"] ?? null), 150, $this->source), "html", null, true);
                yield "</span>
      </div>
    ";
            }
            // line 153
            yield "    ";
            if (( !Twig\Extension\CoreExtension::testEmpty(($context["prefix"] ?? null)) ||  !Twig\Extension\CoreExtension::testEmpty(($context["suffix"] ?? null)))) {
                // line 154
                yield "      </div>
    ";
            }
            // line 156
            yield "    ";
            if ((($context["label_display"] ?? null) == "after")) {
                // line 157
                yield "      ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 157, $this->source), "html", null, true);
                yield "
    ";
            }
            // line 159
            yield "    ";
            if (($context["errors"] ?? null)) {
                // line 160
                yield "      <div class=\"invalid-feedback\">
        ";
                // line 161
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["errors"] ?? null), 161, $this->source), "html", null, true);
                yield "
      </div>
    ";
            }
            // line 164
            yield "    ";
            if ((CoreExtension::inFilter(($context["description_display"] ?? null), ["after", "invisible"]) && CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 164))) {
                // line 165
                yield "      <small";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 165), "addClass", [($context["description_classes"] ?? null)], "method", false, false, true, 165), 165, $this->source), "html", null, true);
                yield ">
        ";
                // line 166
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 166), 166, $this->source), "html", null, true);
                yield "
      </small>
    ";
            }
            // line 169
            yield "  </div>
";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["type", "name", "title_display", "disabled", "errors", "description_display", "attributes", "prefix", "description", "label_display", "input_attributes", "input_title", "suffix", "float_label", "label", "children"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/custom/martex/templates/form/form-element.html.twig";
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
        return array (  322 => 169,  316 => 166,  311 => 165,  308 => 164,  302 => 161,  299 => 160,  296 => 159,  290 => 157,  287 => 156,  283 => 154,  280 => 153,  274 => 150,  271 => 149,  269 => 148,  264 => 147,  258 => 144,  253 => 143,  250 => 142,  244 => 139,  241 => 138,  238 => 137,  232 => 135,  229 => 134,  223 => 132,  221 => 131,  216 => 130,  212 => 128,  206 => 125,  201 => 124,  198 => 123,  192 => 120,  189 => 119,  186 => 118,  180 => 116,  177 => 115,  171 => 112,  166 => 111,  164 => 110,  159 => 109,  153 => 106,  148 => 105,  145 => 104,  139 => 101,  134 => 100,  131 => 99,  125 => 97,  123 => 96,  118 => 95,  116 => 94,  114 => 91,  113 => 88,  110 => 86,  106 => 84,  103 => 83,  100 => 82,  97 => 81,  94 => 80,  92 => 79,  89 => 78,  87 => 75,  86 => 74,  85 => 73,  84 => 72,  83 => 71,  82 => 70,  81 => 69,  80 => 68,  79 => 67,  78 => 65,  75 => 63,  71 => 61,  68 => 60,  65 => 59,  63 => 58,  60 => 57,  56 => 55,  53 => 54,  50 => 53,  48 => 52,  45 => 51,  43 => 49,  40 => 47,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override for a form element.
 *
 * Available variables:
 * - attributes: HTML attributes for the containing element.
 * - errors: (optional) Any errors for this form element, may not be set.
 * - prefix: (optional) The form element prefix, may not be set.
 * - suffix: (optional) The form element suffix, may not be set.
 * - required: The required marker, or empty if the associated form element is
 *   not required.
 * - type: The type of the element.
 * - name: The name of the element.
 * - label: A rendered label element.
 * - label_display: Label display setting. It can have these values:
 *   - before: The label is output before the element. This is the default.
 *     The label includes the #title and the required marker, if #required.
 *   - after: The label is output after the element. For example, this is used
 *     for radio and checkbox #type elements. If the #title is empty but the
 *     field is #required, the label will contain only the required marker.
 *   - invisible: Labels are critical for screen readers to enable them to
 *     properly navigate through forms but can be visually distracting. This
 *     property hides the label for everyone except screen readers.
 *   - attribute: Set the title attribute on the element to create a tooltip but
 *     output no label element. This is supported only for checkboxes and radios
 *     in \\Drupal\\Core\\Render\\Element\\CompositeFormElementTrait::preRenderCompositeFormElement().
 *     It is used where a visual label is not needed, such as a table of
 *     checkboxes where the row and column provide the context. The tooltip will
 *     include the title and required marker.
 * - description: (optional) A list of description properties containing:
 *    - content: A description of the form element, may not be set.
 *    - attributes: (optional) A list of HTML attributes to apply to the
 *      description content wrapper. Will only be set when description is set.
 * - description_display: Description display setting. It can have these values:
 *   - before: The description is output before the element.
 *   - after: The description is output after the element. This is the default
 *     value.
 *   - invisible: The description is output after the element, hidden visually
 *     but available to screen readers.
 * - disabled: True if the element is disabled.
 * - title_display: Title display setting.
 *
 * @see template_preprocess_form_element()
 */
#}

{%
  set label_attributes = label_attributes ? label_attributes : create_attribute()
%}

{% if type == 'checkbox' %}
  {% set wrapperclass = \"form-check\" %}
  {% set labelclass = \"form-check-label\" %}
  {% set inputclass = \"form-check-input\" %}
{% endif %}

{% if type == 'radio' %}
  {% set wrapperclass = \"form-check\" %}
  {% set labelclass = \"form-check-label\" %}
  {% set inputclass = \"form-check-input\" %}
{% endif %}

{%
  set classes = [
    'js-form-item',
    'js-form-type-' ~ type|clean_class,
    type in ['checkbox', 'radio'] ? type|clean_class : 'form-type-' ~ type|clean_class,
    type in ['checkbox', 'radio'] ? wrapperclass,
    type in ['checkbox'] ? 'mb-4',
    'js-form-item-' ~ name|clean_class,
    'form-item-' ~ name|clean_class,
    title_display not in ['after', 'before'] ? 'form-no-label',
    disabled == 'disabled' ? 'disabled',
    errors ? 'has-error',
  ]
%}

{% if title_display == 'invisible' %}
  {% if labelclass is defined %}
    {% set labelclass = labelclass ~ ' visually-hidden' %}
  {% else %}
    {% set labelclass = 'visually-hidden' %}
  {% endif %}
{% endif %}

{%
  set description_classes = [
    'description',
\t  'text-muted',
    description_display == 'invisible' ? 'visually-hidden',
  ]
%}
{% if type in ['checkbox', 'radio'] %}
  <div{{ attributes.addClass(classes) }}>
    {% if prefix is not empty %}
      <span class=\"field-prefix\">{{ prefix }}</span>
    {% endif %}
    {% if description_display == 'before' and description.content %}
      <div{{ description.attributes }}>
        {{ description.content }}
      </div>
    {% endif %}
    {% if label_display in ['before', 'invisible'] %}
      <label {{ label_attributes.addClass(labelclass).setAttribute('for', input_attributes.id) }}>
        {{ input_title | raw }}
      </label>
    {% endif %}
    <input{{ input_attributes.addClass(inputclass) }}>
    {% if label_display == 'after' %}
      <label {{ label_attributes.addClass(labelclass).setAttribute('for', input_attributes.id) }}>
        {{ input_title | raw }}
      </label>
    {% endif %}
    {% if suffix is not empty %}
      <span class=\"field-suffix\">{{ suffix }}</span>
    {% endif %}
    {% if errors %}
      <div class=\"invalid-feedback\">
        {{ errors }}
      </div>
    {% endif %}
    {% if description_display in ['after', 'invisible'] and description.content %}
      <small{{ description.attributes.addClass(description_classes) }}>
        {{ description.content }}
      </small>
    {% endif %}
  </div>
{% else %}
  <div{{ attributes.addClass(classes, 'mb-4', float_label ? 'form-floating') }}>
    {% if label_display in ['before', 'invisible'] %}
      {{ label }}
    {% endif %}
    {% if (prefix is not empty) or (suffix is not empty) %}
      <div class=\"input-group{{ errors ? ' is-invalid' : '' }}\">
    {% endif %}
    {% if prefix is not empty %}
      <div class=\"input-group-prepend\">
        <span class=\"field-prefix input-group-text\">{{ prefix }}</span>
      </div>
    {% endif %}
    {% if description_display == 'before' and description.content %}
      <div{{ description.attributes }}>
        {{ description.content }}
      </div>
    {% endif %}
    {{ children }}
    {% if suffix is not empty %}
      <div class=\"input-group-append\">
        <span class=\"field-suffix input-group-text\">{{ suffix }}</span>
      </div>
    {% endif %}
    {% if (prefix is not empty) or (suffix is not empty) %}
      </div>
    {% endif %}
    {% if label_display == 'after' %}
      {{ label }}
    {% endif %}
    {% if errors %}
      <div class=\"invalid-feedback\">
        {{ errors }}
      </div>
    {% endif %}
    {% if description_display in ['after', 'invisible'] and description.content %}
      <small{{ description.attributes.addClass(description_classes) }}>
        {{ description.content }}
      </small>
    {% endif %}
  </div>
{% endif %}
", "themes/custom/martex/templates/form/form-element.html.twig", "/var/www/html/drupal/themes/custom/martex/templates/form/form-element.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 49, "if" => 52);
        static $filters = array("clean_class" => 67, "escape" => 95, "raw" => 106);
        static $functions = array("create_attribute" => 49);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['clean_class', 'escape', 'raw'],
                ['create_attribute'],
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
