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

/* field--text.html.twig */
class __TwigTemplate_010116dbc46f3d7c3f5098cc00a069a1 extends Template
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
        // line 1
        return "field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 28
        $context["attributes"] = CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["clearfix", "text-formatted"], "method", false, false, true, 28);
        // line 1
        $this->parent = $this->loadTemplate("field.html.twig", "field--text.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "field--text.html.twig";
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
        return array (  46 => 1,  44 => 28,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"field.html.twig\" %}
{#
/**
 * @file
 * Default theme implementation for a text field.
 *
 * A 'clearfix' class is added, because 'text' fields have a 'format' property
 * that allows a Text Format to be associated with the entered text, which then
 * applies filtering on output. A common use case is to align images to the left
 * or right, and without this 'clearfix' class, such aligned images may be
 * rendered outside of the 'text' field formatter's boundaries, and hence
 * overlap with other fields. By setting the 'clearfix' class on all 'text'
 * fields, we prevent that.
 *
 * @see https://www.drupal.org/node/2358529
 *
 * A 'text-formatted' class is added to assist with default styling of base
 * elements such as paragraphs and lists that may not have classes assigned to
 * them. This allows user entered content to have default styling without
 * interfering with the styles of other UI components such as system generated
 * lists or other dynamic content.
 *
 * @see https://www.drupal.org/node/2539860
 *
 * @ingroup themeable
 */
#}
{% set attributes = attributes.addClass('clearfix', 'text-formatted') %}
", "field--text.html.twig", "core/themes/claro/templates/classy/field/field--text.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 28);
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
