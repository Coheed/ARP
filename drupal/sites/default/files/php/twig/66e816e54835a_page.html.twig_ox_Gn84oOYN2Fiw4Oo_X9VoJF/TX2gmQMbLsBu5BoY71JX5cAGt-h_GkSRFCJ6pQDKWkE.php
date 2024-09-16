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

/* themes/custom/martex/templates/layout/page.html.twig */
class __TwigTemplate_1f1af82fee48a0d50e6ae922534eeb7a extends Template
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
            'title' => [$this, 'block_title'],
            'main' => [$this, 'block_main'],
            'sidebar_first' => [$this, 'block_sidebar_first'],
            'highlighted' => [$this, 'block_highlighted'],
            'breadcrumb' => [$this, 'block_breadcrumb'],
            'action_links' => [$this, 'block_action_links'],
            'help' => [$this, 'block_help'],
            'content' => [$this, 'block_content'],
            'sidebar_second' => [$this, 'block_sidebar_second'],
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
<a id=\"top\"></a>
";
        // line 61
        if ((($context["extra_class"] ?? null) || ($context["font_class"] ?? null))) {
            yield "<div class=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["extra_class"] ?? null), 61, $this->source), "html", null, true);
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["font_class"] ?? null), 61, $this->source), "html", null, true);
            yield "\">";
        }
        // line 63
        yield "<header class=\"wrapper\">  
  ";
        // line 64
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "top_bar", [], "any", false, false, true, 64)) {
            // line 65
            yield "    ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "top_bar", [], "any", false, false, true, 65), 65, $this->source), "html", null, true);
            yield "
  ";
        }
        // line 67
        yield "
  ";
        // line 68
        if ((((CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "navigation", [], "any", false, false, true, 68) || CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "navigation_collapsible", [], "any", false, false, true, 68)) || CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "branding", [], "any", false, false, true, 68)) || CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "navigation_other", [], "any", false, false, true, 68))) {
            // line 69
            yield "  ";
            yield from $this->unwrap()->yieldBlock('navbar', $context, $blocks);
            // line 110
            yield "  ";
        }
        // line 111
        yield "
  ";
        // line 113
        yield "  <div class=\"offcanvas offcanvas-top bg-light\" id=\"offcanvas-search\" data-bs-scroll=\"true\">
    <div class=\"container d-flex flex-row py-6\">
      <div class=\"search-form w-100\">
        ";
        // line 116
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalBlock("search_form_block", array(), false), "html", null, true);
        yield "
      </div>
      <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\"></button>
    </div>
  </div>
</header>
<!--end header navbar-->

";
        // line 125
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "title", [], "any", false, false, true, 125)) {
            // line 126
            yield "<section class=\"wrapper title-wrapper\">
  <div class=\"";
            // line 127
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["container"] ?? null), 127, $this->source), "html", null, true);
            yield " text-center\">
    <div class=\"row\">
      <div class=\"col-md-8 col-lg-7 col-xl-6 mx-auto\">
        ";
            // line 131
            yield "        ";
            yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
            // line 133
            yield "\t
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</section>
";
        }
        // line 142
        yield "<!--end title-->

";
        // line 145
        yield from $this->unwrap()->yieldBlock('main', $context, $blocks);
        // line 222
        yield "<!--end main-->

";
        // line 225
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 225)) {
            // line 226
            yield from $this->unwrap()->yieldBlock('footer', $context, $blocks);
        }
        // line 236
        yield "<!--end footer-->

";
        // line 238
        if ((($context["extra_class"] ?? null) || ($context["font_class"] ?? null))) {
            yield "</div>";
        }
        // line 239
        yield "
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["extra_class", "font_class", "page", "container", "mainmenu_class", "mainmenu_transparent", "mainmenu_absolute", "attributes", "content_attributes", "breadcrumb", "title", "title_attributes", "action_links", "footer_classes"]);        return; yield '';
    }

    // line 69
    public function block_navbar($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 70
        yield "    ";
        // line 71
        $context["navbar_classes"] = ["navbar navbar-expand-lg center-nav",         // line 73
($context["mainmenu_class"] ?? null),         // line 74
($context["mainmenu_transparent"] ?? null),         // line 75
($context["mainmenu_absolute"] ?? null)];
        // line 78
        yield "  
    <nav";
        // line 79
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["navbar_classes"] ?? null)], "method", false, false, true, 79), 79, $this->source), "html", null, true);
        yield ">
      <div class=\"";
        // line 80
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["container"] ?? null), 80, $this->source), "html", null, true);
        yield " flex-lg-row flex-nowrap align-items-center\">
        <div class=\"navbar-brand w-100 d-flex\">          
