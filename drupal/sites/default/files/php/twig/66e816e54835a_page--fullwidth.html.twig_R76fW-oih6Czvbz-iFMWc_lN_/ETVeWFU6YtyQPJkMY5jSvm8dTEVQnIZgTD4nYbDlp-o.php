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

/* themes/custom/martex/templates/layout/page--fullwidth.html.twig */
class __TwigTemplate_166ee1355c895a6a02849adc07ad24f0 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'navbar' => [$this, 'block_navbar'],
            'main' => [$this, 'block_main'],
            'action_links' => [$this, 'block_action_links'],
            'help' => [$this, 'block_help'],
            'content' => [$this, 'block_content'],
            'footer' => [$this, 'block_footer'],
        ];
        $this->sandbox = $this->env->getExtension(SandboxExtension::class);
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 59
        yield "
<a id=\"top\">
 
  </a>
<div class=\"container flex-lg-row flex-nowrap align-items-center\">
";
        // line 64
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "top_bar", [], "any", false, false, true, 64)) {
            // line 65
            yield "  ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(Twig\Extension\CoreExtension::replace($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "top_bar", [], "any", false, false, true, 65), 65, $this->source)), []));
            yield "
";
        }
        // line 67
        yield "
</div>
";
        // line 70
        if ((($context["extra_class"] ?? null) || ($context["font_class"] ?? null))) {
            yield "<div class=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["extra_class"] ?? null), 70, $this->source), "html", null, true);
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["font_class"] ?? null), 70, $this->source), "html", null, true);
            yield "\">";
        }
        // line 71
        yield "<header class=\"wrapper white-scroll\">  
  <!-- NAVIGATION MENU -->
  ";
        // line 73
        if ((((CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "navigation", [], "any", false, false, true, 73) || CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "navigation_collapsible", [], "any", false, false, true, 73)) || CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "branding", [], "any", false, false, true, 73)) || CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "navigation_other", [], "any", false, false, true, 73))) {
            // line 74
            yield "  ";
            yield from $this->unwrap()->yieldBlock('navbar', $context, $blocks);
            // line 112
            yield "  ";
        }
        // line 113
        yield "
  ";
        // line 115
        yield "  <div class=\"offcanvas offcanvas-top bg-light\" id=\"offcanvas-search\" data-bs-scroll=\"true\">
    <div class=\"container d-flex flex-row py-6\">
      <div class=\"search-form w-100\" id=\"search-form\">
        ";
        // line 118
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalBlock("search_form_block", array(), false), "html", null, true);
        yield "
      </div>
      <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\"></button>
    </div>
  </div>
</header>
<!--end header navbar-->

";
        // line 127
        yield from $this->unwrap()->yieldBlock('main', $context, $blocks);
        // line 153
        yield "<!--end main-->

";
        // line 156
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 156)) {
            // line 157
            yield from $this->unwrap()->yieldBlock('footer', $context, $blocks);
        }
        // line 167
        yield "<!--end footer-->

";
        // line 169
        if ((($context["extra_class"] ?? null) || ($context["font_class"] ?? null))) {
            yield "</div>";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["page", "extra_class", "font_class", "mainmenu_class", "attributes", "container", "site_name", "content_attributes", "content_classes", "action_links", "footer_classes"]);        return; yield '';
    }

    // line 74
    public function block_navbar($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 75
        yield "    ";
        // line 76
        $context["navbar_classes"] = ["navbar navbar-expand-lg center-nav",         // line 78
($context["mainmenu_class"] ?? null)];
        // line 81
        yield "  
    <nav";
        // line 82
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["navbar_classes"] ?? null)], "method", false, false, true, 82), 82, $this->source), "html", null, true);
        yield ">
      <div class=\"";
        // line 83
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["container"] ?? null), 83, $this->source), "html", null, true);
        yield " flex-lg-row flex-nowrap align-items-center\">
        <div class=\"navbar-brand w-100 d-flex\">          
\t        ";
        // line 85
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "branding", [], "any", false, false, true, 85), 85, $this->source), "html", null, true);
        yield "
          <div class=\"d-lg-none ms-auto\">
            <button class=\"hamburger offcanvas-nav-btn ms-auto\"><span></span></button>
          </div>    
        </div>
        <div class=\"navbar-collapse offcanvas offcanvas-nav offcanvas-start\">
          <div class=\"offcanvas-header d-lg-none\">
            <h3 class=\"text-white fs-30 mb-0\">";
        // line 92
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 92, $this->source), "html", null, true);
        yield "</h3>
            <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\"></button>
          </div>
          <div class=\"offcanvas-body ms-lg-auto d-flex flex-column h-100\">
            ";
        // line 96
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "navigation_collapsible", [], "any", false, false, true, 96), 96, $this->source), "html", null, true);
        yield "
            <div class=\"offcanvas-footer d-lg-none\">
              ";
        // line 98
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalEntity("block_content", "7"), "html", null, true);
        yield "
            </div>
          </div>          
        </div>
        ";
        // line 102
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "navigation_other", [], "any", false, false, true, 102)) {
            // line 103
            yield "        <div class=\"navbar-other w-100 d-flex ms-auto\">
          ";
            // line 104
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "navigation_other", [], "any", false, false, true, 104), 104, $this->source), "html", null, true);
            yield "          
        </div>
        ";
        }
        // line 107
        yield "        <!--end of row-->
      </div>
      <!--end of container-->
    </nav>
  ";
        return; yield '';
    }

    // line 127
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 128
        yield "  <div role=\"main\" id=\"main-container\" class=\"main-container js-quickedit-main-content\">
      <div";
        // line 129
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [($context["content_classes"] ?? null)], "method", false, false, true, 129), 129, $this->source), "html", null, true);
        yield ">
