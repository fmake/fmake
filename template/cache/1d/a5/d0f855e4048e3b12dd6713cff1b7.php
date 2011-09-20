<?php

/* kino/item.tpl */
class __TwigTemplate_1da5d0f855e4048e3b12dd6713cff1b7 extends Twig_Template
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
\t\t\t\t\t\t<div id=\"film-description\" class=\"content-block\">
\t\t\t\t\t\t\t<div class=\"navigation\">
\t\t\t\t\t\t\t\t<a href=\"/\">Главная</a>
\t\t\t\t\t\t\t\t";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context['breadcrumbs']) ? $context['breadcrumbs'] : null));
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
        foreach ($context['_seq'] as $context['_key'] => $context['bredcrumb']) {
            // line 15
            echo "\t\t\t\t\t\t\t\t\t";
            if ($this->getAttribute((isset($context['loop']) ? $context['loop'] : null), "last", array(), "any", false, 15)) {
                // line 16
                echo "\t\t\t\t\t\t\t\t\t\t/ ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['bredcrumb']) ? $context['bredcrumb'] : null), "caption", array(), "any", false, 16), "html");
                echo "
\t\t\t\t\t\t\t\t\t";
            } else {
                // line 18
                echo "\t\t\t\t\t\t\t\t\t\t/ <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['bredcrumb']) ? $context['bredcrumb'] : null), "link", array(), "any", false, 18), "html");
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['bredcrumb']) ? $context['bredcrumb'] : null), "caption", array(), "any", false, 18), "html");
                echo "</a>
\t\t\t\t\t\t\t\t\t";
            }
            // line 20
            echo "\t\t\t\t\t\t\t\t";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['bredcrumb'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 21
        echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"left-separator\">
\t\t\t\t\t\t\t\t<div class=\"header\">
\t\t\t\t\t\t\t\t\t<div class=\"date\">";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('project')->standartFunction("date", "d.m.Y", $this->getAttribute((isset($context['item']) ? $context['item'] : null), "date", array(), "any", false, 24)), "html");
        echo "</div>
\t\t\t\t\t\t\t\t\t<h1>";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "caption", array(), "any", false, 25), "html");
        echo "</h1>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<p class=\"janr\" ><span><a href=\"#comment\" ><img src=\"/images/icon-comment.gif\" /> Ваш отзыв</a></span>
\t\t\t\t\t\t\t\t";
        // line 28
        if ((isset($context['genres']) ? $context['genres'] : null)) {
            // line 29
            echo "\t\t\t\t\t\t\t\t\tЖанр фильма: 
\t\t\t\t\t\t\t\t\t";
            // line 30
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context['genres']) ? $context['genres'] : null));
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
            foreach ($context['_seq'] as $context['_key'] => $context['g']) {
                // line 31
                echo "\t\t\t\t\t\t\t\t\t\t";
                if ($this->getAttribute((isset($context['loop']) ? $context['loop'] : null), "last", array(), "any", false, 31)) {
                    // line 32
                    echo "\t\t\t\t\t\t\t\t\t\t\t<a href=\"/kino/genre-";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['g']) ? $context['g'] : null), "id_genre", array(), "any", false, 32), "html");
                    echo "/\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['g']) ? $context['g'] : null), "caption", array(), "any", false, 32), "html");
                    echo "</a>
\t\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 34
                    echo "\t\t\t\t\t\t\t\t\t\t\t<a href=\"/kino/genre-";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['g']) ? $context['g'] : null), "id_genre", array(), "any", false, 34), "html");
                    echo "/\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['g']) ? $context['g'] : null), "caption", array(), "any", false, 34), "html");
                    echo "</a>,
\t\t\t\t\t\t\t\t\t\t";
                }
                // line 36
                echo "\t\t\t\t\t\t\t\t\t";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['g'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 37
            echo "\t\t\t\t\t\t\t\t";
        }
        // line 38
        echo "\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<table>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td class=\"left-film\">
