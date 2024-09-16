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

/* themes/custom/martex/templates/navigation/menu--navigation-other.html.twig */
class __TwigTemplate_ee8e45c39dafa02cd7d6793e782ff6ec extends Template
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
        // line 18
        $macros["menus"] = $this->macros["menus"] = $this;
        // line 19
        yield "
";
        // line 24
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::callMacro($macros["menus"], "macro_menu_links", [($context["items"] ?? null), ($context["attributes"] ?? null), 0], 24, $context, $this->getSourceContext()));
        yield "

";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["_self", "items", "attributes", "menu_level"]);        return; yield '';
    }

    // line 26
    public function macro_menu_links($__items__ = null, $__attributes__ = null, $__menu_level__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "items" => $__items__,
            "attributes" => $__attributes__,
            "menu_level" => $__menu_level__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 27
            yield "  ";
            $macros["menus"] = $this;
            // line 28
            yield "  ";
            if (($context["items"] ?? null)) {
                // line 29
                yield "    ";
                if ((($context["menu_level"] ?? null) == 0)) {
                    // line 30
                    yield "      <ul class=\"navbar-nav flex-row align-items-center ms-auto\">
    ";
                } else {
                    // line 32
                    yield "      <ul class=\"dropdown-menu\">
    ";
                }
                // line 34
                yield "    ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 35
                    yield "      ";
                    // line 36
                    $context["item_classes"] = ["nav-item", ((CoreExtension::getAttribute($this->env, $this->source,                     // line 38
$context["item"], "is_expanded", [], "any", false, false, true, 38)) ? ("expanded ") : ("")), ((CoreExtension::getAttribute($this->env, $this->source,                     // line 39
$context["item"], "is_expanded", [], "any", false, false, true, 39)) ? ("dropdown") : ("")), ((CoreExtension::getAttribute($this->env, $this->source,                     // line 40
$context["item"], "is_expanded", [], "any", false, false, true, 40)) ? ("has-dropdown") : ("")), ((CoreExtension::getAttribute($this->env, $this->source,                     // line 41
$context["item"], "in_active_trail", [], "any", false, false, true, 41)) ? ("active") : ("")), ((((                    // line 42
($context["menu_level"] ?? null) != 0) && CoreExtension::getAttribute($this->env, $this->source, $context["item"], "is_expanded", [], "any", false, false, true, 42))) ? ("dropdown-submenu dropend") : (""))];
                    // line 45
                    yield "
      ";
                    // line 46
                    if (((($context["menu_level"] ?? null) == 0) && CoreExtension::getAttribute($this->env, $this->source, $context["item"], "is_expanded", [], "any", false, false, true, 46))) {
                        // line 47
                        yield "        <li";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 47), "addClass", [($context["item_classes"] ?? null)], "method", false, false, true, 47), 47, $this->source), "html", null, true);
                        yield ">
\t\t      ";
                        // line 48
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getLink($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 48), 48, $this->source), $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 48), 48, $this->source), ["class" => ["nav-link dropdown-toggle"], "data-bs-toggle" => ["dropdown"]]), "html", null, true);
                        yield "
      ";
                    } elseif (((                    // line 49
($context["menu_level"] ?? null) == 0) &&  !CoreExtension::getAttribute($this->env, $this->source, $context["item"], "is_expanded", [], "any", false, false, true, 49))) {
                        // line 50
                        yield "        <li";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 50), "addClass", [($context["item_classes"] ?? null)], "method", false, false, true, 50), 50, $this->source), "html", null, true);
                        yield ">
\t\t      ";
                        // line 51
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getLink($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 51), 51, $this->source), $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 51), 51, $this->source), ["class" => [""]]), "html", null, true);
                        yield "
      ";
                    } elseif (((                    // line 52
($context["menu_level"] ?? null) != 0) && CoreExtension::getAttribute($this->env, $this->source, $context["item"], "is_expanded", [], "any", false, false, true, 52))) {
                        // line 53
                        yield "        <li";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 53), "addClass", [($context["item_classes"] ?? null)], "method", false, false, true, 53), 53, $this->source), "html", null, true);
                        yield ">
