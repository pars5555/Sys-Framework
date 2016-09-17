<?php

namespace system\security\users {

    abstract class AbstractUser {

        protected $id;
        protected $hash;

        public function __construct() {
            $this->setParam('type', md5(get_class($this)));
        }

        public function setHash($hash) {
            $this->setParam("hash", $hash);
        }

        public function setId($id) {
            $this->setParam("id", $id);
        }

        public function getHash() {
            return $this->getParam("hash");
        }

        public function getId() {
            return $this->getParam("id");
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
            \system\Session::getInstance()->setCookieParam($name, $value, time() + 60 * 60 * 24 * 30, '/', $domain);
        }

    }

}