\t\t\t\t\t\t\t\t\t\t<img src=\"/images/films/";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 43), "html");
        echo "/mini_image.jpg\" alt=\"\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td class=\"right-film\" >
\t\t\t\t\t\t\t\t\t\t<div class=\"raiting\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 47
        echo "
\t\t\t\t\t\t\t\t\t\t\t<script>
\t\t\t\t\t\t\t\t\t\t\t\t\$(function(){  
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 50
        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 51
        if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_read", array(), "any", false, 51)) {
            // line 52
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#form";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 53), "html");
            echo " :radio.star').rating(";
            if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_count", array(), "any", false, 53)) {
                echo "'select',";
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_count", array(), "any", false, 53) - 1), "html");
            }
            echo ");
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#form";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 54), "html");
            echo " :radio.star').rating('readOnly',true);
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 55
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        } else {
            // line 57
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#form";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 58), "html");
            echo " :radio.star').rating(";
            if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_count", array(), "any", false, 58)) {
                echo "'select',";
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_count", array(), "any", false, 58) - 1), "html");
            }
            echo ");
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#form";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 59), "html");
            echo " :radio.star').rating('readOnly',false);
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 60
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 62
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\$('.star-rating').live('click',function(){
\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\tvar form = \$(this).parent().parent();
\t\t\t\t\t\t\t\t\t\t\t\t\t\tform.find('input').rating('readOnly',true);
\t\t\t\t\t\t\t\t\t\t\t\t\t\txajax_addStar(form.attr('rel'),form.find('input:checked').val());
\t\t\t\t\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\$('.show-film').live('click',function(){
\t\t\t\t\t\t\t\t\t\t\t\t\t\tif(\$('#video span').attr('class')){
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$(this).text('Скрыть фильм');
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#video span').removeClass('video-hide');
\t\t\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\t\t\telse{
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$(this).text('Смотреть фильм онлайн');
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#video span').addClass('video-hide');
\t\t\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t\t\t\t\t/*\$('.star-rating').rating({
\t\t\t\t\t\t\t\t\t\t\t\t\tfocus: function(value, link){
\t\t\t\t\t\t\t\t\t\t\t\t\t\talert('qq');
\t\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\t\t});*/ 
\t\t\t\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t\t\t\t\t\t";
        // line 87
        echo "
\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t<form id=\"form";
        // line 89
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 89), "html");
        echo "\" rel=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 89), "html");
        echo "\" method=\"POST\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 90
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 5));
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
        foreach ($context['_seq'] as $context['_key'] => $context['star']) {
            // line 91
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 91), "html");
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['loop']) ? $context['loop'] : null), "index", array(), "any", false, 91), "html");
            echo "\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['star'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 93
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<!-- <input name=\"star";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 93), "html");
        echo "\" value=\"1\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
        // line 94
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 94), "html");
        echo "\" value=\"2\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
        // line 95
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 95), "html");
        echo "\" value=\"3\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
        // line 96
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 96), "html");
        echo "\" value=\"4\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
        // line 97
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 97), "html");
        echo "\" value=\"5\" type=\"radio\" class=\"star\"/> -->
\t\t\t\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t<strong>";
        // line 102
        if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "year", array(), "any", false, 102)) {
            echo "Год выхода: ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "year", array(), "any", false, 102), "html");
            echo "<br />";
        }
        // line 103
        echo "\t\t\t\t\t\t\t\t\t\t\t";
        if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "genre", array(), "any", false, 103)) {
            echo "Жанр: ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "genre", array(), "any", false, 103), "html");
            echo "<br />";
        }
        // line 104
        echo "\t\t\t\t\t\t\t\t\t\t\t";
        if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "country", array(), "any", false, 104)) {
            echo "Выпущено: ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "country", array(), "any", false, 104), "html");
        }
        echo "</strong>
