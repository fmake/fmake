<?php

/* <div id="footer">
<div id="f-inner">
<div id="counter"><img alt="" src="/images/rambler-test.gif" /></div>
<div id="losung"><a href="/"> 					<img alt="onlite.ws" src="/images/logo-mini.png" /> 				</a>
<div>Смотри кино  					в удовольствие</div>
</div>
<div class="f-cr">[[if modul.params.index]]<a href="http://www.future-group.ru/">Создание сайтов</a>[[else]]Создание сайтов[[endif]] - Future group</div>
</div>
<!-- FOOTER --></div> */
class __TwigTemplate_ecc77c0562790654fadee8eb1f5155aa extends Twig_Template
{
    public function display(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<div id=\"footer\">
<div id=\"f-inner\">
<div id=\"counter\"><img alt=\"\" src=\"/images/rambler-test.gif\" /></div>
<div id=\"losung\"><a href=\"/\"> \t\t\t\t\t<img alt=\"onlite.ws\" src=\"/images/logo-mini.png\" /> \t\t\t\t</a>
<div>Смотри кино  \t\t\t\t\tв удовольствие</div>
</div>
<div class=\"f-cr\">";
        // line 7
        if ($this->getAttribute($this->getAttribute((isset($context['modul']) ? $context['modul'] : null), "params", array(), "any", false, 7), "index", array(), "any", false, 7)) {
            echo "<a href=\"http://www.future-group.ru/\">Создание сайтов</a>";
        } else {
            echo "Создание сайтов";
        }
        echo " - Future group</div>
</div>
<!-- FOOTER --></div>";
    }

    public function getTemplateName()
    {
        return "<div id=\"footer\">
<div id=\"f-inner\">
<div id=\"counter\"><img alt=\"\" src=\"/images/rambler-test.gif\" /></div>
<div id=\"losung\"><a href=\"/\"> \t\t\t\t\t<img alt=\"onlite.ws\" src=\"/images/logo-mini.png\" /> \t\t\t\t</a>
<div>Смотри кино  \t\t\t\t\tв удовольствие</div>
</div>
<div class=\"f-cr\">[[if modul.params.index]]<a href=\"http://www.future-group.ru/\">Создание сайтов</a>[[else]]Создание сайтов[[endif]] - Future group</div>
</div>
<!-- FOOTER --></div>";
    }
}
