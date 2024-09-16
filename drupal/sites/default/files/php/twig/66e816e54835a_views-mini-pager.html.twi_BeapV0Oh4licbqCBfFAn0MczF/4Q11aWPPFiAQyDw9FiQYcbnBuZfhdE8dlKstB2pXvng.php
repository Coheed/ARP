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

/* themes/contrib/bootstrap_barrio/templates/views/views-mini-pager.html.twig */
class __TwigTemplate_497410c15ace11ebcc74349a50c90832 extends Template
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
        // line 1
        yield "    ";
        // line 14
        yield "    ";
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, false, true, 14) || CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, false, true, 14))) {
            // line 15
            yield "      <nav aria-label=\"Page navigation\">
        <h4 class=\"visually-hidden\">";
            // line 16
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Pagination"));
            yield "</h4>
        <ul class=\"js-pager__items pagination\">
          ";
            // line 18
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, false, true, 18)) {
                // line 19
                yield "            <li class=\"page-item\">
              <a class=\"page-link\" href=\"";
                // line 20
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, false, true, 20), "href", [], "any", false, false, true, 20), 20, $this->source), "html", null, true);
                yield "\" title=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Go to previous page"));
                yield "\" rel=\"prev\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, false, true, 20), "attributes", [], "any", false, false, true, 20), 20, $this->source), "href", "title", "rel"), "html", null, true);
                yield ">
                <span class=\"visually-hidden\">";
                // line 21
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Previous page"));
                yield "</span>
                <span aria-hidden=\"true\">";
                // line 22
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, true, true, 22), "text", [], "any", true, true, true, 22)) ? (Twig\Extension\CoreExtension::default($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, true, true, 22), "text", [], "any", false, false, true, 22), 22, $this->source), t("‹‹"))) : (t("‹‹"))), "html", null, true);
                yield "</span>
              </a>
            </li>
          ";
            }
            // line 26
            yield "          ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "current", [], "any", false, false, true, 26)) {
                // line 27
                yield "            <li class=\"page-item\">
              <span class=\"page-link\">
                ";
                // line 29
                yield t("Page @items.current", array("@items.current" => CoreExtension::getAttribute($this->env, $this->source,                 // line 30
($context["items"] ?? null), "current", [], "any", false, false, true, 30), ));
                // line 32
                yield "              </span>
            </li>
          ";
            }
            // line 35
            yield "          ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, false, true, 35)) {
                // line 36
                yield "            <li class=\"page-item\">
              <a class=\"page-link\" href=\"";
                // line 37
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, false, true, 37), "href", [], "any", false, false, true, 37), 37, $this->source), "html", null, true);
                yield "\" title=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Go to next page"));
                yield "\" rel=\"next\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, false, true, 37), "attributes", [], "any", false, false, true, 37), 37, $this->source), "href", "title", "rel"), "html", null, true);
                yield ">
                <span class=\"visually-hidden\">";
                // line 38
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Next page"));
                yield "</span>
                <span aria-hidden=\"true\">";
                // line 39
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, true, true, 39), "text", [], "any", true, true, true, 39)) ? (Twig\Extension\CoreExtension::default($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, true, true, 39), "text", [], "any", false, false, true, 39), 39, $this->source), t("››"))) : (t("››"))), "html", null, true);
                yield "</span>
              </a>
            </li>
          ";
            }
            // line 43
            yield "        </ul>
      </nav>
    ";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["items"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/contrib/bootstrap_barrio/templates/views/views-mini-pager.html.twig";
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
        return array (  117 => 43,  110 => 39,  106 => 38,  98 => 37,  95 => 36,  92 => 35,  87 => 32,  85 => 30,  84 => 29,  80 => 27,  77 => 26,  70 => 22,  66 => 21,  58 => 20,  55 => 19,  53 => 18,  48 => 16,  45 => 15,  42 => 14,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("    {#
    /**
     * @file
     * Default theme implementation for a views mini-pager.
     *
     * Available variables:
     * - items: List of pager items.
     *
     * @see template_preprocess_views_mini_pager()
     *
     * @ingroup themeable
     */
    #}
    {% if items.previous or items.next %}
      <nav aria-label=\"Page navigation\">
        <h4 class=\"visually-hidden\">{{ 'Pagination'|t }}</h4>
        <ul class=\"js-pager__items pagination\">
          {% if items.previous %}
            <li class=\"page-item\">
              <a class=\"page-link\" href=\"{{ items.previous.href }}\" title=\"{{ 'Go to previous page'|t }}\" rel=\"prev\"{{ items.previous.attributes|without('href', 'title', 'rel') }}>
                <span class=\"visually-hidden\">{{ 'Previous page'|t }}</span>
                <span aria-hidden=\"true\">{{ items.previous.text|default('‹‹'|t) }}</span>
              </a>
            </li>
          {% endif %}
          {% if items.current %}
            <li class=\"page-item\">
              <span class=\"page-link\">
                {% trans %}
                  Page {{ items.current }}
                {% endtrans %}
              </span>
            </li>
          {% endif %}
          {% if items.next %}
            <li class=\"page-item\">
              <a class=\"page-link\" href=\"{{ items.next.href }}\" title=\"{{ 'Go to next page'|t }}\" rel=\"next\"{{ items.next.attributes|without('href', 'title', 'rel') }}>
                <span class=\"visually-hidden\">{{ 'Next page'|t }}</span>
                <span aria-hidden=\"true\">{{ items.next.text|default('››'|t) }}</span>
              </a>
            </li>
          {% endif %}
        </ul>
      </nav>
    {% endif %}
", "themes/contrib/bootstrap_barrio/templates/views/views-mini-pager.html.twig", "/var/www/html/drupal/themes/contrib/bootstrap_barrio/templates/views/views-mini-pager.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 14, "trans" => 29);
        static $filters = array("t" => 16, "escape" => 20, "without" => 20, "default" => 22);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'trans'],
                ['t', 'escape', 'without', 'default'],
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
