<?php

/* base/main.tpl */
class __TwigTemplate_668f351d18d7cbed1837ef145b8ea30a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'wrapper' => array($this, 'block_wrapper'),
        );
    }

    public function display(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        $template = ((isset($context['TEMPLATE_PATH']) ? $context['TEMPLATE_PATH'] : null) . "blocks/header.tpl");
        if (!$template instanceof Twig_Template) {
            $template = $this->env->loadTemplate($template);
        }
        $template->display($context);
        // line 2
        echo "
<body>
\t<!-- PAGE -->
\t<div id=\"page\">
\t\t<div class=\"p-inner\">
\t\t\t<!-- HEADER -->
\t\t\t<div id=\"head\">
\t\t\t\t<!-- logo -->
\t\t\t\t<a href=\"/\" title=\"";
        // line 10
        echo twig_escape_filter($this->env, (isset($context['hostname']) ? $context['hostname'] : null), "html");
        echo "\" id=\"logo\" ><img src=\"/images/logo.png\" /></a>
\t\t\t\t
\t\t\t\t
\t\t\t\t<div id=\"social-top\" >\t
\t\t\t\t\t<a href=\"http://facebook.com\" target=\"_blank\">
\t\t\t\t\t\t<img src=\"/images/icon-facebook.gif\" alt=\"The Facebook\" />
\t\t\t\t\t</a>
\t\t\t\t\t<a href=\"http://twitter.com\" target=\"_blank\">
\t\t\t\t\t\t<img src=\"/images/icon-twitter.gif\" alt=\"Twitter\" />
\t\t\t\t\t</a>
\t\t\t\t\t<a href=\"mailto: info@onlite.ws\" target=\"_blank\">
\t\t\t\t\t\t<img src=\"/images/icon-mail.gif\" alt=\"\" />
\t\t\t\t\t</a>
\t\t\t\t</div>

\t\t\t\t";
        // line 25
        $template = ((isset($context['TEMPLATE_PATH']) ? $context['TEMPLATE_PATH'] : null) . "blocks/menu.tpl");
        if (!$template instanceof Twig_Template) {
            $template = $this->env->loadTemplate($template);
        }
        $template->display($context);
        // line 26
        echo "
\t\t\t</div><!-- HEADER -->
\t
\t\t\t<!-- CONTENT -->
\t\t\t<div id=\"content\">

\t
\t\t\t\t<!-- WRAPPER -->
\t\t\t\t<div id=\"wrapper\">
\t\t\t\t\t";
        // line 35
        $this->displayBlock('wrapper', $context, $blocks);
        // line 262
        echo "\t\t\t\t</div><!-- WRAPPER -->
\t
\t\t\t\t
\t
\t\t\t\t
\t\t\t
\t\t\t<!-- SUBFOOTER -->

\t\t\t\t<div id=\"subfooter\"></div>
\t\t\t</div><!-- CONTENT -->
\t\t
\t\t</div>
\t


<!-- FOOTER -->
\t\t";
        // line 278
        echo twig_escape_filter($this->env, $this->env->getExtension('project')->compileFunction($this->env, $this->getAttribute((isset($context['configs']) ? $context['configs'] : null), "footer", array(), "any", false, 278), $context), "html");
        echo "
\t</div><!-- PAGE -->

\t
</body>
</html>";
    }

    // line 35
    public function block_wrapper($context, array $blocks = array())
    {
        // line 36
        echo "\t\t\t\t\t";
        if ((isset($context['novinki']) ? $context['novinki'] : null)) {
            // line 37
            echo "\t\t\t\t\t<div id=\"new-films\" class=\"content-block\">
\t\t\t\t\t\t<div class=\"caption\">Новинки кино</div>
\t\t\t\t\t\t<table>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<div class=\"films-caption\">
\t\t\t\t\t\t\t\t\t\t";
            // line 43
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context['novinki']) ? $context['novinki'] : null));
            foreach ($context['_seq'] as $context['_key'] => $context['item']) {
                // line 44
                echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"item\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"left-zone\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"/";
                // line 46
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 46), "html");
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "url", array(), "any", false, 46), "html");
                echo ".html\"><img width=\"120\" src=\"/images/films/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 46), "html");
                echo "/mini_image.jpg\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "caption", array(), "any", false, 46), "html");
                echo "\" /></a>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 47
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t<script>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$(function(){  
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 50
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 51
                if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_read", array(), "any", false, 51)) {
                    // line 52
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#form_new";
                    // line 53
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 53), "html");
                    echo " :radio.star').rating(";
                    if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_count", array(), "any", false, 53)) {
                        echo "'select',";
                        echo twig_escape_filter($this->env, ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_count", array(), "any", false, 53) - 1), "html");
                    }
                    echo ");
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#form_new";
                    // line 54
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 54), "html");
                    echo " :radio.star').rating('readOnly',true);
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 55
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 57
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#form_new";
                    // line 58
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 58), "html");
                    echo " :radio.star').rating(";
                    if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_count", array(), "any", false, 58)) {
                        echo "'select',";
                        echo twig_escape_filter($this->env, ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_count", array(), "any", false, 58) - 1), "html");
                    }
                    echo ");
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#form_new";
                    // line 59
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 59), "html");
                    echo " :radio.star').rating('readOnly',false);
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 60
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 62
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$('.star-rating').live('click',function(){
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tvar form = \$(this).parent().parent();
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tform.find('input').rating('readOnly',true);
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\txajax_addStar(form.attr('rel'),form.find('input:checked').val());
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 71
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"raiting-star\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<form id=\"form_new";
                // line 73
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 73), "html");
                echo "\" rel=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 73), "html");
                echo "\" method=\"POST\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 74
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
                    // line 75
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 75), "html");
                    echo "\" value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['loop']) ? $context['loop'] : null), "index", array(), "any", false, 75), "html");
                    echo "\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
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
                // line 77
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<!-- <input name=\"star";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 77), "html");
                echo "\" value=\"1\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
                // line 78
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 78), "html");
                echo "\" value=\"2\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
                // line 79
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 79), "html");
                echo "\" value=\"3\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
                // line 80
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 80), "html");
                echo "\" value=\"4\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
                // line 81
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 81), "html");
                echo "\" value=\"5\" type=\"radio\" class=\"star\"/> -->
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"text\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"/";
                // line 86
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 86), "html");
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "url", array(), "any", false, 86), "html");
                echo ".html\" class=\"film-caption\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "caption", array(), "any", false, 86), "html");
                echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 87
                echo twig_escape_filter($this->env, $this->env->getExtension('project')->compileFunction($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "anonse", array(), "any", false, 87), $context), "html");
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 91
            echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t</table>
