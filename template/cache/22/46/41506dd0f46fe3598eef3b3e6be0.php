<?php

/* kino/main_genre.tpl */
class __TwigTemplate_224641506dd0f46fe3598eef3b3e6be0 extends Twig_Template
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
\t\t\t\t\t\t<h1>Кино по жанру \"";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['name_genre']) ? $context['name_genre'] : null), "caption", array(), "any", false, 11), "html");
        echo "\"</h1>
\t\t\t\t\t\t";
        // line 12
        if ((isset($context['items']) ? $context['items'] : null)) {
            // line 13
            echo "\t\t\t\t\t\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context['items']) ? $context['items'] : null));
            foreach ($context['_seq'] as $context['_key'] => $context['item']) {
                // line 14
                echo "\t\t\t\t\t\t\t<div class=\"film-item content-block\">
\t\t\t\t\t\t\t\t<table><tr>
\t\t\t\t\t\t\t\t\t<td class=\"left-film\" width=\"100%\" >
\t\t\t\t\t\t\t\t\t\t<div class=\"header\"><span class=\"date\" >";
                // line 17
                echo twig_escape_filter($this->env, $this->env->getExtension('project')->standartFunction("date", "d.m.Y", $this->getAttribute((isset($context['item']) ? $context['item'] : null), "date", array(), "any", false, 17)), "html");
                echo "</span><a href=\"/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 17), "html");
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "url", array(), "any", false, 17), "html");
                echo ".html\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "caption", array(), "any", false, 17), "html");
                echo "</a></div>
\t\t\t\t\t\t\t\t\t\t<p class=\"janr\" ><span><a href=\"/";
                // line 18
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 18), "html");
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "url", array(), "any", false, 18), "html");
                echo ".html#comment\" ><img src=\"/images/icon-comment.gif\" /> Ваш отзыв</a></span>
\t\t\t\t\t\t\t\t\t\t";
                // line 19
                if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "genres", array(), "any", false, 19)) {
                    // line 20
                    echo "\t\t\t\t\t\t\t\t\t\t\tЖанр фильма: 
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 21
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context['item']) ? $context['item'] : null), "genres", array(), "any", false, 21));
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
                        // line 22
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                        if ($this->getAttribute((isset($context['loop']) ? $context['loop'] : null), "last", array(), "any", false, 22)) {
                            // line 23
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"/kino/genre-";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['g']) ? $context['g'] : null), "id_genre", array(), "any", false, 23), "html");
                            echo "/\">";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['g']) ? $context['g'] : null), "caption", array(), "any", false, 23), "html");
                            echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 25
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"/kino/genre-";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['g']) ? $context['g'] : null), "id_genre", array(), "any", false, 25), "html");
                            echo "/\">";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['g']) ? $context['g'] : null), "caption", array(), "any", false, 25), "html");
                            echo "</a>,
\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 27
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
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
                    // line 28
                    echo "\t\t\t\t\t\t\t\t\t\t";
                }
                // line 29
                echo "\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t<strong>";
                // line 31
                if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "year", array(), "any", false, 31)) {
                    echo "Год выхода: ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "year", array(), "any", false, 31), "html");
                    echo "<br />";
                }
                // line 32
                echo "\t\t\t\t\t\t\t\t\t\t\t";
                if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "genre", array(), "any", false, 32)) {
                    echo "Жанр: ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "genre", array(), "any", false, 32), "html");
                    echo "<br />";
                }
                // line 33
                echo "\t\t\t\t\t\t\t\t\t\t\t";
                if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "country", array(), "any", false, 33)) {
                    echo "Выпущено: ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "country", array(), "any", false, 33), "html");
                }
                echo "</strong>
\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t<p class=\"italic\">
\t\t\t\t\t\t\t\t\t\t\t";
                // line 36
                if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "director", array(), "any", false, 36)) {
                    echo "Режиссер: ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "director", array(), "any", false, 36), "html");
                    echo " <br />";
                }
                // line 37
                echo "\t\t\t\t\t\t\t\t\t\t\t";
                if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "v_rolyax", array(), "any", false, 37)) {
                    echo "В ролях: ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "v_rolyax", array(), "any", false, 37), "html");
                }
                // line 38
                echo "\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t<p class=\"about\" >
\t\t\t\t\t\t\t\t\t\t\t<strong>О фильме</strong>: ";
                // line 40
                echo twig_escape_filter($this->env, $this->env->getExtension('project')->compileFunction($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "anonse", array(), "any", false, 40), $context), "html");
                echo "
\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t<a href=\"/";
                // line 42
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 42), "html");
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "url", array(), "any", false, 42), "html");
                echo ".html#view-online\" class=\"black-submit\" title=\"Смотреть онлайн\">СМОТРЕТЬ ОНЛАЙН</a>
