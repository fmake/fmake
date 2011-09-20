<?php

/* blocks/menu.tpl */
class __TwigTemplate_ad839b1434600dd956cbca9e9d345871 extends Twig_Template
{
    public function display(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "\t\t\t\t<div id=\"top-menu\" class=\"menu\" >
\t\t\t\t\t<ul>
\t\t\t\t\t\t";
        // line 3
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context['menu']) ? $context['menu'] : null));
        foreach ($context['_seq'] as $context['_key'] => $context['m']) {
            // line 4
            echo "\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a ";
            // line 5
            if (($this->getAttribute((isset($context['m']) ? $context['m'] : null), "id", array(), "any", false, 5) == $this->getAttribute((isset($context['modul']) ? $context['modul'] : null), "id", array(), "any", false, 5))) {
                echo "class=\"active\"";
            }
            echo " href=\"";
            if ($this->getAttribute((isset($context['m']) ? $context['m'] : null), "redir", array(), "any", false, 5)) {
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['m']) ? $context['m'] : null), "redir", array(), "any", false, 5), "html");
                echo "/";
            } else {
                echo "/";
            }
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['m']) ? $context['m'] : null), "caption", array(), "any", false, 5), "html");
            echo "</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 8
        echo "\t\t\t\t\t\t<!-- <li>
\t\t\t\t\t\t\t<a href=\"\" class=\"active\" >Кино</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"\">Новинки</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"\">Избранное</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"\">Оплата</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"\">Услуги</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"\">Контакты</a>
\t\t\t\t\t\t</li>  -->
\t\t\t\t\t</ul>
\t\t\t\t</div>";
    }

    public function getTemplateName()
    {
        return "blocks/menu.tpl";
    }
}
