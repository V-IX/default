<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['base_url'] = 'http://default.loc/';
$config['index_page'] = '';
$config['uri_protocol']	= 'REQUEST_URI';
$config['url_suffix'] = '';
$config['language']	= 'russian';
$config['charset'] = 'UTF-8';
$config['enable_hooks'] = FALSE;

$uri = isset($_SERVER['REQUEST_URI']) ? explode('/', $_SERVER['REQUEST_URI']) : '';
$config['subclass_prefix'] = (array_key_exists(1, $uri) and $uri[1] == 'admin') ? 'ADMIN_' : 'SITE_';

$config['composer_autoload'] = FALSE;
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';

$config['allow_get_array'] = TRUE;
$config['enable_query_strings'] = FALSE;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';
$config['directory_trigger'] = 'd';

$config['log_threshold'] = 0;
$config['log_path'] = '';
$config['log_file_extension'] = '';
$config['log_file_permissions'] = 0644;
$config['log_date_format'] = 'Y-m-d H:i:s';


$config['error_views_path'] = '';

$config['cache_path'] = '';
$config['cache_query_string'] = FALSE;

$config['encryption_key'] = '1234qwerasdfzxcv';


$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'ci_session';
$config['sess_expiration'] = 7200;
$config['sess_save_path'] = NULL;
$config['sess_match_ip'] = FALSE;
$config['sess_time_to_update'] = 300;
$config['sess_regenerate_destroy'] = FALSE;

$config['cookie_prefix']	= '';
$config['cookie_domain']	= '';
$config['cookie_path']		= '/';
$config['cookie_secure']	= FALSE;
$config['cookie_httponly'] 	= FALSE;

$config['standardize_newlines'] = FALSE;

$config['global_xss_filtering'] = FALSE;

$config['csrf_protection'] = TRUE;
$config['csrf_token_name'] = 'csrf_test_name';
$config['csrf_cookie_name'] = 'csrf_cookie_name';
$config['csrf_expire'] = 7200;
$config['csrf_regenerate'] = FALSE;
$config['csrf_exclude_uris'] = [
	'admin/files/upload',
	'login/social'
];

$config['compress_output'] = FALSE;

$config['time_reference'] = 'local';

$config['rewrite_short_tags'] = FALSE;

$config['proxy_ips'] = '';

/*
| -------------------------------------------------------------------
| CMS INFO
| -------------------------------------------------------------------
|
|
*/

$config['cms_title'] = 'V-IX.CMS';
$config['cms_version'] = '2.5';

$config['cms_copyright'] = '2013-'.date('Y').' &copy; Разработка сайта <a href="http://narisuemvse.by" target="_blank">Narisuemvse.by</a>';
$config['cms_developer_email'] = 'narisuemvse@mail.ru';