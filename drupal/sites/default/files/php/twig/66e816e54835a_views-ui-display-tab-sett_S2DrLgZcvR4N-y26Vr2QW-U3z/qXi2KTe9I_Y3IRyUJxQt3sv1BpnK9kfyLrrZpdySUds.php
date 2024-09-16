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

/* core/themes/claro/templates/views/views-ui-display-tab-setting.html.twig */
class __TwigTemplate_b992c59345cf76f7520ab16889e906da extends Template
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
        // line 22
        $context["classes"] = ["views-display-setting", "views-ui-display-tab-setting", ((        // line 25
($context["defaulted"] ?? null)) ? ("defaulted") : ("")), ((        // line 26
($context["overridden"] ?? null)) ? ("overridden") : (""))];
        // line 29
        yield "<div";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 29), 29, $this->source), "html", null, true);
        yield ">
  ";
        // line 30
        if (($context["description"] ?? null)) {
            // line 31
            yield "<span class=\"label\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["description"] ?? null), 31, $this->source), "html", null, true);
            yield "</span>";
        }
        // line 33
        yield "  ";
        if (($context["settings_links"] ?? null)) {
            // line 34
            yield "    ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->safeJoin($this->env, $this->sandbox->ensureToStringAllowed(($context["settings_links"] ?? null), 34, $this->source), "<span class=\"label label--separator\">&nbsp;|&nbsp;</span>"));
            yield "
  ";
        }
        // line 36
        yield "</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["defaulted", "overridden", "attributes", "description", "settings_links"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "core/themes/claro/templates/views/views-ui-display-tab-setting.html.twig";
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
        return array (  65 => 36,  59 => 34,  56 => 33,  51 => 31,  49 => 30,  44 => 29,  42 => 26,  41 => 25,  40 => 22,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override for Views UI display tab settings.
 *
 * Template for each row inside the \"boxes\" on the display query edit screen.
 *
 * Available variables:
 * - attributes: HTML attributes such as class for the container.
 * - description: The description or label for this setting.
 * - settings_links: A list of links for this setting.
 * - defaulted: A boolean indicating the setting is in its default state.
 * - overridden: A boolean indicating the setting has been overridden from the
 *   default.
 *
 * @see template_preprocess_views_ui_display_tab_setting()
 *
 * @ingroup themeable
 */
#}
{%
  set classes = [
    'views-display-setting',
    'views-ui-display-tab-setting',
    defaulted ? 'defaulted',
    overridden ? 'overridden',
]
%}
<div{{ attributes.addClass(classes) }}>
  {% if description -%}
    <span class=\"label\">{{ description }}</span>
  {%- endif %}
  {% if settings_links %}
    {{ settings_links|safe_join('<span class=\"label label--separator\">&nbsp;|&nbsp;</span>') }}
  {% endif %}
</div>
", "core/themes/claro/templates/views/views-ui-display-tab-setting.html.twig", "/var/www/html/drupal/core/themes/claro/templates/views/views-ui-display-tab-setting.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 22, "if" => 30);
        static $filters = array("escape" => 29, "safe_join" => 34);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape', 'safe_join'],
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
