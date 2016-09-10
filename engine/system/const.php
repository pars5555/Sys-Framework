<?php

define('SITE_PATH', '//' . $_SERVER["HTTP_HOST"]);
define('PROJECT_ROOT', dirname(dirname(dirname(__FILE__))));
define('ENGINE_DIR', PROJECT_ROOT . DIRECTORY_SEPARATOR . 'engine');
define('LOG_DIR', PROJECT_ROOT . DIRECTORY_SEPARATOR . 'log');
define('MODELS_DIR', ENGINE_DIR . DIRECTORY_SEPARATOR . 'models');
define('SYSTEM_DIR', ENGINE_DIR . DIRECTORY_SEPARATOR . 'system');
define('BUILDERS_DIR', SYSTEM_DIR . DIRECTORY_SEPARATOR . 'builders');
define('VIEWS_DIR', PROJECT_ROOT . DIRECTORY_SEPARATOR . 'views');
define('PUBLIC_DIR', PROJECT_ROOT . DIRECTORY_SEPARATOR . 'public');
define('PUBLIC_OUT_DIR', PUBLIC_DIR . DIRECTORY_SEPARATOR . 'out');
define('CSS_DIR', PUBLIC_DIR . DIRECTORY_SEPARATOR . 'css');
define('JS_DIR', PUBLIC_DIR . DIRECTORY_SEPARATOR . 'js');

define('CONFIG_FILE', ENGINE_DIR . DIRECTORY_SEPARATOR . 'config/config.json');
define('ROUTING_FILE', ENGINE_DIR . DIRECTORY_SEPARATOR . 'config/routing.json');
define('DYNAMIC_ROUTE_PREFIX', '_sys_');
define('ROUTING_REGEX_START_CHAR', '{');
define('ROUTING_REGEX_END_CHAR', '}');

define('ALL_JS_FILE', 'all.js');
define('ALL_CSS_FILE', 'all.css');
define('PUBLIC_OUT_JS_FILE', PUBLIC_OUT_DIR . '/' . ALL_JS_FILE);
define('PUBLIC_OUT_CSS_FILE', PUBLIC_OUT_DIR . '/' . ALL_CSS_FILE);