\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t<p class=\"italic\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 107
        if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "director", array(), "any", false, 107)) {
            echo "Режиссер: ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "director", array(), "any", false, 107), "html");
            echo " <br />";
        }
        // line 108
        echo "\t\t\t\t\t\t\t\t\t\t\t";
        if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "v_rolyax", array(), "any", false, 108)) {
            echo "В ролях: ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "v_rolyax", array(), "any", false, 108), "html");
        }
        // line 109
        echo "\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t<p class=\"about\" >
\t\t\t\t\t\t\t\t<strong>О фильме</strong>: ";
        // line 114
        echo twig_escape_filter($this->env, $this->env->getExtension('project')->compileFunction($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "anonse", array(), "any", false, 114), $context), "html");
        echo "
\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t";
        // line 116
        echo "
\t\t\t\t\t\t\t<style>
\t\t\t\t\t\t\t\tdiv#video .video-hide {display: none;}
\t\t\t\t\t\t\t</style>
\t\t\t\t\t\t\t";
        // line 120
        echo "
\t\t\t\t\t\t\t<a name=\"view-online\"></a>
\t\t\t\t\t\t\t";
        // line 122
        if (($this->getAttribute((isset($context['item']) ? $context['item'] : null), "show_player", array(), "any", false, 122) && $this->getAttribute((isset($context['item']) ? $context['item'] : null), "link_partners", array(), "any", false, 122))) {
            // line 123
            echo "\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t<a href=\"\" class=\"show-film\" onclick=\"xajax_clickLinkFilmView(";
            // line 124
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['request']) ? $context['request'] : null), "id", array(), "any", false, 124), "html");
            echo ");return false;\">Смотреть фильм онлайн</a>
\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t<div id=\"video\">
\t\t\t\t\t\t\t\t<span id=\"video-content\" class=\"video-hide\">
\t\t\t\t\t\t\t\t\t";
            // line 128
            echo twig_escape_filter($this->env, $this->env->getExtension('project')->compileFunction($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "link_partners", array(), "any", false, 128), $context), "html");
            echo "
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
        }
        // line 132
        echo "\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t";
        // line 133
        if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "url_partners", array(), "any", false, 133)) {
            // line 134
            echo "\t\t\t\t\t\t\t\t<a class=\"link-dashed\" target=\"_blank\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "url_partners", array(), "any", false, 134), "html");
            echo "\" >Скачать фильм</a></p>
\t\t\t\t\t\t\t";
        } else {
            // line 136
            echo "\t\t\t\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->env->getExtension('project')->compileFunction($this->env, $this->getAttribute((isset($context['configs']) ? $context['configs'] : null), "default_url_partners", array(), "any", false, 136), $this->getAttribute($context, "item", array(), "any", false, 136)), "html");
            echo "
\t\t\t\t\t\t\t";
        }
        // line 138
        echo "\t\t\t\t\t\t\t<div class=\"like\">
\t\t\t\t\t\t\t\t\t<div style=\"float:right;\">
\t\t\t\t\t\t\t\t\t\t<script type=\"text/javascript\" src=\"//yandex.st/share/share.js\" charset=\"utf-8\"></script><div style=\"float:left;\" class=\"yashare-auto-init\" data-yashareL10n=\"ru\" data-yashareType=\"button\" data-yashareQuickServices=\"yaru,vkontakte,facebook,twitter,odnoklassniki,moimir,lj\"></div> 
\t\t\t\t\t\t\t\t\t\t<div style=\"float:left;padding-top: 7px; \"><g:plusone size=\"small\"></g:plusone></div>
\t\t\t\t\t\t\t\t\t\t<div style=\"float:left;padding-top: 4px; \"><div id=\"fb-root\"></div><script src=\"http://connect.facebook.net/en_US/all.js#appId=173719562696000&amp;xfbml=1\"></script><fb:like href=\"\" send=\"true\" layout=\"button_count\" width=\"140\" show_faces=\"true\" font=\"\"></fb:like></div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
        // line 145
        echo "