\t        ";
        // line 82
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "branding", [], "any", false, false, true, 82), 82, $this->source), "html", null, true);
        yield "
          <div class=\"d-lg-none ms-auto\">
            <button class=\"hamburger offcanvas-nav-btn ms-auto\"><span></span></button>
          </div>    
        </div>
        <div class=\"navbar-collapse offcanvas offcanvas-nav offcanvas-start\">
          <div class=\"offcanvas-header d-lg-none\">
            <h3 class=\"text-white fs-30 mb-0\">Sandbox</h3>
            <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\"></button>
          </div>
          <div class=\"offcanvas-body ms-lg-auto d-flex flex-column h-100\">
            ";
        // line 93
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "navigation_collapsible", [], "any", false, false, true, 93), 93, $this->source), "html", null, true);
        yield "
            <div class=\"offcanvas-footer d-lg-none\">
              ";
        // line 95
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalEntity("block_content", "7"), "html", null, true);
        yield "
            </div>            
          </div>
        </div>
        ";
        // line 99
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "navigation_other", [], "any", false, false, true, 99)) {
            // line 100
            yield "        <div class=\"navbar-other w-100 d-flex ms-auto\">
          ";
            // line 101
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "navigation_other", [], "any", false, false, true, 101), 101, $this->source), "html", null, true);
            yield "          
        </div>
        ";
        }
        // line 104
        yield "        <!--end of row-->
      </div>
      <!--end of container-->
    </nav>
    <!--end bar-->\t  \t  
  ";
        return; yield '';
    }

    // line 131
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 132
        yield "          ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "title", [], "any", false, false, true, 132), 132, $this->source), "html", null, true);
        yield "
        ";
        return; yield '';
    }

    // line 145
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 146
        yield "  <div role=\"main\" id=\"main-container\" class=\"main-container ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["container"] ?? null), 146, $this->source), "html", null, true);
        yield " js-quickedit-main-content\">
\t<div class=\"row gx-lg-5 gx-xl-5\">
      ";
        // line 149
        yield "      ";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 149)) {
            // line 150
            yield "        ";
            yield from $this->unwrap()->yieldBlock('sidebar_first', $context, $blocks);
            // line 155
            yield "      ";
        }
        // line 156
        yield "
      ";
        // line 158
        yield "      ";
        // line 159
        $context["content_classes"] = [(((CoreExtension::getAttribute($this->env, $this->source,         // line 160
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 160) && CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 160))) ? ("col-md-6") : ("")), (((CoreExtension::getAttribute($this->env, $this->source,         // line 161
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 161) && Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 161)))) ? ("col-md-9") : ("")), (((CoreExtension::getAttribute($this->env, $this->source,         // line 162
($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 162) && Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 162)))) ? ("col-md-8") : ("")), (((Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source,         // line 163
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 163)) && Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 163)))) ? ("col-md-12") : (""))];
        // line 166
        yield "      <div";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [($context["content_classes"] ?? null)], "method", false, false, true, 166), 166, $this->source), "html", null, true);
        yield ">

        ";
        // line 169
        yield "        ";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 169)) {
            // line 170
            yield "          ";
            yield from $this->unwrap()->yieldBlock('highlighted', $context, $blocks);
            // line 173
            yield "        ";
        }
        // line 174
        yield "
        ";
        // line 176
        yield "        ";
        if (($context["breadcrumb"] ?? null)) {
            // line 177
            yield "          ";
            yield from $this->unwrap()->yieldBlock('breadcrumb', $context, $blocks);
            // line 180
            yield "        ";
        }
        // line 181
        yield "
        ";
        // line 183
        yield "\t\t";
        if (($context["title"] ?? null)) {
            // line 184
            yield "          <h1";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", ["page-header"], "method", false, false, true, 184), 184, $this->source), "html", null, true);
            yield ">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 184, $this->source), "html", null, true);
            yield "</h1>
        ";
        }
        // line 186
        yield "\t\t";
        // line 187
        yield "\t\t
        ";
        // line 189
        yield "        ";
        if (($context["action_links"] ?? null)) {
            // line 190
            yield "          ";
            yield from $this->unwrap()->yieldBlock('action_links', $context, $blocks);
            // line 193
            yield "        ";
        }
        // line 194
        yield "
        ";
        // line 196
        yield "        ";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "help", [], "any", false, false, true, 196)) {
            // line 197
            yield "          ";
            yield from $this->unwrap()->yieldBlock('help', $context, $blocks);
            // line 200
            yield "        ";
        }
        // line 201
        yield "
        ";
        // line 203
        yield "        ";
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 207
        yield "      </div>

      ";
        // line 210
        yield "      ";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 210)) {
            // line 211
            yield "        ";
            yield from $this->unwrap()->yieldBlock('sidebar_second', $context, $blocks);
            // line 218
            yield "      ";
        }
        // line 219
        yield "    </div>
  </div>
