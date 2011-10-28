<?php

/* text/text.tpl */
class __TwigTemplate_bc827566775b23948fef84a5d5a846fe extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'wrapper' => array($this, 'block_wrapper'),
        );
    }

    public function getParent(array $context)
    {
        if (null === $this->parent) {
            $this->parent = ((isset($context['TEMPLATE_PATH']) ? $context['TEMPLATE_PATH'] : null) . "base/main.tpl");
            if (!$this->parent instanceof Twig_Template) {
                $this->parent = $this->env->loadTemplate($this->parent);
            }
        }

        return $this->parent;
    }

    public function display(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_wrapper($context, array $blocks = array())
    {
        // line 4
        echo "\t<!-- RIGHT -->
\t\t\t\t\t";
        // line 5
        $template = ((isset($context['TEMPLATE_PATH']) ? $context['TEMPLATE_PATH'] : null) . "blocks/rightblock.tpl");
        if (!$template instanceof Twig_Template) {
            $template = $this->env->loadTemplate($template);
        }
        $template->display($context);
        // line 6
        echo "\t\t\t\t\t<!-- RIGHT -->
\t\t\t\t\t
\t\t\t\t\t
\t\t\t\t\t<!-- CENTER -->
\t\t\t\t\t<div id=\"center\" >
\t\t\t\t\t\t<h1>";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['modul']) ? $context['modul'] : null), "caption", array(), "any", false, 11), "html");
        echo "</h1>
\t\t\t\t\t\t<div class=\"content\">
\t\t\t\t\t\t\t";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('project')->compileFunction($this->env, $this->getAttribute((isset($context['modul']) ? $context['modul'] : null), "text", array(), "any", false, 13), $context), "html");
        echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div><!-- CENTER -->
\t
\t
\t\t\t\t<div id=\"subfooter-mini\"></div>\t
";
    }

    public function getTemplateName()
    {
        return "text/text.tpl";
    }
}
