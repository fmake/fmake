<?php

/* <center><a href="http://movie.909.su/search.php?search={caption}&userid=1304&subid=47&play=1" target="_blank" rel="nofollow"><strong><span style="font-size: medium; text-decoration: underline; color:red;">Нажмите, чтобы смотреть фильм "{caption}" онлайн</span></strong></a><br><br>
<a href="http://movie.909.su/search.php?search={caption}&userid=1304&subid=47" target="_blank" rel="nofollow"><strong><span style="font-size: medium; text-decoration: underline; color:red;">Нажмите, чтобы быстро скачать фильм "{caption}"</span></strong></a></center> */
class __TwigTemplate_76536b3330f637457294bcc41c5f7299 extends Twig_Template
{
    public function display(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<center><a href=\"http://movie.909.su/search.php?search=";
        echo twig_escape_filter($this->env, (isset($context['caption']) ? $context['caption'] : null), "html");
        echo "&userid=1304&subid=47&play=1\" target=\"_blank\" rel=\"nofollow\"><strong><span style=\"font-size: medium; text-decoration: underline; color:red;\">Нажмите, чтобы смотреть фильм \"";
        echo twig_escape_filter($this->env, (isset($context['caption']) ? $context['caption'] : null), "html");
        echo "\" онлайн</span></strong></a><br><br>
<a href=\"http://movie.909.su/search.php?search=";
        // line 2
        echo twig_escape_filter($this->env, (isset($context['caption']) ? $context['caption'] : null), "html");
        echo "&userid=1304&subid=47\" target=\"_blank\" rel=\"nofollow\"><strong><span style=\"font-size: medium; text-decoration: underline; color:red;\">Нажмите, чтобы быстро скачать фильм \"";
        echo twig_escape_filter($this->env, (isset($context['caption']) ? $context['caption'] : null), "html");
        echo "\"</span></strong></a></center>";
    }

    public function getTemplateName()
    {
        return "<center><a href=\"http://movie.909.su/search.php?search={caption}&userid=1304&subid=47&play=1\" target=\"_blank\" rel=\"nofollow\"><strong><span style=\"font-size: medium; text-decoration: underline; color:red;\">Нажмите, чтобы смотреть фильм \"{caption}\" онлайн</span></strong></a><br><br>
<a href=\"http://movie.909.su/search.php?search={caption}&userid=1304&subid=47\" target=\"_blank\" rel=\"nofollow\"><strong><span style=\"font-size: medium; text-decoration: underline; color:red;\">Нажмите, чтобы быстро скачать фильм \"{caption}\"</span></strong></a></center>";
    }
}
