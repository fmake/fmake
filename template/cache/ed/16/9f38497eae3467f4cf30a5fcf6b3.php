<?php

/* blocks/header.tpl */
class __TwigTemplate_ed169f38497eae3467f4cf30a5fcf6b3 extends Twig_Template
{
    public function display(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" >
<head>
\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1251\" />
\t<title>";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['modul']) ? $context['modul'] : null), "title", array(), "any", false, 5), "html");
        echo "</title>
\t<meta name=\"description\" content=\"";
        // line 6
        if ($this->getAttribute((isset($context['modul']) ? $context['modul'] : null), "description", array(), "any", false, 6)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['modul']) ? $context['modul'] : null), "description", array(), "any", false, 6), "html");
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['modul']) ? $context['modul'] : null), "title", array(), "any", false, 6), "html");
        }
        echo "\" />
\t<meta name=\"keywords\" content=\"";
        // line 7
        if ($this->getAttribute((isset($context['modul']) ? $context['modul'] : null), "keywords", array(), "any", false, 7)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['modul']) ? $context['modul'] : null), "keywords", array(), "any", false, 7), "html");
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['modul']) ? $context['modul'] : null), "title", array(), "any", false, 7), "html");
        }
        echo "\" />
\t<link rel=\"stylesheet\" type=\"text/css\" href=\"/styles/main.css\" />
\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=7\" />

\t<!--[if lte IE 6]>
\t\t<script type=\"text/javascript\" src=\"/js/ie6-fix.js\"></script>
\t<![endif]-->
\t<!--[if IE]>
\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"/styles/ie.css\" />
\t<![endif]-->
\t<script language=\"javascript\" type=\"text/javascript\" src=\"/js/jquery-1.6.1.min.js\"></script>
\t<script language=\"javascript\" type=\"text/javascript\" src=\"/js/jquery.MetaData.js\"></script>
\t<script language=\"javascript\" type=\"text/javascript\" src=\"/js/jquery.rating.js\"></script>
\t<link rel=\"stylesheet\" type=\"text/css\" href=\"/css/jquery.rating.css\">
\t<link rel=\"shortcut icon\" href=\"/favicon.ico\" type=\"image/x-icon\" />
\t";
        // line 22
        if ((isset($context['xajax']) ? $context['xajax'] : null)) {
            // line 23
            echo "\t\t";
            // line 
            
			$context['xajax']->printJavascript("/libs/xajax/");
		;
            // line 26
            echo "\t";
        }
        // line 27
        echo "</head>";
    }

    public function getTemplateName()
    {
        return "blocks/header.tpl";
    }
}
