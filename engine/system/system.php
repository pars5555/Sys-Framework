<?php

require_once 'const.php';
require_once 'exceptions.php';
require_once("../vendor/autoload.php");

class System {

    private static $instance = null;
    private $config;

    private function __construct() {
        $this->autoIncludeNamespaceUses();
        $this->config = json_decode(file_get_contents(CONFIG_FILE), true);
        $this->routing = json_decode(file_get_contents(ROUTING_FILE), true);
        require_once CONSTANTS_FILE;
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new System();
        }
        return self::$instance;
    }

    public function init() {
        system\Router::getInstance();
    }

    function getRootDir() {
        return PROJECT_ROOT;
    }

    public function getConfig($name, $default = null) {
        if (isset($this->config[$name])) {
            return $this->config[$name];
        }
        return $default;
    }

    public function getRoutings() {
        return $this->routing;
    }

    public function isDevelopmentMode() {
        $env = $this->getEnvironment();
        return substr($env, 0, 3) === 'dev';
    }

    public function isProductionMode() {
        $env = $this->getEnvironment();
        return substr($env, 0, 3) !== 'dev';
    }

    public function getEnvironment() {
        return $this->config['ENVIRONMENT'];
    }

    public function getSubDomain() {
        return SUB_DOMAIN;
    }

    public function getVersion() {
        return $this->config['VERSION'];
    }

    public function isAjaxRequest() {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return true;
        }
        return false;
    }

    public function request($key = null, $default = null, $filter = FILTER_DEFAULT) {
        if (isset($key)) {
            return \system\Request::getInstance()->request($key, $default, $filter);
        }
        return \system\Request::getInstance();
    }
    
    private function autoIncludeNamespaceUses() {
        spl_autoload_register(function ($use) {
            $filePath = realpath(ENGINE_DIR . '/' . $use . '.php');
            if (file_exists($filePath)) {
                require_once($filePath);
            } else {
                \system\SysExceptions::fileNotFound($filePath);
            }
        });
    }

}

function Sys() {
    return System::getInstance();
}

Sys()->init();