\t\t\t\t\t\t
\t\t\t\t\t</div>
\t\t\t\t\t";
        }
        // line 99
        echo "\t\t\t\t\t<!-- RIGHT -->
\t\t\t\t\t";
        // line 100
        $template = ((isset($context['TEMPLATE_PATH']) ? $context['TEMPLATE_PATH'] : null) . "blocks/rightblock.tpl");
        if (!$template instanceof Twig_Template) {
            $template = $this->env->loadTemplate($template);
        }
        $template->display($context);
        // line 101
        echo "\t\t\t\t\t<!-- RIGHT -->
\t\t\t\t\t
\t\t\t\t\t
\t\t\t\t\t<!-- CENTER -->
\t\t\t\t\t
\t\t\t\t\t<div id=\"center\" >
\t\t\t\t\t";
        // line 107
        if ((isset($context['populars']) ? $context['populars'] : null)) {
            // line 108
            echo "\t\t\t\t\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context['populars']) ? $context['populars'] : null));
            foreach ($context['_seq'] as $context['_key'] => $context['item']) {
                // line 109
                echo "\t\t\t\t\t\t<div class=\"film-item content-block\">
\t\t\t\t\t\t\t<table><tr>
\t\t\t\t\t\t\t\t<td class=\"left-film\" width=\"100%\" >
\t\t\t\t\t\t\t\t\t<div class=\"header\"><span class=\"date\" >";
                // line 112
                echo twig_escape_filter($this->env, $this->env->getExtension('project')->standartFunction("date", "d.m.Y", $this->getAttribute((isset($context['item']) ? $context['item'] : null), "date", array(), "any", false, 112)), "html");
                echo "</span><a href=\"/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 112), "html");
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "url", array(), "any", false, 112), "html");
                echo ".html\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "caption", array(), "any", false, 112), "html");
                echo "</a></div>
\t\t\t\t\t\t\t\t\t<p class=\"janr\" ><span><a href=\"/";
                // line 113
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 113), "html");
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "url", array(), "any", false, 113), "html");
                echo ".html#comment\" ><img src=\"/images/icon-comment.gif\" /> Ваш отзыв</a></span>
\t\t\t\t\t\t\t\t\t";
                // line 114
                if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "genres", array(), "any", false, 114)) {
                    // line 115
                    echo "\t\t\t\t\t\t\t\t\t\tЖанр фильма: 
\t\t\t\t\t\t\t\t\t\t";
                    // line 116
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context['item']) ? $context['item'] : null), "genres", array(), "any", false, 116));
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
                        // line 117
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                        if ($this->getAttribute((isset($context['loop']) ? $context['loop'] : null), "last", array(), "any", false, 117)) {
                            // line 118
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"/kino/genre-";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['g']) ? $context['g'] : null), "id_genre", array(), "any", false, 118), "html");
                            echo "/\">";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['g']) ? $context['g'] : null), "caption", array(), "any", false, 118), "html");
                            echo "</a>
