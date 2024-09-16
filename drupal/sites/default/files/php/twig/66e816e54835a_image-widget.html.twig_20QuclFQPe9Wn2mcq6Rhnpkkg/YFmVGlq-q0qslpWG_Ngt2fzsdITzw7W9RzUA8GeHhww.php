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

/* core/themes/claro/templates/content-edit/image-widget.html.twig */
class __TwigTemplate_7c3fd11d8c6210d597dc1d2a4d058f32 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension(SandboxExtension::class);
        $this->checkSecurity();
    }

    protected function doGetParent(array $context)
    {
        // line 24
        return "@claro/content-edit/file-managed-file.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 26
        $context["attributes"] = CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["form-managed-file--image"], "method", false, false, true, 26);
        // line 24
        $this->parent = $this->loadTemplate("@claro/content-edit/file-managed-file.html.twig", "core/themes/claro/templates/content-edit/image-widget.html.twig", 24);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "core/themes/claro/templates/content-edit/image-widget.html.twig";
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
        return array (  46 => 24,  44 => 26,  37 => 24,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override for an image field widget.
 *
 * Available variables:
 * - main_items: Main render elements of the image widget:
 *   file name, upload input, upload and remove buttons and hidden inputs.
 * - data: Other render elements of the image widget like preview, alt or title.
 * - display: A flag indicating whether the display field is visible.
 * - attributes: HTML attributes for the containing element.
 * - multiple: Whether this widget is the part of a multi-value file widget or
 *   not.
 * - upload: Whether the file upload input is displayed or not.
 * - has_value: true if the widget already contains a file.
 * - has_meta: true when at least one of the alt or title inputs is enabled and
 *   visible.
 *
 * @see template_preprocess_image_widget()
 * @see claro_preprocess_image_widget()
 */
#}

{% extends '@claro/content-edit/file-managed-file.html.twig' %}

{% set attributes = attributes.addClass('form-managed-file--image') %}
", "core/themes/claro/templates/content-edit/image-widget.html.twig", "/var/www/html/drupal/core/themes/claro/templates/content-edit/image-widget.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 26);
        static $filters = array();
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set'],
                [],
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