\t\t\t\t\t\t\t<script src=\"/js/highslide-with-gallery.js\" type=\"text/javascript\"></script>
\t\t\t\t\t\t\t<link href=\"/css/highslide.css\" type=\"text/css\" rel=\"stylesheet\">
\t\t\t\t\t\t\t<script type=\"text/javascript\">
\t\t\t\t\t\t\ths.graphicsDir = '/images/graphics/';
\t\t\t\t\t\t\ths.align = 'center';
\t\t\t\t\t\t\ths.transitions = ['expand', 'crossfade'];
\t\t\t\t\t\t\ths.fadeInOut = true;
\t\t\t\t\t\t\ths.dimmingOpacity = 0.8;
\t\t\t\t\t\t\ths.outlineType = 'rounded-white';
\t\t\t\t\t\t\ths.captionEval = 'this.thumb.alt';
\t\t\t\t\t\t\ths.marginBottom = 105; // make room for the thumbstrip and the controls
\t\t\t\t\t\t\ths.numberPosition = 'caption';

\t\t\t\t\t\t\t// Add the slideshow providing the controlbar and the thumbstrip
\t\t\t\t\t\t\ths.addSlideshow({
\t\t\t\t\t\t\t\t//slideshowGroup: 'group1',
\t\t\t\t\t\t\t\tinterval: 5000,
\t\t\t\t\t\t\t\trepeat: false,
\t\t\t\t\t\t\t\tuseControls: true,
\t\t\t\t\t\t\t\toverlayOptions: {
\t\t\t\t\t\t\t\t\tclassName: 'text-controls',
\t\t\t\t\t\t\t\t\tposition: 'bottom center',
\t\t\t\t\t\t\t\t\trelativeTo: 'viewport',
\t\t\t\t\t\t\t\t\toffsetY: -60
\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\tthumbstrip: {
\t\t\t\t\t\t\t\t\tposition: 'bottom center',
\t\t\t\t\t\t\t\t\tmode: 'horizontal',
\t\t\t\t\t\t\t\t\trelativeTo: 'viewport'
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t});

\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</script>

\t\t\t\t\t\t\t<!--[if lt IE 7]>
\t\t\t\t\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"/styles/highslide-ie6.css\" />
\t\t\t\t\t\t\t<![endif]-->
\t\t\t\t\t\t\t";
        // line 184
        echo "
\t\t\t\t\t\t\t<p><strong>Кадры из фильма</strong></p>
\t\t\t\t\t\t\t<p class=\"film-kadr\">
\t\t\t\t\t\t\t\t";
        // line 187
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context['image_thumbs']) ? $context['image_thumbs'] : null));
        foreach ($context['_seq'] as $context['_key'] => $context['item_thumb']) {
            // line 188
            echo "\t\t\t\t\t\t\t\t\t<a class=\"highslide\" href=\"/images/films/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "array", false, 188), "html");
            echo "/mini/";
            echo twig_escape_filter($this->env, (isset($context['item_thumb']) ? $context['item_thumb'] : null), "html");
            echo "\" onclick=\"return hs.expand(this)\"><img src=\"/images/films/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "array", false, 188), "html");
            echo "/mini/thumbs/";
            echo twig_escape_filter($this->env, (isset($context['item_thumb']) ? $context['item_thumb'] : null), "html");
            echo "\" alt=\"\" /></a>
\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item_thumb'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 190
        echo "\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t";
        // line 191
        if ((isset($context['recomented']) ? $context['recomented'] : null)) {
            // line 192
            echo "\t\t\t\t\t\t\t<div class=\"caption\">Рекомендуем к просмотру</div>
\t\t\t\t\t\t\t<br /><br />
\t\t\t\t\t\t\t<div class=\"recomendation\">
\t\t\t\t\t\t\t\t<table><tr><td>
\t\t\t\t\t\t\t\t";
            // line 196
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context['recomented']) ? $context['recomented'] : null));
            foreach ($context['_seq'] as $context['_key'] => $context['recom']) {
                // line 197
                echo "\t\t\t\t\t\t\t\t\t<div class=\"item\">
\t\t\t\t\t\t\t\t\t\t<a href=\"/";
                // line 198
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['recom']) ? $context['recom'] : null), "id", array(), "any", false, 198), "html");
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['recom']) ? $context['recom'] : null), "url", array(), "any", false, 198), "html");
                echo ".html\">
