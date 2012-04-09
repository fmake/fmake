<?php
/**
 * полный путь до корневой папки
 */
define('ROOT', realpath(dirname(__FILE__).'/../..'));
/**
 * полный путь до папки с основными модулями
 */
define('FROOT', realpath(dirname(__FILE__).'/../..').'/fmake');
/**
 * лог sql запросов в файл
 */
define('SQL_LOG', true);
/**
 * относительный путь до шаблонов
 */
define('TEMPLATE', '/template');
/**
 * папка шаблонов администратора до шаблонов
 */
define('TEMPLATE_ADM_FOLDER', '/admin');
/**
 * относительный путь до шаблонов
 */
define('TEMPLATE_ADM', TEMPLATE.TEMPLATE_ADM_FOLDER);
/**
 * относительный путь до кеша
 */
define('CACHE', '/template/cache');
/**
 * режим защиты от инъекций
 */
define('REQUEST_SAFETY', false);