<?php

/* kino/main_newfilm.tpl */
class __TwigTemplate_669db65fc26796af7318f62980a6b9d5 extends Twig_Template
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
\t\t\t\t\t\t";
        // line 12
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context['items']) ? $context['items'] : null));
        foreach ($context['_seq'] as $context['_key'] => $context['item']) {
            // line 13
            echo "\t\t\t\t\t\t<div class=\"film-item content-block\">
\t\t\t\t\t\t\t<table><tr>
\t\t\t\t\t\t\t\t<td class=\"left-film\" width=\"100%\" >
\t\t\t\t\t\t\t\t\t<div class=\"header\"><span class=\"date\" >";
            // line 16
            echo twig_escape_filter($this->env, $this->env->getExtension('project')->standartFunction("date", "d.m.Y", $this->getAttribute((isset($context['item']) ? $context['item'] : null), "date", array(), "any", false, 16)), "html");
            echo "</span><a href=\"/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 16), "html");
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "url", array(), "any", false, 16), "html");
            echo ".html\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "caption", array(), "any", false, 16), "html");
            echo "</a></div>
\t\t\t\t\t\t\t\t\t<p class=\"janr\" ><span><a href=\"/";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 17), "html");
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "url", array(), "any", false, 17), "html");
            echo ".html#comment\" ><img src=\"/images/icon-comment.gif\" /> Ваш отзыв</a></span>
\t\t\t\t\t\t\t\t\t";
            // line 18
            if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "genres", array(), "any", false, 18)) {
                // line 19
                echo "\t\t\t\t\t\t\t\t\t\tЖанр фильма: 
\t\t\t\t\t\t\t\t\t\t";
                // line 20
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context['item']) ? $context['item'] : null), "genres", array(), "any", false, 20));
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
                    // line 21
                    echo "\t\t\t\t\t\t\t\t\t\t\t";
                    if ($this->getAttribute((isset($context['loop']) ? $context['loop'] : null), "last", array(), "any", false, 21)) {
                        // line 22
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"/kino/genre-";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['g']) ? $context['g'] : null), "id_genre", array(), "any", false, 22), "html");
                        echo "/\">";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['g']) ? $context['g'] : null), "caption", array(), "any", false, 22), "html");
                        echo "</a>
\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 24
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"/kino/genre-";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['g']) ? $context['g'] : null), "id_genre", array(), "any", false, 24), "html");
                        echo "/\">";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['g']) ? $context['g'] : null), "caption", array(), "any", false, 24), "html");
                        echo "</a>,
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 26
                    echo "\t\t\t\t\t\t\t\t\t\t";
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
                // line 27
                echo "\t\t\t\t\t\t\t\t\t";
            }
            // line 28
            echo "\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t<strong>";
            // line 30
            if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "year", array(), "any", false, 30)) {
                echo "Год выхода: ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "year", array(), "any", false, 30), "html");
                echo "<br />";
            }
            // line 31
            echo "\t\t\t\t\t\t\t\t\t\t";
            if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "genre", array(), "any", false, 31)) {
                echo "Жанр: ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "genre", array(), "any", false, 31), "html");
                echo "<br />";
            }
            // line 32
            echo "\t\t\t\t\t\t\t\t\t\t";
            if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "country", array(), "any", false, 32)) {
                echo "Выпущено: ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "country", array(), "any", false, 32), "html");
            }
            echo "</strong>
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t<p class=\"italic\">
\t\t\t\t\t\t\t\t\t\t";
            // line 35
            if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "director", array(), "any", false, 35)) {
                echo "Режиссер: ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "director", array(), "any", false, 35), "html");
                echo " <br />";
            }
            // line 36
            echo "\t\t\t\t\t\t\t\t\t\t";
            if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "v_rolyax", array(), "any", false, 36)) {
                echo "В ролях: ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "v_rolyax", array(), "any", false, 36), "html");
            }
            // line 37
            echo "\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t<p class=\"about\" >
\t\t\t\t\t\t\t\t\t\t<strong>О фильме</strong>: ";
            // line 39
            echo twig_escape_filter($this->env, $this->env->getExtension('project')->compileFunction($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "anonse", array(), "any", false, 39), $context), "html");
            echo "
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t<a href=\"/";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 41), "html");
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "url", array(), "any", false, 41), "html");
            echo ".html#view-online\" class=\"black-submit\" title=\"Смотреть онлайн\">СМОТРЕТЬ ОНЛАЙН</a>
\t\t\t\t\t\t\t\t\t<a href=\"/";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 42), "html");
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "url", array(), "any", false, 42), "html");
            echo ".html#view-online\" class=\"orange-submit\" title=\"Скачать\" >СКАЧАТЬ</a>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t<td class=\"right-film\">
\t\t\t\t\t\t\t\t\t\t<a href=\"/";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 45), "html");
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "url", array(), "any", false, 45), "html");
            echo ".html\">
\t\t\t\t\t\t\t\t\t\t\t<img src=\"/images/films/";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 46), "html");
            echo "/mini_image.jpg\" alt=\"\" />
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t";
            // line 48
            echo "