\t\t\t\t\t\t\t\t\t\t\t";
                // line 199
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['recom']) ? $context['recom'] : null), "caption", array(), "any", false, 199), "html");
                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t<img src=\"/images/films/";
                // line 200
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['recom']) ? $context['recom'] : null), "id", array(), "any", false, 200), "html");
                echo "/mini_image.jpg\"/>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['recom'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 204
            echo "\t\t\t\t\t\t\t\t</td></tr></table>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
        }
        // line 207
        echo "\t\t\t\t\t\t\t<a name=\"comment\"></a>
\t\t\t\t\t\t\t<div class=\"comments\">
\t\t\t\t\t\t\t\t";
        // line 209
        if ((isset($context['error']) ? $context['error'] : null)) {
            // line 210
            echo "\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\tОшибки:<br/>
\t\t\t\t\t\t\t\t\t\t<span style=\"color: red;\">
\t\t\t\t\t\t\t\t\t\t";
            // line 213
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context['error']) ? $context['error'] : null));
            foreach ($context['_seq'] as $context['_key'] => $context['err']) {
                // line 214
                echo "\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, (isset($context['err']) ? $context['err'] : null), "html");
                echo "<br/>
\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['err'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 216
            echo "\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t";
        }
        // line 219
        echo "\t\t\t\t\t\t\t\t<div id=\"comment-form\">
\t\t\t\t\t\t\t\t\t<p><strong>Отзывы по фильму \"";
        // line 220
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "caption", array(), "any", false, 220), "html");
        echo "\"</strong></p>
\t\t\t\t\t\t\t\t\t";
        // line 221
        if ((isset($context['addcomment']) ? $context['addcomment'] : null)) {
            // line 222
            echo "\t\t\t\t\t\t\t\t\t\tСпасибо за оставленный коментарий, он будет добавлен в ближайшее время после модерации.
\t\t\t\t\t\t\t\t\t";
        } else {
            // line 224
            echo "\t\t\t\t\t\t\t\t\t<form method=\"post\" action=\"#comment\">
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"action\" value=\"comments\">
\t\t\t\t\t\t\t\t\t\t<table>
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td class=\"first\">
\t\t\t\t\t\t\t\t\t\t\t\t\tИмя:
\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"100%\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"text\" name=\"name\" value=\"";
            // line 232
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['request']) ? $context['request'] : null), "name", array(), "any", false, 232), "html");
            echo "\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td class=\"first\">
\t\t\t\t\t\t\t\t\t\t\t\t\tСообщение:
\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<textarea rows=\"\" cols=\"\" name=\"text\">";
            // line 240
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['request']) ? $context['request'] : null), "text", array(), "any", false, 240), "html");
            echo "</textarea>