";
        return; yield '';
    }

    // line 150
    public function block_sidebar_first($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 151
        yield "          <aside class=\"col-sm-3\" role=\"complementary\">
            ";
        // line 152
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 152), 152, $this->source), "html", null, true);
        yield "
          </aside>
        ";
        return; yield '';
    }

    // line 170
    public function block_highlighted($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 171
        yield "            <div class=\"highlighted\">";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 171), 171, $this->source), "html", null, true);
        yield "</div>
          ";
        return; yield '';
    }

    // line 177
    public function block_breadcrumb($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 178
        yield "            ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["breadcrumb"] ?? null), 178, $this->source), "html", null, true);
        yield "
          ";
        return; yield '';
    }

    // line 190
    public function block_action_links($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 191
        yield "            <ul class=\"action-links\">";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["action_links"] ?? null), 191, $this->source), "html", null, true);
        yield "</ul>
          ";
        return; yield '';
    }

    // line 197
    public function block_help($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 198
        yield "            ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "help", [], "any", false, false, true, 198), 198, $this->source), "html", null, true);
        yield "
          ";
        return; yield '';
    }

    // line 203
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 204
        yield "          <a id=\"main-content\"></a>
          ";
        // line 205
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 205), 205, $this->source), "html", null, true);
        yield "
        ";
        return; yield '';
    }

    // line 211
    public function block_sidebar_second($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 212
        yield "          <aside id=\"sidebar-second\" class=\"col-md-4 d-sm-none d-md-block\" role=\"complementary\">
            <div class=\"sidebar boxed boxed--border boxed--lg bg--secondary\">
              ";
        // line 214
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 214), 214, $this->source), "html", null, true);
        yield "
            </div>
          </aside>
        ";
        return; yield '';
    }

    // line 226
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 227
        yield "<footer class=\"footer ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_classes"] ?? null), 227, $this->source), "html", null, true);
        yield "\">
  <div class=\"";
        // line 228
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["container"] ?? null), 228, $this->source), "html", null, true);
        yield " pt-13 pt-md-15 pb-7\">\t
  ";
        // line 229
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 229)) {
            // line 230
            yield "\t  ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 230), 230, $this->source), "html", null, true);
            yield "
\t";
        }
        // line 232
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
        return "themes/custom/martex/templates/layout/page.html.twig";
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
        return array (  479 => 232,  473 => 230,  471 => 229,  467 => 228,  462 => 227,  458 => 226,  449 => 214,  445 => 212,  441 => 211,  434 => 205,  431 => 204,  427 => 203,  419 => 198,  415 => 197,  407 => 191,  403 => 190,  395 => 178,  391 => 177,  383 => 171,  379 => 170,  371 => 152,  368 => 151,  364 => 150,  357 => 219,  354 => 218,  351 => 211,  348 => 210,  344 => 207,  341 => 203,  338 => 201,  335 => 200,  332 => 197,  329 => 196,  326 => 194,  323 => 193,  320 => 190,  317 => 189,  314 => 187,  312 => 186,  304 => 184,  301 => 183,  298 => 181,  295 => 180,  292 => 177,  289 => 176,  286 => 174,  283 => 173,  280 => 170,  277 => 169,  271 => 166,  269 => 163,  268 => 162,  267 => 161,  266 => 160,  265 => 159,  263 => 158,  260 => 156,  257 => 155,  254 => 150,  251 => 149,  245 => 146,  241 => 145,  233 => 132,  229 => 131,  219 => 104,  213 => 101,  210 => 100,  208 => 99,  201 => 95,  196 => 93,  182 => 82,  177 => 80,  173 => 79,  170 => 78,  168 => 75,  167 => 74,  166 => 73,  165 => 71,  163 => 70,  159 => 69,  152 => 239,  148 => 238,  144 => 236,  141 => 226,  139 => 225,  135 => 222,  133 => 145,  129 => 142,  118 => 133,  115 => 131,  109 => 127,  106 => 126,  104 => 125,  93 => 116,  88 => 113,  85 => 111,  82 => 110,  79 => 69,  77 => 68,  74 => 67,  68 => 65,  66 => 64,  63 => 63,  55 => 61,  51 => 59,);
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

