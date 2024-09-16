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

/* themes/custom/martex/templates/paragraph/paragraph--paragraph_section.html.twig */
class __TwigTemplate_df006538f6cde79fd5b0a352c8a900a1 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'paragraph' => [$this, 'block_paragraph'],
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->env->getExtension(SandboxExtension::class);
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 42
        $context["classes"] = ["paragraph", ("paragraph--type--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source,         // line 44
($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 44), 44, $this->source))), "wrapper", Twig\Extension\CoreExtension::trim($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 46
($context["paragraph"] ?? null), "field_paragraph_extra_class", [], "any", false, false, true, 46), "value", [], "any", false, false, true, 46), 46, $this->source))), ((Twig\Extension\CoreExtension::trim($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 47
($context["paragraph"] ?? null), "field_paragraph_angled", [], "any", false, false, true, 47), "value", [], "any", false, false, true, 47), 47, $this->source)))) ? (("angled " . Twig\Extension\CoreExtension::trim($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_paragraph_angled", [], "any", false, false, true, 47), "value", [], "any", false, false, true, 47), 47, $this->source))))) : ("")), ((Twig\Extension\CoreExtension::trim($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 48
($context["paragraph"] ?? null), "field_paragraph_switch_column", [], "any", false, false, true, 48), "value", [], "any", false, false, true, 48), 48, $this->source)))) ? ("switch-column-mobile") : ("")), ((        // line 49
($context["view_mode"] ?? null)) ? (("paragraph--view-mode--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["view_mode"] ?? null), 49, $this->source)))) : (""))];
        // line 52
        $context["container_attributes"] = $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute();
        // line 54
        $context["container_classes"] = [((Twig\Extension\CoreExtension::trim($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 55
($context["paragraph"] ?? null), "field_paragraph_container", [], "any", false, false, true, 55), "value", [], "any", false, false, true, 55), 55, $this->source)))) ? (($context["container"] ?? null)) : ("container-fluid")), Twig\Extension\CoreExtension::trim($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 56
($context["paragraph"] ?? null), "field_paragraph_spacing", [], "any", false, false, true, 56), "value", [], "any", false, false, true, 56), 56, $this->source))), Twig\Extension\CoreExtension::trim($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 57
($context["paragraph"] ?? null), "field_paragraph_padding", [], "any", false, false, true, 57), "value", [], "any", false, false, true, 57), 57, $this->source)))];
        // line 60
        $context["container_inner_attributes"] = $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute();
        // line 62
        $context["container_inner_classes"] = ["container-inner", Twig\Extension\CoreExtension::trim($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 64
($context["paragraph"] ?? null), "field_paragraph_margin", [], "any", false, false, true, 64), "value", [], "any", false, false, true, 64), 64, $this->source)))];
        // line 67
        yield "
";
        // line 68
        yield from $this->unwrap()->yieldBlock('paragraph', $context, $blocks);
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["paragraph", "view_mode", "container", "attributes", "content"]);        return; yield '';
    }

    public function block_paragraph($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 69
        yield "  <section";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 69), 69, $this->source), "html", null, true);
        yield " 
    ";
        // line 70
        if (Twig\Extension\CoreExtension::trim($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_paragraph_id", [], "any", false, false, true, 70), "value", [], "any", false, false, true, 70)))) {
            yield " id=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::trim($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_paragraph_id", [], "any", false, false, true, 70), "value", [], "any", false, false, true, 70), 70, $this->source))), "html", null, true);
            yield "\"  ";
        }
        yield " 
    ";
        // line 71
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_paragraph_gutter_class", [], "any", false, false, true, 71), "value", [], "any", false, false, true, 71)) {
            yield " data-gutter-class=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::trim($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_paragraph_gutter_class", [], "any", false, false, true, 71), "value", [], "any", false, false, true, 71), 71, $this->source))), "html", null, true);
            yield "\" ";
        }
        yield " 
    ";
        // line 72
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_paragraph_content_align", [], "any", false, false, true, 72), "value", [], "any", false, false, true, 72)) {
            yield " data-content-align=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::trim($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_paragraph_content_align", [], "any", false, false, true, 72), "value", [], "any", false, false, true, 72), 72, $this->source))), "html", null, true);
            yield "\" ";
        }
        yield " 
  >
    <div";
        // line 74
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["container_attributes"] ?? null), "addClass", [($context["container_classes"] ?? null)], "method", false, false, true, 74), 74, $this->source), "html", null, true);
        yield ">
      ";
        // line 75
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_paragraph_margin", [], "any", false, false, true, 75), "value", [], "any", false, false, true, 75)) {
            yield " <div class=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::trim($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_paragraph_margin", [], "any", false, false, true, 75), "value", [], "any", false, false, true, 75), 75, $this->source))), "html", null, true);
            yield "\"> ";
        }
        // line 76
        yield "        ";
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 81
        yield "      ";
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_paragraph_margin", [], "any", false, false, true, 81), "value", [], "any", false, false, true, 81)) {
            yield " </div> ";
        }
        // line 82
        yield "    </div>

    ";
        // line 84
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_paragraph_extra_html", [], "any", false, false, true, 84), 84, $this->source), "html", null, true);
        yield "

  </section>
