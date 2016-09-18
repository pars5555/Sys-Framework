<?php

namespace system\controllers {

    class AuthController {

        private static $instance = null;

        private function __construct() {
            
        }

        public static function getInstance() {
            if (self::$instance == null) {
                self::$instance = new AuthController();
            }
            return self::$instance;
        }
        
        public function getAuthUser()
        {
            $loginConf = Sys()->getConfig("login");
            if ($loginConf['type'] === 'cookie') {
                \system\Request::getInstance()->cookie($loginConf['params']['user_type']);
            } else {
                \system\Request::getInstance()->session($loginConf['params']['user_type']);
            }
            
            \system\Session::getInstance();
        }

    }

}