\t\t
        ";
        // line 132
        yield "        ";
        if (($context["action_links"] ?? null)) {
            // line 133
            yield "          ";
            yield from $this->unwrap()->yieldBlock('action_links', $context, $blocks);
            // line 136
            yield "        ";
        }
        // line 137
        yield "
        ";
        // line 139
        yield "        ";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "help", [], "any", false, false, true, 139)) {
            // line 140
            yield "          ";
            yield from $this->unwrap()->yieldBlock('help', $context, $blocks);
            // line 143
            yield "        ";
        }
        // line 144
        yield "
        ";
        // line 146
        yield "        ";
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 150
        yield "      </div>
  </div>
";
        return; yield '';
    }

    // line 133
    public function block_action_links($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 134
        yield "            <ul class=\"action-links\">";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["action_links"] ?? null), 134, $this->source), "html", null, true);
        yield "</ul>
          ";
        return; yield '';
    }

    // line 140
    public function block_help($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 141
        yield "            ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "help", [], "any", false, false, true, 141), 141, $this->source), "html", null, true);
        yield "
          ";
        return; yield '';
    }

    // line 146
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 147
        yield "          <a id=\"main-content\"></a>
          ";
        // line 148
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 148), 148, $this->source), "html", null, true);
        yield "
        ";
        return; yield '';
    }

    // line 157
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 158
        yield "<footer class=\"footer ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_classes"] ?? null), 158, $this->source), "html", null, true);
        yield "\">
  <div class=\"";
        // line 159
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["container"] ?? null), 159, $this->source), "html", null, true);
        yield " pt-13 pt-md-15 pb-7\">\t
  ";
        // line 160
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 160)) {
            // line 161
            yield "\t  ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 161), 161, $this->source), "html", null, true);
            yield "
\t";
        }
        // line 163
        yield "  </div>
</footer>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/custom/martex/templates/layout/page--fullwidth.html.twig";
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
        return array (  302 => 163,  296 => 161,  294 => 160,  290 => 159,  285 => 158,  281 => 157,  274 => 148,  271 => 147,  267 => 146,  259 => 141,  255 => 140,  247 => 134,  243 => 133,  236 => 150,  233 => 146,  230 => 144,  227 => 143,  224 => 140,  221 => 139,  218 => 137,  215 => 136,  212 => 133,  209 => 132,  204 => 129,  201 => 128,  197 => 127,  188 => 107,  182 => 104,  179 => 103,  177 => 102,  170 => 98,  165 => 96,  158 => 92,  148 => 85,  143 => 83,  139 => 82,  136 => 81,  134 => 78,  133 => 76,  131 => 75,  127 => 74,  119 => 169,  115 => 167,  112 => 157,  110 => 156,  106 => 153,  104 => 127,  93 => 118,  88 => 115,  85 => 113,  82 => 112,  79 => 74,  77 => 73,  73 => 71,  65 => 70,  61 => 67,  55 => 65,  53 => 64,  46 => 59,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Default theme implementation to display a single page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.html.twig template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - base_path: The base URL path of the Drupal installation. Will usually be
 *   \"/\" unless you have installed Drupal in a sub-directory.
 * - is_front: A flag indicating if the current page is the front page.
 * - logged_in: A flag indicating if the user is registered and signed in.
 * - is_admin: A flag indicating if the user has permission to access
 *   administration pages.
 *
 * Site identity:
 * - front_page: The URL of the front page. Use this instead of base_path when
 *   linking to the front page. This includes the language domain or prefix.
 *
 * Navigation:
 * - breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.html.twig):
 * - title_prefix: Additional output populated by modules, intended to be
 *   displayed in front of the main title tag that appears in the template.
 * - title: The page title, for use in the actual content.
 * - title_suffix: Additional output populated by modules, intended to be
 *   displayed after the main title tag that appears in the template.
 * - messages: Status and error messages. Should be displayed prominently.
 * - tabs: Tabs linking to any sub-pages beneath the current page (e.g., the
 *   view and edit tabs when displaying a node).
 * - action_links: Actions local to the page, such as \"Add menu\" on the menu
 *   administration interface.
 * - node: Fully loaded node, if there is an automatically-loaded node
 *   associated with the page and the node ID is the second argument in the
 *   page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - page.header: Items for the header region.
 * - page.navigation: Items for the navigation region.
 * - page.navigation_collapsible: Items for the navigation (collapsible) region.
 * - page.highlighted: Items for the highlighted content region.
 * - page.help: Dynamic help text, mostly for admin pages.
 * - page.content: The main content of the current page.
 * - page.sidebar_first: Items for the first sidebar.
 * - page.sidebar_second: Items for the second sidebar.
 * - page.footer: Items for the footer region.
 *
 * @ingroup templates
 *
 * @see template_preprocess_page()
 * @see html.html.twig
 */