<a id=\"top\"></a>
{% if extra_class or font_class %}<div class=\"{{ extra_class }} {{ font_class }}\">{% endif %}
{# Header Navbar #}
<header class=\"wrapper\">  
  {% if page.top_bar %}
    {{ page.top_bar }}
  {% endif %}

  {% if page.navigation or page.navigation_collapsible or page.branding or page.navigation_other %}
  {% block navbar %}
    {%
      set navbar_classes = [
        'navbar navbar-expand-lg center-nav',
\t\t    mainmenu_class,
\t\t    mainmenu_transparent,
        mainmenu_absolute,
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
            <h3 class=\"text-white fs-30 mb-0\">Sandbox</h3>
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
    <!--end bar-->\t  \t  
  {% endblock %}
  {% endif %}

  {# Modal search form #}
  <div class=\"offcanvas offcanvas-top bg-light\" id=\"offcanvas-search\" data-bs-scroll=\"true\">
    <div class=\"container d-flex flex-row py-6\">
      <div class=\"search-form w-100\">
        {{ drupal_block('search_form_block', wrapper=false) }}
      </div>
      <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\"></button>
    </div>
  </div>
</header>
<!--end header navbar-->

{# Title #}
{% if page.title  %}
<section class=\"wrapper title-wrapper\">
  <div class=\"{{ container }} text-center\">
    <div class=\"row\">
      <div class=\"col-md-8 col-lg-7 col-xl-6 mx-auto\">
        {# Title #}
        {% block title %}
          {{ page.title }}
        {% endblock %}\t
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</section>
{% endif %}
<!--end title-->

{# Main #}
{% block main %}
  <div role=\"main\" id=\"main-container\" class=\"main-container {{ container }} js-quickedit-main-content\">
\t<div class=\"row gx-lg-5 gx-xl-5\">
      {# Sidebar First #}
      {% if page.sidebar_first %}
        {% block sidebar_first %}
          <aside class=\"col-sm-3\" role=\"complementary\">
            {{ page.sidebar_first }}
          </aside>
        {% endblock %}
      {% endif %}

      {# Content #}
      {%
        set content_classes = [
          page.sidebar_first and page.sidebar_second ? 'col-md-6',
          page.sidebar_first and page.sidebar_second is empty ? 'col-md-9',
          page.sidebar_second and page.sidebar_first is empty ? 'col-md-8',
          page.sidebar_first is empty and page.sidebar_second is empty ? 'col-md-12'
        ]
      %}
      <div{{ content_attributes.addClass(content_classes) }}>

        {# Highlighted #}
        {% if page.highlighted %}
          {% block highlighted %}
            <div class=\"highlighted\">{{ page.highlighted }}</div>
          {% endblock %}
        {% endif %}

        {# Breadcrumbs #}
        {% if breadcrumb %}
          {% block breadcrumb %}
            {{ breadcrumb }}
          {% endblock %}
        {% endif %}

        {# Title #}
\t\t{% if title %}
          <h1{{ title_attributes.addClass('page-header') }}>{{ title }}</h1>
        {% endif %}
\t\t{# Title #}
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

      {# Sidebar Second #}
      {% if page.sidebar_second %}
        {% block sidebar_second %}
          <aside id=\"sidebar-second\" class=\"col-md-4 d-sm-none d-md-block\" role=\"complementary\">
            <div class=\"sidebar boxed boxed--border boxed--lg bg--secondary\">
              {{ page.sidebar_second }}
            </div>
          </aside>
        {% endblock %}
      {% endif %}
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

", "themes/custom/martex/templates/layout/page.html.twig", "/var/www/html/drupal/themes/custom/martex/templates/layout/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 61, "block" => 69, "set" => 71);
        static $filters = array("escape" => 61);
        static $functions = array("drupal_block" => 116, "drupal_entity" => 95);

        try {
            $this->sandbox->checkSecurity(
                ['if', 'block', 'set'],
                ['escape'],
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