\t\t\t\t\t\t\t\t\t\t<a href=\"/";
                // line 43
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 43), "html");
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "url", array(), "any", false, 43), "html");
                echo ".html#view-online\" class=\"orange-submit\" title=\"Скачать\" >СКАЧАТЬ</a>
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td class=\"right-film\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"/";
                // line 46
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 46), "html");
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "url", array(), "any", false, 46), "html");
                echo ".html\">
\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"/images/films/";
                // line 47
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 47), "html");
                echo "/mini_image.jpg\" alt=\"\" />
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t";
                // line 49
                echo "
\t\t\t\t\t\t\t\t\t\t\t<script>
\t\t\t\t\t\t\t\t\t\t\t\t\$(function(){  
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 52
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 53
                if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_read", array(), "any", false, 53)) {
                    // line 54
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#form";
                    // line 55
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 55), "html");
                    echo " :radio.star').rating(";
                    if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_count", array(), "any", false, 55)) {
                        echo "'select',";
                        echo twig_escape_filter($this->env, ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_count", array(), "any", false, 55) - 1), "html");
                    }
                    echo ");
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#form";
                    // line 56
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 56), "html");
                    echo " :radio.star').rating('readOnly',true);
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 57
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 59
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#form";
                    // line 60
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 60), "html");
                    echo " :radio.star').rating(";
                    if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_count", array(), "any", false, 60)) {
                        echo "'select',";
                        echo twig_escape_filter($this->env, ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_count", array(), "any", false, 60) - 1), "html");
                    }
                    echo ");
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#form";
                    // line 61
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 61), "html");
                    echo " :radio.star').rating('readOnly',false);
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 62
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 64
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\$('.star-rating').live('click',function(){
\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\tvar form = \$(this).parent().parent();
\t\t\t\t\t\t\t\t\t\t\t\t\t\tform.find('input').rating('readOnly',true);
\t\t\t\t\t\t\t\t\t\t\t\t\t\txajax_addStar(form.attr('rel'),form.find('input:checked').val());
\t\t\t\t\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t\t\t\t\t\t";
                // line 73
                echo "
\t\t\t\t\t\t\t\t\t\t\t<div class=\"raiting-star\">
\t\t\t\t\t\t\t\t\t\t\t\t<form id=\"form";
                // line 75
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 75), "html");
                echo "\" rel=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 75), "html");
                echo "\" method=\"POST\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 76
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
                    // line 77
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 77), "html");
                    echo "\" value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['loop']) ? $context['loop'] : null), "index", array(), "any", false, 77), "html");
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
                // line 79
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<!-- <input name=\"star";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 79), "html");
                echo "\" value=\"1\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
                // line 80
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 80), "html");
                echo "\" value=\"2\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
                // line 81
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 81), "html");
                echo "\" value=\"3\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
                // line 82
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 82), "html");
                echo "\" value=\"4\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
                // line 83
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 83), "html");
                echo "\" value=\"5\" type=\"radio\" class=\"star\"/> -->
\t\t\t\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr></table>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 90
            echo "\t\t\t\t\t\t";
        } else {
            // line 91
            echo "\t\t\t\t\t\t\t<center><h2>По данному жанру нет ниодного фильма</h2></center>
\t\t\t\t\t\t";
        }
        // line 93
        echo "\t\t\t\t\t\t
