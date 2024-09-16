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

/* themes/custom/martex/templates/paragraph/paragraph--paragraph_section_image_bg.html.twig */
class __TwigTemplate_fd73c10a1e042cd916afa1f46823dc54 extends Template
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
        // line 41
        yield "
";
        // line 42
        $context["bg_img"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (($__internal_compile_0 = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_paragraph_image", [], "any", false, false, true, 42)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["#items"] ?? null) : null), "entity", [], "any", false, false, true, 42), "uri", [], "any", false, false, true, 42), "value", [], "any", false, false, true, 42);
        // line 43
        if ( !(null === ($context["bg_img"] ?? null))) {
            // line 44
            yield "\t";
            $context["bg_img_url"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl($this->sandbox->ensureToStringAllowed(($context["bg_img"] ?? null), 44, $this->source));
        } else {
            // line 46
            yield "\t";
            $context["bg_img_url"] = "/";
        }
        // line 49
        $context["classes"] = ["paragraph", ("paragraph--type--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source,         // line 51
($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 51), 51, $this->source))), "wrapper image-wrapper bg-image", Twig\Extension\CoreExtension::trim($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 53
($context["paragraph"] ?? null), "field_paragraph_extra_class", [], "any", false, false, true, 53), "value", [], "any", false, false, true, 53), 53, $this->source))), ((Twig\Extension\CoreExtension::trim($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 54
($context["paragraph"] ?? null), "field_paragraph_overlay", [], "any", false, false, true, 54), "value", [], "any", false, false, true, 54), 54, $this->source)))) ? ("bg-overlay") : ("")), ((Twig\Extension\CoreExtension::trim($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 55
($context["paragraph"] ?? null), "field_paragraph_switch_column", [], "any", false, false, true, 55), "value", [], "any", false, false, true, 55), 55, $this->source)))) ? ("switch-column-mobile") : ("")), ((        // line 56
($context["view_mode"] ?? null)) ? (("paragraph--view-mode--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["view_mode"] ?? null), 56, $this->source)))) : (""))];
        // line 59
        $context["container_attributes"] = $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute();
        // line 61
        $context["container_classes"] = [        // line 62
($context["container"] ?? null), Twig\Extension\CoreExtension::trim($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 63
($context["paragraph"] ?? null), "field_paragraph_spacing", [], "any", false, false, true, 63), "value", [], "any", false, false, true, 63), 63, $this->source))), Twig\Extension\CoreExtension::trim($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 64
($context["paragraph"] ?? null), "field_paragraph_padding", [], "any", false, false, true, 64), "value", [], "any", false, false, true, 64), 64, $this->source)))];
        // line 67
        yield from $this->unwrap()->yieldBlock('paragraph', $context, $blocks);
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["content", "paragraph", "view_mode", "container", "attributes"]);        return; yield '';
    }

    public function block_paragraph($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 68
        yield "  <section";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 68), 68, $this->source), "html", null, true);
        yield " 
          ";
        // line 69
        if (Twig\Extension\CoreExtension::trim($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_paragraph_id", [], "any", false, false, true, 69), "value", [], "any", false, false, true, 69)))) {
            yield " id=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::striptags($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_paragraph_id", [], "any", false, false, true, 69), "value", [], "any", false, false, true, 69), 69, $this->source)), "html", null, true);
            yield "\" ";
        }
        yield "  
          data-image-src=\"";
        // line 70
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["bg_img_url"] ?? null), 70, $this->source), "html", null, true);
        yield "\"
          ";
        // line 71
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_paragraph_content_align", [], "any", false, false, true, 71), "value", [], "any", false, false, true, 71)) {
            yield " data-content-align=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::trim($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_paragraph_content_align", [], "any", false, false, true, 71), "value", [], "any", false, false, true, 71), 71, $this->source))), "html", null, true);
            yield "\" ";
        }
        // line 72
        yield "  >
    <div";
        // line 73
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["container_attributes"] ?? null), "addClass", [($context["container_classes"] ?? null)], "method", false, false, true, 73), 73, $this->source), "html", null, true);
        yield ">
      ";
        // line 74
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_paragraph_margin", [], "any", false, false, true, 74), "value", [], "any", false, false, true, 74)) {
            yield " <div class=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::trim($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_paragraph_margin", [], "any", false, false, true, 74), "value", [], "any", false, false, true, 74), 74, $this->source))), "html", null, true);
            yield "\"> ";
        }
        // line 75
        yield "        ";
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 78
        yield "      ";
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_paragraph_margin", [], "any", false, false, true, 78), "value", [], "any", false, false, true, 78)) {
            yield " </div> ";
        }
        // line 79
        yield "\t  </div>

    ";
        // line 81
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_paragraph_extra_html", [], "any", false, false, true, 81), 81, $this->source), "html", null, true);
        yield "

  </section>