";
        return; yield '';
    }

    // line 76
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        yield "\t
          ";
        // line 77
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 77, $this->source), "field_paragraph_extra_class", "field_paragraph_id", "field_paragraph_padding", "field_paragraph_margin", "field_paragraph_extra_html", "field_paragraph_gutter_class", "field_paragraph_container", "field_paragraph_content_align", "field_paragraph_spacing", "field_paragraph_angled", "field_paragraph_switch_column"), "html", null, true);
        // line 79
        yield "
        ";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/custom/martex/templates/paragraph/paragraph--paragraph_section.html.twig";
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
        return array (  142 => 79,  140 => 77,  134 => 76,  125 => 84,  121 => 82,  116 => 81,  113 => 76,  107 => 75,  103 => 74,  94 => 72,  86 => 71,  78 => 70,  73 => 69,  64 => 68,  61 => 67,  59 => 64,  58 => 62,  56 => 60,  54 => 57,  53 => 56,  52 => 55,  51 => 54,  49 => 52,  47 => 49,  46 => 48,  45 => 47,  44 => 46,  43 => 44,  42 => 42,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Default theme implementation to display a paragraph.
 *
 * Available variables:
 * - paragraph: Full paragraph entity.
 *   Only method names starting with \"get\", \"has\", or \"is\" and a few common
 *   methods such as \"id\", \"label\", and \"bundle\" are available. For example:
 *   - paragraph.getCreatedTime() will return the paragraph creation timestamp.
 *   - paragraph.id(): The paragraph ID.
 *   - paragraph.bundle(): The type of the paragraph, for example, \"image\" or \"text\".
 *   - paragraph.getOwnerId(): The user ID of the paragraph author.
 *   See Drupal\\paragraphs\\Entity\\Paragraph for a full list of public properties
 *   and methods for the paragraph object.
 * - content: All paragraph items. Use {{ content }} to print them all,
 *   or print a subset such as {{ content.field_example }}. Use
 *   {{ content|without('field_example') }} to temporarily suppress the printing
 *   of a given child element.
 * - attributes: HTML attributes for the containing element.
 *   The attributes.class element may contain one or more of the following
 *   classes:
 *   - paragraphs: The current template type (also known as a \"theming hook\").
 *   - paragraphs--type-[type]: The current paragraphs type. For example, if the paragraph is an
 *     \"Image\" it would result in \"paragraphs--type--image\". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - paragraphs--view-mode--[view_mode]: The View Mode of the paragraph; for example, a
 *     preview would result in: \"paragraphs--view-mode--preview\", and
 *     default: \"paragraphs--view-mode--default\".
 * - view_mode: View mode; for example, \"preview\" or \"full\".
 * - logged_in: Flag for authenticated user status. Will be true when the
 *   current user is a logged-in member.
 * - is_admin: Flag for admin user status. Will be true when the current user
 *   is an administrator.
 *
 * @see template_preprocess_paragraph()
 *
 * @ingroup themeable
 */
#}
{%
  set classes = [
    'paragraph',
    'paragraph--type--' ~ paragraph.bundle|clean_class,
    'wrapper',
\t  paragraph.field_paragraph_extra_class.value|render|trim,
    paragraph.field_paragraph_angled.value|render|trim ? 'angled ' ~ paragraph.field_paragraph_angled.value|render|trim,
    paragraph.field_paragraph_switch_column.value|render|trim ? 'switch-column-mobile',
    view_mode ? 'paragraph--view-mode--' ~ view_mode|clean_class,
  ]
%}
{% set container_attributes = create_attribute() %}
{%
  set container_classes = [
    paragraph.field_paragraph_container.value|render|trim ? container : 'container-fluid',
    paragraph.field_paragraph_spacing.value|render|trim,
    paragraph.field_paragraph_padding.value|render|trim,
  ]
%}
{% set container_inner_attributes = create_attribute() %}
{%
  set container_inner_classes = [
    'container-inner',
    paragraph.field_paragraph_margin.value|render|trim
  ]
%}

{% block paragraph %}
  <section{{ attributes.addClass(classes) }} 
    {% if paragraph.field_paragraph_id.value|render|trim %} id=\"{{ paragraph.field_paragraph_id.value|render|trim }}\"  {% endif %} 
    {% if paragraph.field_paragraph_gutter_class.value %} data-gutter-class=\"{{ paragraph.field_paragraph_gutter_class.value|render|trim }}\" {% endif %} 
    {% if paragraph.field_paragraph_content_align.value %} data-content-align=\"{{ paragraph.field_paragraph_content_align.value|render|trim }}\" {% endif %} 
  >
    <div{{ container_attributes.addClass(container_classes) }}>
      {% if paragraph.field_paragraph_margin.value %} <div class=\"{{ paragraph.field_paragraph_margin.value|render|trim }}\"> {% endif %}
        {% block content %}\t
          {{ content|without('field_paragraph_extra_class','field_paragraph_id','field_paragraph_padding','field_paragraph_margin', 'field_paragraph_extra_html',
                            'field_paragraph_gutter_class','field_paragraph_container','field_paragraph_content_align',
                            'field_paragraph_spacing','field_paragraph_angled','field_paragraph_switch_column') }}
        {% endblock %}
      {% if paragraph.field_paragraph_margin.value %} </div> {% endif %}
    </div>

    {{ content.field_paragraph_extra_html }}

  </section>
{% endblock paragraph %}
", "themes/custom/martex/templates/paragraph/paragraph--paragraph_section.html.twig", "/var/www/html/drupal/themes/custom/martex/templates/paragraph/paragraph--paragraph_section.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 42, "block" => 68, "if" => 70);
        static $filters = array("clean_class" => 44, "trim" => 46, "render" => 46, "escape" => 69, "without" => 77);
        static $functions = array("create_attribute" => 52);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'block', 'if'],
                ['clean_class', 'trim', 'render', 'escape', 'without'],
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
