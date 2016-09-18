<?php

namespace system\security\users {

    abstract class AbstractUser {

        public function __construct() {
            $loginConf = Sys()->getConfig("login");
            $this->setParam($loginConf['params']['user_type'], md5(get_class($this)));
        }

        public function setHash($hash) {
            $loginConf = Sys()->getConfig("login");
            $this->setParam($loginConf['params']['user_hash'], $hash);
        }

        public function setId($id) {
            $loginConf = Sys()->getConfig("login");
            $this->setParam($loginConf['params']['user_id'], $id);
        }

        public function getHash() {
            $loginConf = Sys()->getConfig("login");
            return $this->getParam($loginConf['params']['user_hash']);
        }

        public function getId() {
            $loginConf = Sys()->getConfig("login");
            return $this->getParam($loginConf['params']['user_id']);
        }
        
        public function getType() {
            $loginConf = Sys()->getConfig("login");
            return $this->getParam($loginConf['params']['user_type']);
        }

        protected function setParam($name, $value) {
            $loginParams = Sys()->getConfig("login");
            if ($loginParams['type'] === 'cookie') {
                $this->setCookieParam($name, $value);
            } else {
                $this->setSessionParam($name, $value);
            }
        }

        public function getParam($name) {
            $loginParams = Sys()->getConfig("login");
            if ($loginParams['type'] === 'cookie') {
                \system\Request::getInstance()->cookie($name);
            } else {
                \system\Request::getInstance()->session($name);
            }
        }

        private function setSessionParam($name, $value) {
            \system\Session::getInstance()->setSessionParam($name, $value);
        }

        private function setCookieParam($name, $value) {
            //var_dump(\system\Request::getInstance()->cookie('type'));
            $loginParams = Sys()->getConfig("login");
            $domain = DOMAIN;
            if (isset($loginParams['domain']) && in_array($loginParams['domain'], ['all', '*'])) {
                $domain = '.' . $domain;
            }
            \system\Session::getInstance()->setCookieParam($name, $value, time() + 60 * 60 * 24 * 30, $domain);
        }

    }

}
