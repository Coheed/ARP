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

/* themes/custom/martex/templates/block/block--custom_block.html.twig */
class __TwigTemplate_680983d5b101c95dbd6328f02b52d72e extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->env->getExtension(SandboxExtension::class);
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 48
        $context["bg_img"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (($__internal_compile_0 = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_image", [], "any", false, false, true, 48)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["#items"] ?? null) : null), "entity", [], "any", false, false, true, 48), "uri", [], "any", false, false, true, 48), "value", [], "any", false, false, true, 48);
        // line 49
        if ( !(null === ($context["bg_img"] ?? null))) {
            // line 50
            yield "\t";
            $context["bg_img_url"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl($this->sandbox->ensureToStringAllowed(($context["bg_img"] ?? null), 50, $this->source));
            // line 51
            yield "\t";
            $context["image_class"] = "image-wrapper bg-image";
        } else {
            // line 53
            yield "\t";
            $context["bg_img_url"] = "/";
            // line 54
            yield "\t";
            $context["image_class"] = "";
        }
        // line 56
        yield "
";
        // line 58
        $context["classes"] = ["block", ("block-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source,         // line 60
($context["configuration"] ?? null), "provider", [], "any", false, false, true, 60), 60, $this->source))), ("block-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 61
($context["plugin_id"] ?? null), 61, $this->source))), "wrapper", CoreExtension::getAttribute($this->env, $this->source, (($__internal_compile_1 = (($__internal_compile_2 = CoreExtension::getAttribute($this->env, $this->source,         // line 63
($context["content"] ?? null), "field_extra_class", [], "any", false, false, true, 63)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[0] ?? null) : null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["#context"] ?? null) : null), "value", [], "any", false, false, true, 63),         // line 64
($context["image_class"] ?? null)];
        // line 67
        yield "<section";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 67), 67, $this->source), "html", null, true);
        yield "  
    id=\"";
        // line 68
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::replace(Twig\Extension\CoreExtension::striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_block_id", [], "any", false, false, true, 68), 68, $this->source))), ["
" => "", " " => ""]), "html", null, true);
        yield "\"
    ";
        // line 69
        if ((($context["bg_img_url"] ?? null) != "/")) {
            yield " data-image-src=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["bg_img_url"] ?? null), 69, $this->source), "html", null, true);
            yield "\" ";
        }
        // line 70
        yield ">
  ";
        // line 71
        if ((Twig\Extension\CoreExtension::lower($this->env->getCharset(), Twig\Extension\CoreExtension::trim(Twig\Extension\CoreExtension::striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_container", [], "any", false, false, true, 71))))) == "on")) {
            // line 72
            yield "    <div class=\"container\">
  ";
        }
        // line 74
        yield "    ";
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 76
        yield " 

  ";
        // line 78
        if ((Twig\Extension\CoreExtension::lower($this->env->getCharset(), Twig\Extension\CoreExtension::trim(Twig\Extension\CoreExtension::striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_container", [], "any", false, false, true, 78))))) == "on")) {
            yield " </div> ";
        }
        yield " 
</section>






";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["content", "configuration", "plugin_id", "attributes"]);        return; yield '';
    }

    // line 74
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 75
        yield "      ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 75, $this->source), "field_extra_class", "field_image", "field_block_id", "field_container"), "html", null, true);
        yield "
    ";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/custom/martex/templates/block/block--custom_block.html.twig";
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
        return array (  121 => 75,  117 => 74,  100 => 78,  96 => 76,  93 => 74,  89 => 72,  87 => 71,  84 => 70,  78 => 69,  73 => 68,  68 => 67,  66 => 64,  65 => 63,  64 => 61,  63 => 60,  62 => 58,  59 => 56,  55 => 54,  52 => 53,  48 => 51,  45 => 50,  43 => 49,  41 => 48,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Default theme implementation to display a block.
 *
 * Available variables:
 * - \$block->subject: Block title.
 * - \$content: Block content.
 * - \$block->module: Module that generated the block.
 * - \$block->delta: An ID for the block, unique within each module.
 * - \$block->region: The block region embedding the current block.
 * - \$classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable \$classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - block: The current template type, i.e., \"theming hook\".
 *   - block-[module]: The module generating the block. For example, the user
 *     module is responsible for handling the default user navigation block. In
 *     that case the class would be 'block-user'.
 * - \$title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - \$title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Helper variables:
 * - \$classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable \$classes.
 * - \$block_zebra: Outputs 'odd' and 'even' dependent on each block region.
 * - \$zebra: Same output as \$block_zebra but independent of any block region.
 * - \$block_id: Counter dependent on each block region.
 * - \$id: Same output as \$block_id but independent of any block region.
 * - \$is_front: Flags true when presented in the front page.
 * - \$logged_in: Flags true when the current user is a logged-in member.
 * - \$is_admin: Flags true when the current user is an administrator.
 * - \$block_html_id: A valid HTML ID and guaranteed unique.
 *
 * @ingroup templates
 *
 * @see bootstrap_preprocess_block()
 * @see template_preprocess()
 * @see template_preprocess_block()
 * @see bootstrap_process_block()
 * @see template_process()
 */
#}
{% set bg_img = content.field_image['#items'].entity.uri.value %}
{% if bg_img is not null %}
\t{% set bg_img_url = file_url(bg_img) %}
\t{% set image_class = 'image-wrapper bg-image' %}
{% else %}
\t{% set bg_img_url = '/' %}
\t{% set image_class ='' %}
{% endif %}

{%
  set classes = [
    'block',
    'block-' ~ configuration.provider|clean_class,
    'block-' ~ plugin_id|clean_class,
    'wrapper',
\t  content.field_extra_class[0]['#context'].value,
\t  image_class,
  ]
%}
<section{{ attributes.addClass(classes) }}  
    id=\"{{ content.field_block_id|render|striptags|replace({\"\\n\":\"\", \" \":\"\"}) }}\"
    {% if bg_img_url != '/' %} data-image-src=\"{{ bg_img_url }}\" {% endif %}
>
  {% if content.field_container|render|striptags|trim|lower == 'on' %}
    <div class=\"container\">
  {% endif %}
    {% block content %}
      {{ content|without('field_extra_class','field_image','field_block_id','field_container') }}
    {% endblock %} 

  {% if content.field_container|render|striptags|trim|lower == 'on' %} </div> {% endif %} 
</section>






", "themes/custom/martex/templates/block/block--custom_block.html.twig", "/var/www/html/drupal/themes/custom/martex/templates/block/block--custom_block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 48, "if" => 49, "block" => 74);
        static $filters = array("clean_class" => 60, "escape" => 67, "replace" => 68, "striptags" => 68, "render" => 68, "lower" => 71, "trim" => 71, "without" => 75);
        static $functions = array("file_url" => 50);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block'],
                ['clean_class', 'escape', 'replace', 'striptags', 'render', 'lower', 'trim', 'without'],
                ['file_url'],
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