\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"submit\" class=\"black-submit f_r\" value=\"ОТПРАВИТЬ\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\tВведите код: <img src=\"/getpicture.php\" alt=\"\" style=\"padding-right: 10px;\" /><input type=\"text\" class=\"capcha\" name=\"capcha\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t\t";
        }
        // line 255
        echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
        // line 256
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context['comments']) ? $context['comments'] : null));
        foreach ($context['_seq'] as $context['_key'] => $context['comm']) {
            // line 257
            echo "\t\t\t\t\t\t\t\t\t<div class=\"comment\">
\t\t\t\t\t\t\t\t\t\t<div class=\"commnet-head\" >
\t\t\t\t\t\t\t\t\t\t\t<div class=\"date-time\">";
            // line 259
            echo twig_escape_filter($this->env, $this->env->getExtension('project')->standartFunction("date", "d.m.Y", $this->getAttribute((isset($context['comm']) ? $context['comm'] : null), "date", array(), "any", false, 259)), "html");
            echo " <img src=\"/images/icon-time.gif\" /> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('project')->standartFunction("date", "G:i", $this->getAttribute((isset($context['comm']) ? $context['comm'] : null), "date", array(), "any", false, 259)), "html");
            echo "</div>
\t\t\t\t\t\t\t\t\t\t\t<span>";
            // line 260
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['comm']) ? $context['comm'] : null), "name", array(), "any", false, 260), "html");
            echo "</span>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<p class=\"text\">
\t\t\t\t\t\t\t\t\t\t\t";
            // line 263
            echo twig_escape_filter($this->env, $this->env->getExtension('project')->compileFunction($this->env, $this->getAttribute((isset($context['comm']) ? $context['comm'] : null), "text", array(), "any", false, 263), $context), "html");
            echo "
\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comm'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 267
        echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
        // line 268
        if (((isset($context['pages']) ? $context['pages'] : null) > 1)) {
            // line 269
            echo "\t\t\t\t\t\t\t<div class=\"pager\">
\t\t\t\t\t\t\t\t";
            // line 270
            if (((isset($context['page']) ? $context['page'] : null) == 1)) {
                // line 271
                echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
            } else {
                // line 273
                echo "\t\t\t\t\t\t\t\t\t\t<a href=\"/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['request']) ? $context['request'] : null), "modul", array(), "any", false, 273), "html");
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 273), "html");
                echo "/page-";
                echo twig_escape_filter($this->env, ((isset($context['page']) ? $context['page'] : null) - 1), "html");
                echo "/\" class=\"black-submit\">пред</a>
\t\t\t\t\t\t\t\t";
            }
            // line 275
            echo "\t\t\t\t\t\t\t\t";
            if (((isset($context['pages']) ? $context['pages'] : null) <= 10)) {
                // line 276
                echo "\t\t\t\t\t\t\t\t\t";
                $context['k1'] = 1;
                // line 277
                echo "\t\t\t\t\t\t\t\t\t";
                $context['k2'] = (isset($context['pages']) ? $context['pages'] : null);
                // line 278
                echo "\t\t\t\t\t\t\t\t";
            } else {
                // line 279
                echo "\t\t\t\t\t\t\t\t\t";
                if ((((isset($context['page']) ? $context['page'] : null) > 0) && ((isset($context['page']) ? $context['page'] : null) <= 7))) {
                    // line 280
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    $context['k1'] = 1;
                    // line 281
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    $context['k2'] = 9;
                    // line 282
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    $context['k3'] = 1;
                    // line 283
                    echo "\t\t\t\t\t\t\t\t\t";
                } elseif ((((isset($context['page']) ? $context['page'] : null) <= (isset($context['pages']) ? $context['pages'] : null)) && ((isset($context['page']) ? $context['page'] : null) >= ((isset($context['pages']) ? $context['pages'] : null) - 7)))) {
                    // line 284
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    $context['k1'] = ((isset($context['pages']) ? $context['pages'] : null) - 9);
                    // line 285
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    $context['k2'] = (isset($context['pages']) ? $context['pages'] : null);
                    // line 286
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    $context['k3'] = 2;
                    // line 287
                    echo "\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 288
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    $context['k1'] = ((isset($context['page']) ? $context['page'] : null) - 3);
                    // line 289
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    $context['k2'] = ((isset($context['page']) ? $context['page'] : null) + 3);
                    // line 290
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    $context['k3'] = 3;
                    // line 291
                    echo "\t\t\t\t\t\t\t\t\t";
                }
                // line 292
                echo "\t\t\t\t\t\t\t\t";
            }
            // line 293
            echo "\t\t\t\t\t\t\t\t";
            if ((((isset($context['k3']) ? $context['k3'] : null) == 2) || ((isset($context['k3']) ? $context['k3'] : null) == 3))) {
                // line 294
                echo "\t\t\t\t\t\t\t\t\t\t<a href=\"/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['request']) ? $context['request'] : null), "modul", array(), "any", false, 294), "html");
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 294), "html");
                echo "/page-1/\" class=\"black-submit\">1</a>
