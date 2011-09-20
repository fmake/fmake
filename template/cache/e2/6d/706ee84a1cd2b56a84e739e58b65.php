<?php

/* blocks/rightblock.tpl */
class __TwigTemplate_e26d706ee84a1cd2b56a84e739e58b65 extends Twig_Template
{
    public function display(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<div id=\"right\">\t
\t\t\t\t\t\t<div id=\"film-janr\" class=\"right-block\" >
\t\t\t\t\t\t\t<div class=\"caption\">Жанр Кино</div>
\t\t\t\t\t\t\t<table><tr><td>
\t\t\t\t\t\t\t\t<ul class=\"ul-janr\">
\t\t\t\t\t\t\t\t";
        // line 6
        $context['i'] = 0;
        // line 7
        echo "\t\t\t\t\t\t\t\t";
        $context['limit_li'] = floor(((isset($context['genres_size']) ? $context['genres_size'] : null) / 2));
        // line 8
        echo "\t\t\t\t\t\t\t\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context['genresall']) ? $context['genresall'] : null));
        foreach ($context['_seq'] as $context['_key'] => $context['gen']) {
            // line 9
            echo "\t\t\t\t\t\t\t\t\t";
            if (((isset($context['i']) ? $context['i'] : null) == ((isset($context['limit_li']) ? $context['limit_li'] : null) + 1))) {
                // line 10
                echo "\t\t\t\t\t\t\t\t\t\t</ul><ul class=\"ul-janr\">
\t\t\t\t\t\t\t\t\t\t";
                // line 11
                $context['i'] = 0;
                // line 12
                echo "\t\t\t\t\t\t\t\t\t";
            }
            // line 13
            echo "\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a ";
            // line 14
            if ((($this->getAttribute((isset($context['gen']) ? $context['gen'] : null), "id_genre", array(), "any", false, 14) == $this->getAttribute((isset($context['request']) ? $context['request'] : null), "genre", array(), "any", false, 14)) || ($this->getAttribute((isset($context['gen']) ? $context['gen'] : null), "id_genre", array(), "any", false, 14) == (isset($context['id_genre']) ? $context['id_genre'] : null)))) {
                echo "class=\"active\"";
            }
            echo " href=\"/kino/genre-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['gen']) ? $context['gen'] : null), "id_genre", array(), "any", false, 14), "html");
            echo "/\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['gen']) ? $context['gen'] : null), "caption", array(), "any", false, 14), "html");
            echo "</a> 
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t";
            // line 16
            $context['i'] = ((isset($context['i']) ? $context['i'] : null) + 1);
            // line 17
            echo "\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['gen'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 18
        echo "\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</td></tr></table>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t<div id=\"search\" class=\"right-block\" >
\t\t\t\t\t\t\t<div class=\"caption\">Поиск фильма</div>
\t\t\t\t\t\t\t<form action=\"/search/\" method=\"post\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"text_search\" class=\"text\" autocomplete=\"off\" />
\t\t\t\t\t\t\t\t<div class=\"al-r\"><input class=\"orange-submit\" type=\"submit\" value=\"НАЙТИ\"/></div>
\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t<div id=\"reklama\" class=\"right-block\" >
\t\t\t\t\t\t\t<div class=\"caption\">Место для рекламы</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t<div id=\"opros\" class=\"right-block\" >
\t\t\t\t\t\t\t<div class=\"caption\">Опрос</div>
\t\t\t\t\t\t\t<p>";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['interview']) ? $context['interview'] : null), "caption", array(), "any", false, 36), "html");
        echo "</p>
\t\t\t\t\t\t\t<form method=\"post\">
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"active\" value=\"interview\">
\t\t\t\t\t\t\t\t<table>
\t\t\t\t\t\t\t\t\t";
        // line 40
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context['vopros']) ? $context['vopros'] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context['_key'] => $context['v']) {
            // line 41
            echo "\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t";
            // line 42
            if ((!(isset($context['iscookie']) ? $context['iscookie'] : null))) {
                // line 43
                echo "\t\t\t\t\t\t\t\t\t\t\t<td width=\"20px\">
\t\t\t\t\t\t\t\t\t\t\t\t<input ";
                // line 44
                if ($this->getAttribute((isset($context['loop']) ? $context['loop'] : null), "first", array(), "any", false, 44)) {
                    echo "checked";
                }
                echo " type=\"radio\" name=\"film\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['v']) ? $context['v'] : null), "id", array(), "any", false, 44), "html");
                echo "\" id=\"vote-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['loop']) ? $context['loop'] : null), "index0", array(), "any", false, 44), "html");
                echo "\" />
\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 47
            echo "\t\t\t\t\t\t\t\t\t\t\t<td width=\"150px\">
\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"vote-";
            // line 48
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['loop']) ? $context['loop'] : null), "index0", array(), "any", false, 48), "html");
            echo "\"><strong>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['v']) ? $context['v'] : null), "caption", array(), "any", false, 48), "html");
            echo "</strong></label>
\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t";
            // line 50
            if ((isset($context['iscookie']) ? $context['iscookie'] : null)) {
                // line 51
                echo "\t\t\t\t\t\t\t\t\t\t\t<td width=\"30px\">
\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"vote-";
                // line 52
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['loop']) ? $context['loop'] : null), "index0", array(), "any", false, 52), "html");
                echo "\"><strong>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['v']) ? $context['v'] : null), "stat", array(), "any", false, 52), "html");
                echo "</strong></label>
\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 55
            echo "\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['v'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 57
        echo "\t\t\t\t\t\t\t\t\t";
        if ((!(isset($context['iscookie']) ? $context['iscookie'] : null))) {
            // line 58
            echo "\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td width=\"20px\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t<td align=\"right\">
\t\t\t\t\t\t\t\t\t\t\t<br />
\t\t\t\t\t\t\t\t\t\t\t<input class=\"black-submit\" type=\"submit\" value=\"ОТВЕТИТЬ\"/>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t";
        }
        // line 68
        echo "\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t<div id=\"phrase\" class=\"right-block\" >
\t\t\t\t\t\t\t<div class=\"caption\">К нам заходят по фразам</div>
\t\t\t\t\t\t\t\t";
        // line 74
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context['search_query']) ? $context['search_query'] : null));
        foreach ($context['_seq'] as $context['_key'] => $context['s']) {
            // line 75
            echo "\t\t\t\t\t\t\t\t\t<div class=\"search-phrase ";
            if (($this->getAttribute((isset($context['s']) ? $context['s'] : null), "search_num", array(), "any", false, 75) == "0")) {
                echo "mail-ru";
            } elseif (($this->getAttribute((isset($context['s']) ? $context['s'] : null), "search_num", array(), "any", false, 75) == "2")) {
                echo "yandex-ru";
            } else {
                echo "google-ru";
            }
            echo "\" >
\t\t\t\t\t\t\t\t\t\t<div class=\"img\">&nbsp;</div>";
            // line 76
            if (($this->getAttribute((isset($context['s']) ? $context['s'] : null), "search_num", array(), "any", false, 76) == "0")) {
                echo "Mail.ru";
            } elseif (($this->getAttribute((isset($context['s']) ? $context['s'] : null), "search_num", array(), "any", false, 76) == "2")) {
                echo "Яndex.ru";
            } else {
                echo "Google";
            }
            echo ": <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['s']) ? $context['s'] : null), "url", array(), "any", false, 76), "html");
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['s']) ? $context['s'] : null), "query", array(), "any", false, 76), "html");
            echo "</a>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 79
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t</div>";
    }

    public function getTemplateName()
    {
        return "blocks/rightblock.tpl";
    }
}
