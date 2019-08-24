<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['cap'] = 'home/cap';

$route['articles/index'] = 'articles/index';
$route['articles/(:num)'] = 'articles/index/$2';
$route['articles/(:any)'] = 'articles/view/$2';

$route['news/index'] = 'news/index';
$route['news/(:num)'] = 'news/index/$3';
$route['news/(:any)'] = 'news/view/$2';

$route['reviews/ajaxSend'] = 'reviews/ajaxSend';
$route['reviews/index'] = 'reviews/index';
$route['reviews/(:num)'] = 'reviews/index/$2';

$route['about/index'] = 'about/index';
$route['about/(:any)'] = 'about/pages';

/* 404 */

$__admin = false;
$uri = isset($_SERVER['REQUEST_URI']) ? explode('/', $_SERVER['REQUEST_URI']) : '';
if(array_key_exists(1, $uri) and $uri[1] == 'admin') $__admin = true;

$route['404_override'] = $__admin === false ? 'errors/index' : 'home/errors';