\t\t\t\t\t\t\t\t\t\t...
\t\t\t\t\t\t\t\t";
            }
            // line 297
            echo "\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
            // line 298
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range((isset($context['k1']) ? $context['k1'] : null), (isset($context['k2']) ? $context['k2'] : null)));
            foreach ($context['_seq'] as $context['_key'] => $context['i']) {
                // line 299
                echo "\t\t\t\t\t\t\t\t\t";
                if (((isset($context['page']) ? $context['page'] : null) == (isset($context['i']) ? $context['i'] : null))) {
                    // line 300
                    echo "\t\t\t\t\t\t\t\t\t\t<a href=\"javascript: void(0);\" class=\"black-submit active\">";
                    echo twig_escape_filter($this->env, (isset($context['i']) ? $context['i'] : null), "html");
                    echo "</a>
\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 302
                    echo "\t\t\t\t\t\t\t\t\t\t<a href=\"/";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['request']) ? $context['request'] : null), "modul", array(), "any", false, 302), "html");
                    echo "/";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 302), "html");
                    echo "/page-";
                    echo twig_escape_filter($this->env, (isset($context['i']) ? $context['i'] : null), "html");
                    echo "/\" class=\"black-submit\">";
                    echo twig_escape_filter($this->env, (isset($context['i']) ? $context['i'] : null), "html");
                    echo "</a>
\t\t\t\t\t\t\t\t\t";
                }
                // line 304
                echo "\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 305
            echo "
\t\t\t\t\t\t\t\t";
            // line 306
            if ((((isset($context['k3']) ? $context['k3'] : null) == 1) || ((isset($context['k3']) ? $context['k3'] : null) == 3))) {
                // line 307
                echo "\t\t\t\t\t\t\t\t\t\t...
\t\t\t\t\t\t\t\t\t\t<a href=\"/";
                // line 308
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['request']) ? $context['request'] : null), "modul", array(), "any", false, 308), "html");
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 308), "html");
                echo "/page-";
                echo twig_escape_filter($this->env, (isset($context['pages']) ? $context['pages'] : null), "html");
                echo "/\" class=\"black-submit\">";
                echo twig_escape_filter($this->env, (isset($context['pages']) ? $context['pages'] : null), "html");
                echo "</a>
\t\t\t\t\t\t\t\t";
            }
            // line 310
            echo "\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
            // line 311
            if (((isset($context['page']) ? $context['page'] : null) == (isset($context['pages']) ? $context['pages'] : null))) {
                // line 312
                echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
            } else {
                // line 314
                echo "\t\t\t\t\t\t\t\t\t\t<a href=\"/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['request']) ? $context['request'] : null), "modul", array(), "any", false, 314), "html");
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 314), "html");
                echo "/page-";
                echo twig_escape_filter($this->env, ((isset($context['page']) ? $context['page'] : null) + 1), "html");
                echo "/\" class=\"black-submit\">след</a>
\t\t\t\t\t\t\t\t";
            }
            // line 316
            echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
        }
        // line 318
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div><!-- CENTER -->
\t
\t
\t\t\t\t<div id=\"subfooter-mini\"></div>\t
";
    }

    public function getTemplateName()
    {
        return "kino/item.tpl";
    }
}
