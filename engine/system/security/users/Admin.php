<?php

namespace system\security\users {

    use system\util\Util;

    class Admin extends AbstractUser {

        public function login($userId, $updateHash = true) {
            $hash = Util::generateHash();
            $this->setHash($hash);
            $this->setId($userId);
            $this->setType();
            service('Admin')->updateFieldById($userId, 'hash', $hash);
            return true;
        }

        public function validate() {
            $id = intval($this->getId());
            $hash = $this->getHash();
            if (empty($id) || empty($hash)) {
                return false;
            }
            $user = service('Admin')->selectAdvanceOne(['id', '=', $id, 'AND', 'hash', '=', "'" . $hash . "'"]);
            return !empty($user);
        }

        public function getGroups() {
            return ['admin'];
        }

        public function getObject() {
            if ($this->getId() > 0) {
                return service('Admin')->selectById($this->getId());
            }
            return null;
        }

    }

}
