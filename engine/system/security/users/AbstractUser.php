<?php

namespace system\security\users {

    abstract class AbstractUser {

        public abstract function validate();

        public abstract function login($id, $updateHash = true);

        public abstract function getObject();

        public function logout() {
            $this->setHash('');
            $this->setId('');
            $this->setType('');
            return true;
        }

        public function setHash($hash, $domain = null, $loginConfig = []) {
            if (empty($loginConfig)) {
                $paramName = Sys()->getConfig("login.params.user_hash");
            } else {
                $paramName = $loginConfig['params']['user_hash'];
            }
            $this->setParam($paramName, $hash, $domain);
        }

        public function setId($id, $domain = null, $loginConfig = []) {
            if (empty($loginConfig)) {
                $paramName = Sys()->getConfig("login.params.user_id");
            } else {
                $paramName = $loginConfig['params']['user_id'];
            }
            $this->setParam($paramName, $id, $domain);
        }

        public function setType($domain = null, $loginConfig = []) {
            if (empty($loginConfig)) {
                $paramName = Sys()->getConfig("login.params.user_type");
            } else {
                $paramName = $loginConfig['params']['user_type'];
            }
            $this->setParam($paramName, md5(get_class($this)), $domain);
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

        protected function setParam($name, $value, $domain = null, $loginConfig = []) {
            if (empty($loginConfig)) {
                $loginConfig = Sys()->getConfig("login");
            }
            if ($loginConfig['type'] === 'cookie') {
                $this->setCookieParam($name, $value, $domain);
            } else {
                $this->setSessionParam($name, $value);
            }
        }

        public function getParam($name) {
            $loginParams = Sys()->getConfig("login");
            if ($loginParams['type'] === 'cookie') {
                return \system\Request::getInstance()->cookie($name);
            } else {
                return \system\Request::getInstance()->session($name);
            }
        }

        abstract public function getGroups();

        private function setSessionParam($name, $value) {
            \system\Session::getInstance()->setSessionParam($name, $value);
        }

        private function setCookieParam($name, $value, $domain = null) {
            $loginParams = Sys()->getConfig("login");
            if (is_null($domain)) {
                if (isset($loginParams['domain']) && in_array($loginParams['domain'], ['all', '*'])) {
                    $domain = '.' . DOMAIN;
                }
                if (isset($loginParams['domain']) && in_array($loginParams['domain'], ['current', 'subdomain'])) {
                    $domain = SUB_DOMAIN . '.' . DOMAIN;
                }
            }
            if (empty($domain)) {
                $domain = null;
            }
            $expire_minutes = 43200; // 30 days
            if (isset($loginParams['expire_minutes'])) {
                $expire_minutes = intval($loginParams['expire_minutes']);
            }
            \system\Session::getInstance()->setCookieParam($name, $value, time() + 60 * intval($expire_minutes), $domain);
        }

    }

}