\t\t\t\t\t\t";
        // line 94
        if (((isset($context['pages']) ? $context['pages'] : null) > 1)) {
            // line 95
            echo "\t\t\t\t\t\t\t<div class=\"pager\">
\t\t\t\t\t\t\t";
            // line 96
            if (((isset($context['page']) ? $context['page'] : null) == 1)) {
                // line 97
                echo "\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
            } else {
                // line 99
                echo "\t\t\t\t\t\t\t\t\t<a href=\"/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['request']) ? $context['request'] : null), "modul", array(), "any", false, 99), "html");
                echo "/page-";
                echo twig_escape_filter($this->env, ((isset($context['page']) ? $context['page'] : null) - 1), "html");
                echo "/\" class=\"black-submit\">пред</a>
\t\t\t\t\t\t\t";
            }
            // line 101
            echo "\t\t\t\t\t\t\t";
            if (((isset($context['pages']) ? $context['pages'] : null) <= 10)) {
                // line 102
                echo "\t\t\t\t\t\t\t\t";
                $context['k1'] = 1;
                // line 103
                echo "\t\t\t\t\t\t\t\t";
                $context['k2'] = (isset($context['pages']) ? $context['pages'] : null);
                // line 104
                echo "\t\t\t\t\t\t\t";
            } else {
                // line 105
                echo "\t\t\t\t\t\t\t\t";
                if ((((isset($context['page']) ? $context['page'] : null) > 0) && ((isset($context['page']) ? $context['page'] : null) <= 7))) {
                    // line 106
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context['k1'] = 1;
                    // line 107
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context['k2'] = 9;
                    // line 108
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context['k3'] = 1;
                    // line 109
                    echo "\t\t\t\t\t\t\t\t";
                } elseif ((((isset($context['page']) ? $context['page'] : null) <= (isset($context['pages']) ? $context['pages'] : null)) && ((isset($context['page']) ? $context['page'] : null) >= ((isset($context['pages']) ? $context['pages'] : null) - 7)))) {
                    // line 110
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context['k1'] = ((isset($context['pages']) ? $context['pages'] : null) - 9);
                    // line 111
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context['k2'] = (isset($context['pages']) ? $context['pages'] : null);
                    // line 112
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context['k3'] = 2;
                    // line 113
                    echo "\t\t\t\t\t\t\t\t";
                } else {
                    // line 114
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context['k1'] = ((isset($context['page']) ? $context['page'] : null) - 3);
                    // line 115
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context['k2'] = ((isset($context['page']) ? $context['page'] : null) + 3);
                    // line 116
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context['k3'] = 3;
                    // line 117
                    echo "\t\t\t\t\t\t\t\t";
                }
                // line 118
                echo "\t\t\t\t\t\t\t";
            }
            // line 119
            echo "\t\t\t\t\t\t\t";
            if ((((isset($context['k3']) ? $context['k3'] : null) == 2) || ((isset($context['k3']) ? $context['k3'] : null) == 3))) {
                // line 120
                echo "\t\t\t\t\t\t\t\t\t<a href=\"/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['request']) ? $context['request'] : null), "modul", array(), "any", false, 120), "html");
                echo "/page-1/\" class=\"black-submit\">1</a>
\t\t\t\t\t\t\t\t\t...
\t\t\t\t\t\t\t";
            }
            // line 123
            echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
            // line 124
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range((isset($context['k1']) ? $context['k1'] : null), (isset($context['k2']) ? $context['k2'] : null)));
            foreach ($context['_seq'] as $context['_key'] => $context['i']) {
                // line 125
                echo "\t\t\t\t\t\t\t\t";
                if (((isset($context['page']) ? $context['page'] : null) == (isset($context['i']) ? $context['i'] : null))) {
                    // line 126
                    echo "\t\t\t\t\t\t\t\t\t<a href=\"javascript: void(0);\" class=\"black-submit active\">";
                    echo twig_escape_filter($this->env, (isset($context['i']) ? $context['i'] : null), "html");
                    echo "</a>
\t\t\t\t\t\t\t\t";
                } else {
                    // line 128
                    echo "\t\t\t\t\t\t\t\t\t<a href=\"/";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['request']) ? $context['request'] : null), "modul", array(), "any", false, 128), "html");
                    echo "/page-";
                    echo twig_escape_filter($this->env, (isset($context['i']) ? $context['i'] : null), "html");
                    echo "/\" class=\"black-submit\">";
                    echo twig_escape_filter($this->env, (isset($context['i']) ? $context['i'] : null), "html");
                    echo "</a>
\t\t\t\t\t\t\t\t";
                }
                // line 130
                echo "\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 131
            echo "
\t\t\t\t\t\t\t";
            // line 132
            if ((((isset($context['k3']) ? $context['k3'] : null) == 1) || ((isset($context['k3']) ? $context['k3'] : null) == 3))) {
                // line 133
                echo "\t\t\t\t\t\t\t\t\t...
\t\t\t\t\t\t\t\t\t<a href=\"/";
                // line 134
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['request']) ? $context['request'] : null), "modul", array(), "any", false, 134), "html");
                echo "/page-";
                echo twig_escape_filter($this->env, (isset($context['pages']) ? $context['pages'] : null), "html");
                echo "/\" class=\"black-submit\">";
                echo twig_escape_filter($this->env, (isset($context['pages']) ? $context['pages'] : null), "html");
                echo "</a>
\t\t\t\t\t\t\t";
            }
            // line 136
            echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
            // line 137
            if (((isset($context['page']) ? $context['page'] : null) == (isset($context['pages']) ? $context['pages'] : null))) {
                // line 138
                echo "\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
            } else {
                // line 140
                echo "\t\t\t\t\t\t\t\t\t<a href=\"/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['request']) ? $context['request'] : null), "modul", array(), "any", false, 140), "html");
                echo "/page-";
                echo twig_escape_filter($this->env, ((isset($context['page']) ? $context['page'] : null) + 1), "html");
                echo "/\" class=\"black-submit\">след</a>
\t\t\t\t\t\t\t";
            }
            // line 142
            echo "\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
        }
        // line 144
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
        return "kino/main_genre.tpl";
    }
}
