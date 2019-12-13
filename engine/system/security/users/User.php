<?php

namespace system\security\users {

    use system\util\Util;

    class User extends AbstractUser {

        public function login($userId, $updateHash = true, $domain = null, $loginConfig = []) {
            if ($updateHash) {
                $hash = Util::generateHash();
                $this->setHash($hash, $domain, $loginConfig);
                $this->setId($userId, $domain, $loginConfig);
                $this->setType($domain, $loginConfig);
                service('User')->updateFieldById($userId, 'hash', $hash);
            } else {
                $hash = service('User')->selectById($userId, 'hash');
                $this->setHash($hash, $domain, $loginConfig);
                $this->setId($userId, $domain, $loginConfig);
                $this->setType($domain, $loginConfig);
            }
            return true;
        }

        public function validate() {
            $id = intval($this->getId());
            $hash = $this->getHash();
            if (empty($id) || empty($hash)) {
                return false;
            }
            $user = service('User')->selectAdvanceOne(['id', '=', $id, 'AND', 'hash', '=', "'" . $hash . "'"]);
            return !empty($user);
        }

        public function getGroups() {
            return ['User'];
        }

        public function getObject() {
            if ($this->getId() > 0) {
                return service('User')->selectById($this->getId());
            }
            return null;
        }

    }

}