\t\t      ";
                        // line 54
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getLink($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 54), 54, $this->source), $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 54), 54, $this->source), ["class" => ["dropdown-item dropdown-toggle"], "data-bs-toggle" => ["dropdown"]]), "html", null, true);
                        yield "
      ";
                    } else {
                        // line 56
                        yield "        <li";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 56), "addClass", [($context["item_classes"] ?? null)], "method", false, false, true, 56), 56, $this->source), "html", null, true);
                        yield ">
          ";
                        // line 57
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getLink($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 57), 57, $this->source), $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 57), 57, $this->source), ["class" => ["dropdown-item"]]), "html", null, true);
                        yield "
      ";
                    }
                    // line 59
                    yield "      ";
                    if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 59)) {
                        // line 60
                        yield "        ";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::callMacro($macros["menus"], "macro_menu_links", [CoreExtension::getAttribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 60), CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "removeClass", ["nav", "navbar-nav"], "method", false, false, true, 60), (($context["menu_level"] ?? null) + 1)], 60, $context, $this->getSourceContext()));
                        yield "
      ";
                    }
                    // line 62
                    yield "        </li>
    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 64
                yield "      </ul>
  ";
            }
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/custom/martex/templates/navigation/menu--navigation-other.html.twig";
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
        return array (  162 => 64,  155 => 62,  149 => 60,  146 => 59,  141 => 57,  136 => 56,  131 => 54,  126 => 53,  124 => 52,  120 => 51,  115 => 50,  113 => 49,  109 => 48,  104 => 47,  102 => 46,  99 => 45,  97 => 42,  96 => 41,  95 => 40,  94 => 39,  93 => 38,  92 => 36,  90 => 35,  85 => 34,  81 => 32,  77 => 30,  74 => 29,  71 => 28,  68 => 27,  54 => 26,  45 => 24,  42 => 19,  40 => 18,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Default theme implementation to display a menu.
 *
 * Available variables:
 * - menu_name: The machine name of the menu.
 * - items: A nested list of menu items. Each menu item contains:
 *   - attributes: HTML attributes for the menu item.
 *   - below: The menu item child items.
 *   - title: The menu link title.
 *   - url: The menu link url, instance of \\Drupal\\Core\\Url
 *   - localized_options: Menu link localized options.
 *
 * @ingroup templates
 */
#}
{% import _self as menus %}

{#
  We call a macro which calls itself to render the full tree.
  @see http://twig.sensiolabs.org/doc/tags/macro.html
#}
{{ menus.menu_links(items, attributes, 0) }}

{% macro menu_links(items, attributes, menu_level) %}
  {% import _self as menus %}
  {% if items %}
    {% if menu_level == 0 %}
      <ul class=\"navbar-nav flex-row align-items-center ms-auto\">
    {% else %}
      <ul class=\"dropdown-menu\">
    {% endif %}
    {% for item in items %}
      {%
        set item_classes = [
          'nav-item',
          item.is_expanded ? 'expanded ',
          item.is_expanded ? 'dropdown',
\t\t      item.is_expanded ? 'has-dropdown',
          item.in_active_trail ? 'active',
          menu_level != 0 and item.is_expanded ? 'dropdown-submenu dropend'
        ]
      %}

      {% if menu_level == 0 and item.is_expanded %}
        <li{{ item.attributes.addClass(item_classes) }}>
\t\t      {{ link(item.title, item.url, { 'class':['nav-link dropdown-toggle'], 'data-bs-toggle':['dropdown']}) }}
      {% elseif menu_level == 0 and not item.is_expanded %}
        <li{{ item.attributes.addClass(item_classes) }}>
\t\t      {{ link(item.title, item.url, { 'class':['']}) }}
      {% elseif menu_level != 0 and item.is_expanded %}
        <li{{ item.attributes.addClass(item_classes) }}>
\t\t      {{ link(item.title, item.url, { 'class':['dropdown-item dropdown-toggle'], 'data-bs-toggle':['dropdown']}) }}
      {% else %}
        <li{{ item.attributes.addClass(item_classes) }}>
          {{ link(item.title, item.url, { 'class':['dropdown-item']}) }}
      {% endif %}
      {% if item.below %}
        {{ menus.menu_links(item.below, attributes.removeClass('nav', 'navbar-nav'), menu_level + 1) }}
      {% endif %}
        </li>
    {% endfor %}
      </ul>
  {% endif %}
{% endmacro %}
", "themes/custom/martex/templates/navigation/menu--navigation-other.html.twig", "/var/www/html/drupal/themes/custom/martex/templates/navigation/menu--navigation-other.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("import" => 18, "macro" => 26, "if" => 28, "for" => 34, "set" => 36);
        static $filters = array("escape" => 47);
        static $functions = array("link" => 48);

        try {
            $this->sandbox->checkSecurity(
                ['import', 'macro', 'if', 'for', 'set'],
                ['escape'],
                ['link'],
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
