<?php

define('HOST', $_SERVER["HTTP_HOST"]);
define('SITE_PATH', '//' . HOST);
$__host_names = explode(".", HOST);
$bottom_host_name = $__host_names [count($__host_names )-2] . "." . $__host_names [count($__host_names )-1];
define('DOMAIN', $bottom_host_name);
define('SUB_DOMAIN', implode('.',array_slice($__host_names ,0 ,-2)));
define('SUB_DOMAIN_DIR_FILE_NAME', empty(SUB_DOMAIN) || SUB_DOMAIN == 'www'?'main':SUB_DOMAIN);
define('PROJECT_ROOT', dirname(dirname(dirname(__FILE__))));
define('ENGINE_DIR', PROJECT_ROOT . DIRECTORY_SEPARATOR . 'engine');
define('LOG_DIR', PROJECT_ROOT . DIRECTORY_SEPARATOR . 'log');
define('MODELS_DIR', ENGINE_DIR . DIRECTORY_SEPARATOR . 'models');
define('SYSTEM_DIR', ENGINE_DIR . DIRECTORY_SEPARATOR . 'system');
define('BUILDERS_DIR', SYSTEM_DIR . DIRECTORY_SEPARATOR . 'builders');
define('SECURITY_DIR', SYSTEM_DIR . DIRECTORY_SEPARATOR . 'security');
define('SECURITY_USERS_DIR', SECURITY_DIR . DIRECTORY_SEPARATOR . 'users');
define('VIEWS_DIR', PROJECT_ROOT . DIRECTORY_SEPARATOR . 'views');
define('PUBLIC_DIR', PROJECT_ROOT . DIRECTORY_SEPARATOR . 'public');
define('PUBLIC_OUT_DIR', PUBLIC_DIR . DIRECTORY_SEPARATOR . 'out');
define('CSS_DIR', PUBLIC_DIR . DIRECTORY_SEPARATOR . 'css'.DIRECTORY_SEPARATOR. SUB_DOMAIN_DIR_FILE_NAME);
define('JS_DIR', PUBLIC_DIR . DIRECTORY_SEPARATOR . 'js'.DIRECTORY_SEPARATOR. SUB_DOMAIN_DIR_FILE_NAME);
define('JS_COMMON_DIR', PUBLIC_DIR . DIRECTORY_SEPARATOR . 'js'.DIRECTORY_SEPARATOR. 'common');

define('CONFIG_FILE', ENGINE_DIR . DIRECTORY_SEPARATOR . 'config/'.SUB_DOMAIN_DIR_FILE_NAME.'.json');
define('ROUTING_FILE', ENGINE_DIR . DIRECTORY_SEPARATOR . 'routing/'.SUB_DOMAIN_DIR_FILE_NAME.'.json');
define('CONSTANTS_FILE', ENGINE_DIR . DIRECTORY_SEPARATOR . 'constants/'.SUB_DOMAIN_DIR_FILE_NAME.'.php');
define('DYNAMIC_ROUTE_PREFIX', '_sys_');
define('ROUTING_REGEX_START_CHAR', '{');
define('ROUTING_REGEX_END_CHAR', '}');

define('ALL_JS_FILE', SUB_DOMAIN_DIR_FILE_NAME. '/all.js');
define('ALL_CSS_FILE', SUB_DOMAIN_DIR_FILE_NAME. '/all.css');
define('PUBLIC_OUT_JS_FILE', PUBLIC_OUT_DIR . DIRECTORY_SEPARATOR . ALL_JS_FILE);
define('PUBLIC_OUT_CSS_FILE', PUBLIC_OUT_DIR . DIRECTORY_SEPARATOR .ALL_CSS_FILE);