\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 120
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"/kino/genre-";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['g']) ? $context['g'] : null), "id_genre", array(), "any", false, 120), "html");
                            echo "/\">";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['g']) ? $context['g'] : null), "caption", array(), "any", false, 120), "html");
                            echo "</a>,
\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 122
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
                    // line 123
                    echo "\t\t\t\t\t\t\t\t\t";
                }
                // line 124
                echo "\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t<strong>";
                // line 126
                if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "year", array(), "any", false, 126)) {
                    echo "Год выхода: ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "year", array(), "any", false, 126), "html");
                    echo "<br />";
                }
                // line 127
                echo "\t\t\t\t\t\t\t\t\t\t";
                if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "genre", array(), "any", false, 127)) {
                    echo "Жанр: ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "genre", array(), "any", false, 127), "html");
                    echo "<br />";
                }
                // line 128
                echo "\t\t\t\t\t\t\t\t\t\t";
                if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "country", array(), "any", false, 128)) {
                    echo "Выпущено: ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "country", array(), "any", false, 128), "html");
                }
                echo "</strong>
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t<p class=\"italic\">
\t\t\t\t\t\t\t\t\t\t";
                // line 131
                if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "director", array(), "any", false, 131)) {
                    echo "Режиссер: ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "director", array(), "any", false, 131), "html");
                    echo " <br />";
                }
                // line 132
                echo "\t\t\t\t\t\t\t\t\t\t";
                if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "v_rolyax", array(), "any", false, 132)) {
                    echo "В ролях: ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "v_rolyax", array(), "any", false, 132), "html");
                }
                // line 133
                echo "\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t<p class=\"about\" >
\t\t\t\t\t\t\t\t\t\t<strong>О фильме</strong>: ";
                // line 135
                echo twig_escape_filter($this->env, $this->env->getExtension('project')->compileFunction($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "anonse", array(), "any", false, 135), $context), "html");
                echo "
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t<a href=\"/";
                // line 137
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 137), "html");
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "url", array(), "any", false, 137), "html");
                echo ".html#view-online\" class=\"black-submit\" title=\"Смотреть онлайн\">СМОТРЕТЬ ОНЛАЙН</a>
\t\t\t\t\t\t\t\t\t<a href=\"/";
                // line 138
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 138), "html");
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "url", array(), "any", false, 138), "html");
                echo ".html#view-online\" class=\"orange-submit\" title=\"Скачать\" >СКАЧАТЬ</a>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t<td class=\"right-film\">
\t\t\t\t\t\t\t\t\t\t<a href=\"/";
                // line 141
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 141), "html");
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "url", array(), "any", false, 141), "html");
                echo ".html\">
\t\t\t\t\t\t\t\t\t\t\t<img src=\"/images/films/";
                // line 142
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 142), "html");
                echo "/mini_image.jpg\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "caption", array(), "any", false, 142), "html");
                echo "\" />
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t";
                // line 144
                echo "
\t\t\t\t\t\t\t\t\t\t<script>
\t\t\t\t\t\t\t\t\t\t\t\$(function(){  
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 147
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 148
                if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_read", array(), "any", false, 148)) {
                    // line 149
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#form_popular";
                    // line 150
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 150), "html");
                    echo " :radio.star').rating(";
                    if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_count", array(), "any", false, 150)) {
                        echo "'select',";
                        echo twig_escape_filter($this->env, ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_count", array(), "any", false, 150) - 1), "html");
                    }
                    echo ");
\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#form_popular";
                    // line 151
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 151), "html");
                    echo " :radio.star').rating('readOnly',true);
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 152
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 154
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#form_popular";
                    // line 155
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 155), "html");
                    echo " :radio.star').rating(";
                    if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_count", array(), "any", false, 155)) {
                        echo "'select',";
                        echo twig_escape_filter($this->env, ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_count", array(), "any", false, 155) - 1), "html");
                    }
                    echo ");
\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#form_popular";
                    // line 156
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 156), "html");
                    echo " :radio.star').rating('readOnly',false);
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 157
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 159
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
                // line 168
                echo "
\t\t\t\t\t\t\t\t\t\t<div class=\"raiting-star\">
\t\t\t\t\t\t\t\t\t\t\t<form id=\"form_popular";
                // line 170
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 170), "html");
                echo "\" rel=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 170), "html");
                echo "\" method=\"POST\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 171
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
                    // line 172
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 172), "html");
                    echo "\" value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['loop']) ? $context['loop'] : null), "index", array(), "any", false, 172), "html");
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
                // line 174
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<!-- <input name=\"star";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 174), "html");
                echo "\" value=\"1\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
                // line 175
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 175), "html");
                echo "\" value=\"2\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
                // line 176
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 176), "html");
                echo "\" value=\"3\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
                // line 177
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 177), "html");
                echo "\" value=\"4\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
                // line 178
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 178), "html");
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
            // line 185
            echo "\t\t\t\t\t";
        }
        // line 186
        echo "\t\t\t\t\t\t
