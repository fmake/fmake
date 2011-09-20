<?php

/* 404.tpl */
class __TwigTemplate_8b9c5b23c28eaba81e97a06c583cc771 extends Twig_Template
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
            $this->parent = $this->env->loadTemplate("base/main.tpl");
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
        echo "<!-- CONTENT -->
\t<center>
\t\t<div class=\"error_text\" >Ошибка 404<br/>
\t\t\t<span>Вы попали на пустую страницу, попробуйте начать <a href=\"/\">отсюда</a></span>
\t\t</div>
\t</center>
";
    }

    public function getTemplateName()
    {
        return "404.tpl";
    }
}
