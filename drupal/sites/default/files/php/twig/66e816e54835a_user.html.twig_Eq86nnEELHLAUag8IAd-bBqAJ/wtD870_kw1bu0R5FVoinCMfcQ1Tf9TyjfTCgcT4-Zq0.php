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

/* themes/custom/martex/templates/user/user.html.twig */
class __TwigTemplate_59f49cee689e7547e58ec48bf26f1f18 extends Template
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
        // line 19
        yield "<article";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["profile"], "method", false, false, true, 19), 19, $this->source), "html", null, true);
        yield ">

    <section class=\"wrapper space-0 bg-light\">
      <div class=\"container pt-16 pt-md-18 pb-12 pb-md-18 pb-lg-20\">
        <div class=\"row mt-10\">
          <div class=\"col-lg-3 mx-auto\">
            <div class=\"img-mask mask-2\">";
        // line 25
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "user_picture", [], "any", false, false, true, 25), 25, $this->source), "html", null, true);
        yield "</div>
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
        <div class=\"row mt-5\">
          <div class=\"col-md-10 col-lg-9 col-xxl-8 mx-auto text-center\">
            <h3 class=\"s-24 text-uppercase text-muted mb-3\">";
        // line 32
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_user_role", [], "any", false, false, true, 32), 32, $this->source), "html", null, true);
        yield "</h3>
            <h2 class=\"s-48 w-700 mb-5\">";
        // line 33
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_user_name", [], "any", false, false, true, 33), 33, $this->source), "html", null, true);
        yield "</h2>
            <p class=\"lead fs-22\">";
        // line 34
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_user_description", [], "any", false, false, true, 34), 34, $this->source), "html", null, true);
        yield "</p>
            ";
        // line 36
        yield "          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
      <div class=\"overflow-hidden\">
        <div class=\"divider text-light mx-n2\">
          <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 1440 92.26\">
            <path fill=\"currentColor\" d=\"M1206,21.2c-60-5-119-36.92-291-5C772,51.11,768,48.42,708,43.13c-60-5.68-108-29.92-168-30.22-60,.3-147,27.93-207,28.23-60-.3-122-25.94-182-36.91S30,5.93,0,16.2V92.26H1440v-87l-30,5.29C1348.94,22.29,1266,26.19,1206,21.2Z\" />
          </svg>
        </div>
      </div>
      <!-- /.overflow-hidden -->
    </section>
    <section class=\"wrapper division-bottom\">
      <div class=\"container pt-12 pb-12\">
        <div class=\"mt-md-n20 mt-lg-n22\">
          ";
        // line 54
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, views_embed_view("blog_lists", "block_3"), "html", null, true);
        yield "
        </div>
      </div>
    </section>
</article>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "content"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/custom/martex/templates/user/user.html.twig";
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
        return array (  92 => 54,  72 => 36,  68 => 34,  64 => 33,  60 => 32,  50 => 25,  40 => 19,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override to present all user data.
 *
 * This template is used when viewing a registered user's page,
 * e.g., example.com/user/123. 123 being the user's ID.
 *
 * Available variables:
 * - content: A list of content items. Use 'content' to print all content, or
 *   print a subset such as 'content.field_example'. Fields attached to a user
 *   such as 'user_picture' are available as 'content.user_picture'.
 * - attributes: HTML attributes for the container element.
 * - user: A Drupal User entity.
 *
 * @see template_preprocess_user()
 */
#}
<article{{ attributes.addClass('profile') }}>

    <section class=\"wrapper space-0 bg-light\">
      <div class=\"container pt-16 pt-md-18 pb-12 pb-md-18 pb-lg-20\">
        <div class=\"row mt-10\">
          <div class=\"col-lg-3 mx-auto\">
            <div class=\"img-mask mask-2\">{{ content.user_picture }}</div>
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
        <div class=\"row mt-5\">
          <div class=\"col-md-10 col-lg-9 col-xxl-8 mx-auto text-center\">
            <h3 class=\"s-24 text-uppercase text-muted mb-3\">{{ content.field_user_role }}</h3>
            <h2 class=\"s-48 w-700 mb-5\">{{ content.field_user_name }}</h2>
            <p class=\"lead fs-22\">{{ content.field_user_description}}</p>
            {# {% if content %} {{- content -}} {% endif %} #}
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
      <div class=\"overflow-hidden\">
        <div class=\"divider text-light mx-n2\">
          <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 1440 92.26\">
            <path fill=\"currentColor\" d=\"M1206,21.2c-60-5-119-36.92-291-5C772,51.11,768,48.42,708,43.13c-60-5.68-108-29.92-168-30.22-60,.3-147,27.93-207,28.23-60-.3-122-25.94-182-36.91S30,5.93,0,16.2V92.26H1440v-87l-30,5.29C1348.94,22.29,1266,26.19,1206,21.2Z\" />
          </svg>
        </div>
      </div>
      <!-- /.overflow-hidden -->
    </section>
    <section class=\"wrapper division-bottom\">
      <div class=\"container pt-12 pb-12\">
        <div class=\"mt-md-n20 mt-lg-n22\">
          {{ drupal_view('blog_lists', 'block_3') }}
        </div>
      </div>
    </section>
</article>
", "themes/custom/martex/templates/user/user.html.twig", "/var/www/html/drupal/themes/custom/martex/templates/user/user.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 19);
        static $functions = array("drupal_view" => 54);

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
                ['drupal_view'],
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