\t\t\t\t\t</div><!-- CENTER -->
\t\t\t\t\t
\t
\t\t\t\t<div id=\"subfooter-mini\"></div>
\t";
        // line 191
        if ((isset($context['lastfilms']) ? $context['lastfilms'] : null)) {
            // line 192
            echo "\t<div id=\"last-films\" class=\"content-block\">
\t\t\t\t\t\t<div class=\"caption\">Недавно добавленные</div>
\t\t\t\t\t\t<table>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<div class=\"films-caption\">
\t\t\t\t\t\t\t\t\t\t";
            // line 199
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context['lastfilms']) ? $context['lastfilms'] : null));
            foreach ($context['_seq'] as $context['_key'] => $context['item']) {
                // line 200
                echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"item\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"left-zone\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 202
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 202), "html");
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "url", array(), "any", false, 202), "html");
                echo ".html\"><img width=\"120\" src=\"/images/films/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 202), "html");
                echo "/mini_image.jpg\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "caption", array(), "any", false, 202), "html");
                echo "\" /></a>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 203
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t<script>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$(function(){  
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 206
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 207
                if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_read", array(), "any", false, 207)) {
                    // line 208
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#last-films .raiting-star #form_new";
                    // line 209
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 209), "html");
                    echo " :radio.star').rating(";
                    if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_count", array(), "any", false, 209)) {
                        echo "'select',";
                        echo twig_escape_filter($this->env, ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_count", array(), "any", false, 209) - 1), "html");
                    }
                    echo ");
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#last-films .raiting-star #form_new";
                    // line 210
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 210), "html");
                    echo " :radio.star').rating('readOnly',true);
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 211
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 213
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#last-films .raiting-star #form_new";
                    // line 214
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 214), "html");
                    echo " :radio.star').rating(";
                    if ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_count", array(), "any", false, 214)) {
                        echo "'select',";
                        echo twig_escape_filter($this->env, ($this->getAttribute((isset($context['item']) ? $context['item'] : null), "star_count", array(), "any", false, 214) - 1), "html");
                    }
                    echo ");
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#last-films .raiting-star #form_new";
                    // line 215
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 215), "html");
                    echo " :radio.star').rating('readOnly',false);
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 216
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 218
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$('.star-rating').live('click',function(){
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tvar form = \$(this).parent().parent();
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tform.find('input').rating('readOnly',true);
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\txajax_addStar(form.attr('rel'),form.find('input:checked').val());
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 227
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"raiting-star\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<form id=\"form_new";
                // line 229
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 229), "html");
                echo "\" rel=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 229), "html");
                echo "\" method=\"POST\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 230
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
                    // line 231
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 231), "html");
                    echo "\" value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['loop']) ? $context['loop'] : null), "index", array(), "any", false, 231), "html");
                    echo "\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
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
                // line 233
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<!-- <input name=\"star";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 233), "html");
                echo "\" value=\"1\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
                // line 234
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 234), "html");
                echo "\" value=\"2\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
                // line 235
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 235), "html");
                echo "\" value=\"3\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
                // line 236
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 236), "html");
                echo "\" value=\"4\" type=\"radio\" class=\"star\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input name=\"star";
                // line 237
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 237), "html");
                echo "\" value=\"5\" type=\"radio\" class=\"star\"/> -->
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"text\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"/";
                // line 242
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "id", array(), "any", false, 242), "html");
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "url", array(), "any", false, 242), "html");
                echo ".html\" class=\"film-caption\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "caption", array(), "any", false, 242), "html");
                echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 243
                echo twig_escape_filter($this->env, $this->env->getExtension('project')->compileFunction($this->env, $this->getAttribute((isset($context['item']) ? $context['item'] : null), "anonse", array(), "any", false, 243), $context), "html");
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 247
            echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t</table>
\t\t\t\t\t\t
\t\t\t\t\t</div>
\t";
        }
        // line 255
        echo "\t\t\t\t
\t<div id=\"bot-content\" class=\"content-block\">
\t\t<h1>";
        // line 257
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['modul']) ? $context['modul'] : null), "caption", array(), "any", false, 257), "html");
        echo "</h1>
\t\t";
        // line 258
        echo twig_escape_filter($this->env, $this->env->getExtension('project')->compileFunction($this->env, $this->getAttribute((isset($context['modul']) ? $context['modul'] : null), "text", array(), "any", false, 258), $context), "html");
        echo " 
\t</div>
\t
\t\t\t\t";
    }

    public function getTemplateName()
    {
        return "base/main.tpl";
    }
}