";
        return; yield '';
    }

    // line 75
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        yield "\t
          ";
        // line 76
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 76, $this->source), "field_paragraph_extra_class", "field_paragraph_id", "field_paragraph_image", "field_paragraph_content_align", "field_paragraph_overlay", "field_paragraph_spacing", "field_paragraph_padding", "field_paragraph_margin", "field_paragraph_extra_html", "field_paragraph_switch_column"), "html", null, true);
        yield "
        ";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/custom/martex/templates/paragraph/paragraph--paragraph_section_image_bg.html.twig";
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
        return array (  143 => 76,  137 => 75,  128 => 81,  124 => 79,  119 => 78,  116 => 75,  110 => 74,  106 => 73,  103 => 72,  97 => 71,  93 => 70,  85 => 69,  80 => 68,  71 => 67,  69 => 64,  68 => 63,  67 => 62,  66 => 61,  64 => 59,  62 => 56,  61 => 55,  60 => 54,  59 => 53,  58 => 51,  57 => 49,  53 => 46,  49 => 44,  47 => 43,  45 => 42,  42 => 41,);
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

{% set bg_img = content.field_paragraph_image['#items'].entity.uri.value %}
{% if bg_img is not null %}
\t{% set bg_img_url = file_url(bg_img) %}
{% else %}
\t{% set bg_img_url = '/' %}
{% endif %}
{%
  set classes = [
    'paragraph',
    'paragraph--type--' ~ paragraph.bundle|clean_class,
    'wrapper image-wrapper bg-image',
\t  paragraph.field_paragraph_extra_class.value|render|trim,
    paragraph.field_paragraph_overlay.value|render|trim ? 'bg-overlay',
    paragraph.field_paragraph_switch_column.value|render|trim ? 'switch-column-mobile',
    view_mode ? 'paragraph--view-mode--' ~ view_mode|clean_class,
  ]
%}
{% set container_attributes = create_attribute() %}
{%
  set container_classes = [
    container,
    paragraph.field_paragraph_spacing.value|render|trim,
    paragraph.field_paragraph_padding.value|render|trim,
  ]
%}
{% block paragraph %}
  <section{{ attributes.addClass(classes) }} 
          {% if paragraph.field_paragraph_id.value|render|trim %} id=\"{{ paragraph.field_paragraph_id.value|striptags }}\" {% endif %}  
          data-image-src=\"{{ bg_img_url }}\"
          {% if paragraph.field_paragraph_content_align.value %} data-content-align=\"{{ paragraph.field_paragraph_content_align.value|render|trim }}\" {% endif %}
  >
    <div{{ container_attributes.addClass(container_classes) }}>
      {% if paragraph.field_paragraph_margin.value %} <div class=\"{{ paragraph.field_paragraph_margin.value|render|trim }}\"> {% endif %}
        {% block content %}\t
          {{ content|without('field_paragraph_extra_class','field_paragraph_id','field_paragraph_image','field_paragraph_content_align','field_paragraph_overlay','field_paragraph_spacing','field_paragraph_padding','field_paragraph_margin','field_paragraph_extra_html','field_paragraph_switch_column') }}
        {% endblock %}
      {% if paragraph.field_paragraph_margin.value %} </div> {% endif %}
\t  </div>

    {{ content.field_paragraph_extra_html }}

  </section>
{% endblock paragraph %}
", "themes/custom/martex/templates/paragraph/paragraph--paragraph_section_image_bg.html.twig", "/var/www/html/drupal/themes/custom/martex/templates/paragraph/paragraph--paragraph_section_image_bg.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 42, "if" => 43, "block" => 67);
        static $filters = array("clean_class" => 51, "trim" => 53, "render" => 53, "escape" => 68, "striptags" => 69, "without" => 76);
        static $functions = array("file_url" => 44, "create_attribute" => 59);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block'],
                ['clean_class', 'trim', 'render', 'escape', 'striptags', 'without'],
                ['file_url', 'create_attribute'],
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
