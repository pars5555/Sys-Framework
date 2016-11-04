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

        public function getAuthUser() {
            $loginConf = Sys()->getConfig("login");
            $typeMd5 = "";
            if ($loginConf['type'] === 'cookie') {
                $typeMd5 = \system\Request::getInstance()->cookie($loginConf['params']['user_type']);
                $userHash = \system\Request::getInstance()->cookie($loginConf['params']['user_hash']);
                $userId = \system\Request::getInstance()->cookie($loginConf['params']['user_id']);
            } else {
                $typeMd5 = \system\Request::getInstance()->session($loginConf['params']['user_type']);
                $userHash = \system\Request::getInstance()->session($loginConf['params']['user_hash']);
                $userId = \system\Request::getInstance()->session($loginConf['params']['user_id']);
            }
            if ($typeMd5) {

                $user = $this->findUserObjectByTypeMd5($typeMd5);
                $user->setHash($userHash);
                $user->setId($userId);
                return $user;
            }
            return null;
        }

        private function findUserObjectByTypeMd5($typeMd5) {
            $userTypeFiles = \system\util\Util::getDirectoryFiles(SECURITY_USERS_DIR, 'php', true);
            foreach ($userTypeFiles as $fileName) {
                $classFullName = trim('system\\security\\users\\' . $fileName, '.php');
                if ($typeMd5 === md5($classFullName)) {
                    return new $classFullName();
                }
            }
            return false;
        }

    }

}