#}

<a id=\"top\">
 
  </a>
<div class=\"container flex-lg-row flex-nowrap align-items-center\">
{% if page.top_bar %}
  {{ page.top_bar|render|replace({  })|raw }}
{% endif %}

</div>
{# Header Navbar #}
{% if extra_class or font_class %}<div class=\"{{ extra_class }} {{ font_class }}\">{% endif %}
<header class=\"wrapper white-scroll\">  
  <!-- NAVIGATION MENU -->
  {% if page.navigation or page.navigation_collapsible or page.branding or page.navigation_other %}
  {% block navbar %}
    {%
      set navbar_classes = [
        'navbar navbar-expand-lg center-nav',
\t\t    mainmenu_class
      ]
    %}
  
    <nav{{ attributes.addClass(navbar_classes) }}>
      <div class=\"{{ container }} flex-lg-row flex-nowrap align-items-center\">
        <div class=\"navbar-brand w-100 d-flex\">          
\t        {{ page.branding }}
          <div class=\"d-lg-none ms-auto\">
            <button class=\"hamburger offcanvas-nav-btn ms-auto\"><span></span></button>
          </div>    
        </div>
        <div class=\"navbar-collapse offcanvas offcanvas-nav offcanvas-start\">
          <div class=\"offcanvas-header d-lg-none\">
            <h3 class=\"text-white fs-30 mb-0\">{{ site_name }}</h3>
            <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\"></button>
          </div>
          <div class=\"offcanvas-body ms-lg-auto d-flex flex-column h-100\">
            {{ page.navigation_collapsible }}
            <div class=\"offcanvas-footer d-lg-none\">
              {{ drupal_entity('block_content', '7') }}
            </div>
          </div>          
        </div>
        {% if page.navigation_other %}
        <div class=\"navbar-other w-100 d-flex ms-auto\">
          {{ page.navigation_other }}          
        </div>
        {% endif %}
        <!--end of row-->
      </div>
      <!--end of container-->
    </nav>
  {% endblock %}
  {% endif %}

  {# Modal search form #}
  <div class=\"offcanvas offcanvas-top bg-light\" id=\"offcanvas-search\" data-bs-scroll=\"true\">
    <div class=\"container d-flex flex-row py-6\">
      <div class=\"search-form w-100\" id=\"search-form\">
        {{ drupal_block('search_form_block', wrapper=false) }}
      </div>
      <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\"></button>
    </div>
  </div>
</header>
<!--end header navbar-->

{# Main #}
{% block main %}
  <div role=\"main\" id=\"main-container\" class=\"main-container js-quickedit-main-content\">
      <div{{ content_attributes.addClass(content_classes) }}>
\t\t
        {# Action Links #}
        {% if action_links %}
          {% block action_links %}
            <ul class=\"action-links\">{{ action_links }}</ul>
          {% endblock %}
        {% endif %}

        {# Help #}
        {% if page.help %}
          {% block help %}
            {{ page.help }}
          {% endblock %}
        {% endif %}

        {# Content #}
        {% block content %}
          <a id=\"main-content\"></a>
          {{ page.content }}
        {% endblock %}
      </div>
  </div>
{% endblock %}
<!--end main-->

{# Footer #}
{% if page.footer %}
{% block footer %}
<footer class=\"footer {{ footer_classes }}\">
  <div class=\"{{ container }} pt-13 pt-md-15 pb-7\">\t
  {% if page.footer %}
\t  {{ page.footer }}
\t{% endif %}
  </div>
</footer>
{% endblock %}
{% endif %}
<!--end footer-->

{% if extra_class or font_class %}</div>{% endif %}
", "themes/custom/martex/templates/layout/page--fullwidth.html.twig", "/var/www/html/drupal/themes/custom/martex/templates/layout/page--fullwidth.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 64, "block" => 74, "set" => 76);
        static $filters = array("raw" => 65, "replace" => 65, "render" => 65, "escape" => 70);
        static $functions = array("drupal_block" => 118, "drupal_entity" => 98);

        try {
            $this->sandbox->checkSecurity(
                ['if', 'block', 'set'],
                ['raw', 'replace', 'render', 'escape'],
                ['drupal_block', 'drupal_entity'],
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