\t\t\t\t\t\t\t\t\t\t<script>
\t\t\t\t\t\t\t\t\t\t\t\$(function(){  
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 51
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 52
            if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_read", array(), "any", false, 52)) {
                // line 53
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#form";
                // line 54
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 54), "html");
                echo " :radio.star').rating(";
                if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_count", array(), "any", false, 54)) {
                    echo "'select',";
                    echo twig_escape_filter($this->env, ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_count", array(), "any", false, 54) - 1), "html");
                }
                echo ");
\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#form";
                // line 55
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 55), "html");
                echo " :radio.star').rating('readOnly',true);
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 56
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t";
            } else {
                // line 58
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#form";
                // line 59
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 59), "html");
                echo " :radio.star').rating(";
                if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_count", array(), "any", false, 59)) {
                    echo "'select',";
                    echo twig_escape_filter($this->env, ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_count", array(), "any", false, 59) - 1), "html");
                }
                echo ");
\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#form";
                // line 60
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 60), "html");
                echo " :radio.star').rating('readOnly',false);
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 61
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 63
            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\$('.star-rating').live('click',function(){
\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\tvar form = \$(this).parent().parent();
\t\t\t\t\t\t\t\t\t\t\t\t\tform.find('input').rating('readOnly',true);
\t\t\t\t\t\t\t\t\t\t\t\t\txajax_addStar(form.attr('rel'),form.find('input:checked').val());
\t\t\t\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t\t\t\t\t";
            // line 72
            echo "
\t\t\t\t\t\t\t\t\t\t<div class=\"raiting-star\">
\t\t\t\t\t\t\t\t\t\t\t<form id=\"form";
            // line 74
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 74), "html");
            echo "\" rel=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 74), "html");
            echo "\" method=\"POST\">
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 75
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
                // line 76
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 76), "html");
                echo "\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['loop']) ? $context['loop'] : null), "index", array(), "any", false, 76), "html");
                echo "\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t";
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
            // line 78
            echo "\t\t\t\t\t\t\t\t\t\t\t\t<!-- <input name=\"star";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 78), "html");
            echo "\" value=\"1\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
            // line 79
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 79), "html");
            echo "\" value=\"2\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
            // line 80
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 80), "html");
            echo "\" value=\"3\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
            // line 81
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 81), "html");
            echo "\" value=\"4\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
            // line 82
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 82), "html");
            echo "\" value=\"5\" type=\"radio\" class=\"star\"/> -->
\t\t\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr></table>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 89
        echo "\t\t\t\t\t\t
\t\t\t\t\t\t";
        // line 90
        if (((isset($context['pages']) ? $context['pages'] : null) > 1)) {
            // line 91
            echo "\t\t\t\t\t\t\t<div class=\"pager\">
\t\t\t\t\t\t\t";
            // line 92
            if (((isset($context['page']) ? $context['page'] : null) == 1)) {
                // line 93
                echo "\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
            } else {
                // line 95
                echo "\t\t\t\t\t\t\t\t\t<a href=\"/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['request']) ? $context['request'] : null), "modul", array(), "any", false, 95), "html");
                echo "/page-";
                echo twig_escape_filter($this->env, ((isset($context['page']) ? $context['page'] : null) - 1), "html");
                echo "/\" class=\"black-submit\">пред</a>
\t\t\t\t\t\t\t";
            }
            // line 97
            echo "\t\t\t\t\t\t\t";
            if (((isset($context['pages']) ? $context['pages'] : null) <= 10)) {
                // line 98
                echo "\t\t\t\t\t\t\t\t";
                $context['k1'] = 1;
                // line 99
                echo "\t\t\t\t\t\t\t\t";
                $context['k2'] = (isset($context['pages']) ? $context['pages'] : null);
                // line 100
                echo "\t\t\t\t\t\t\t";
            } else {
                // line 101
                echo "\t\t\t\t\t\t\t\t";
                if ((((isset($context['page']) ? $context['page'] : null) > 0) && ((isset($context['page']) ? $context['page'] : null) <= 7))) {
                    // line 102
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context['k1'] = 1;
                    // line 103
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context['k2'] = 9;
                    // line 104
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context['k3'] = 1;
                    // line 105
                    echo "\t\t\t\t\t\t\t\t";
                } elseif ((((isset($context['page']) ? $context['page'] : null) <= (isset($context['pages']) ? $context['pages'] : null)) && ((isset($context['page']) ? $context['page'] : null) >= ((isset($context['pages']) ? $context['pages'] : null) - 7)))) {
                    // line 106
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context['k1'] = ((isset($context['pages']) ? $context['pages'] : null) - 9);
                    // line 107
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context['k2'] = (isset($context['pages']) ? $context['pages'] : null);
                    // line 108
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context['k3'] = 2;
                    // line 109
                    echo "\t\t\t\t\t\t\t\t";
                } else {
                    // line 110
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context['k1'] = ((isset($context['page']) ? $context['page'] : null) - 3);
                    // line 111
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context['k2'] = ((isset($context['page']) ? $context['page'] : null) + 3);
                    // line 112
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context['k3'] = 3;
                    // line 113
                    echo "\t\t\t\t\t\t\t\t";
                }
                // line 114
                echo "\t\t\t\t\t\t\t";
            }
            // line 115
            echo "\t\t\t\t\t\t\t";
            if ((((isset($context['k3']) ? $context['k3'] : null) == 2) || ((isset($context['k3']) ? $context['k3'] : null) == 3))) {
                // line 116
                echo "\t\t\t\t\t\t\t\t\t<a href=\"/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['request']) ? $context['request'] : null), "modul", array(), "any", false, 116), "html");
                echo "/page-1/\" class=\"black-submit\">1</a>
\t\t\t\t\t\t\t\t\t...
\t\t\t\t\t\t\t";
            }
            // line 119
            echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
            // line 120
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range((isset($context['k1']) ? $context['k1'] : null), (isset($context['k2']) ? $context['k2'] : null)));
            foreach ($context['_seq'] as $context['_key'] => $context['i']) {
                // line 121
                echo "\t\t\t\t\t\t\t\t";
                if (((isset($context['page']) ? $context['page'] : null) == (isset($context['i']) ? $context['i'] : null))) {
                    // line 122
                    echo "\t\t\t\t\t\t\t\t\t<a href=\"javascript: void(0);\" class=\"black-submit active\">";
                    echo twig_escape_filter($this->env, (isset($context['i']) ? $context['i'] : null), "html");
                    echo "</a>
\t\t\t\t\t\t\t\t";
                } else {
                    // line 124
                    echo "\t\t\t\t\t\t\t\t\t<a href=\"/";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['request']) ? $context['request'] : null), "modul", array(), "any", false, 124), "html");
                    echo "/page-";
                    echo twig_escape_filter($this->env, (isset($context['i']) ? $context['i'] : null), "html");
                    echo "/\" class=\"black-submit\">";
                    echo twig_escape_filter($this->env, (isset($context['i']) ? $context['i'] : null), "html");
                    echo "</a>
\t\t\t\t\t\t\t\t";
                }
                // line 126
                echo "\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 127
            echo "
\t\t\t\t\t\t\t";
            // line 128
            if ((((isset($context['k3']) ? $context['k3'] : null) == 1) || ((isset($context['k3']) ? $context['k3'] : null) == 3))) {
                // line 129
                echo "\t\t\t\t\t\t\t\t\t...
\t\t\t\t\t\t\t\t\t<a href=\"/";
                // line 130
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['request']) ? $context['request'] : null), "modul", array(), "any", false, 130), "html");
                echo "/page-";
                echo twig_escape_filter($this->env, (isset($context['pages']) ? $context['pages'] : null), "html");
                echo "/\" class=\"black-submit\">";
                echo twig_escape_filter($this->env, (isset($context['pages']) ? $context['pages'] : null), "html");
                echo "</a>
\t\t\t\t\t\t\t";
            }
            // line 132
            echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
            // line 133
            if (((isset($context['page']) ? $context['page'] : null) == (isset($context['pages']) ? $context['pages'] : null))) {
                // line 134
                echo "\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
            } else {
                // line 136
                echo "\t\t\t\t\t\t\t\t\t<a href=\"/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['request']) ? $context['request'] : null), "modul", array(), "any", false, 136), "html");
                echo "/page-";
                echo twig_escape_filter($this->env, ((isset($context['page']) ? $context['page'] : null) + 1), "html");
                echo "/\" class=\"black-submit\">след</a>
\t\t\t\t\t\t\t";
            }
            // line 138
            echo "\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
        }
        // line 140
        echo "\t\t\t\t\t\t
\t\t\t\t\t\t<!-- <div class=\"pager\">
\t\t\t\t\t\t\t<a href=\"\" class=\"black-submit\">пред</a>
\t\t\t\t\t\t\t<a href=\"\" class=\"black-submit\">1</a>
\t\t\t\t\t\t\t<a href=\"\" class=\"black-submit\">2</a>
\t\t\t\t\t\t\t<a href=\"\" class=\"black-submit active\">3</a>
\t\t\t\t\t\t\t<a href=\"\" class=\"black-submit\">4</a>
\t\t\t\t\t\t\t<a href=\"\" class=\"black-submit\">5</a>
\t\t\t\t\t\t\t<a href=\"\" class=\"black-submit\">6</a>
\t\t\t\t\t\t\t<a href=\"\" class=\"black-submit\">7</a>
\t\t\t\t\t\t\t<a href=\"\" class=\"black-submit\">8</a>
\t\t\t\t\t\t\t<a href=\"\" class=\"black-submit\">след</a>
\t\t\t\t\t\t</div> -->
\t\t\t\t\t</div><!-- CENTER -->
\t
\t
\t\t\t\t<div id=\"subfooter-mini\"></div>\t
";
    }

    public function getTemplateName()
    {
        return "kino/main_newfilm.tpl";
    }
}
