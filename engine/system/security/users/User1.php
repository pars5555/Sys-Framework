<?php

namespace system\security\users {

    use controllers\UserController;
    use system\util\Util;

    class User1 extends AbstractUser {

        public function login($userId) {
            $hash = Util::generateHash();
            $this->setHash($hash);
            $this->setId($userId);
            UserController::getInstance()->updateField($userId, 'hash', $hash);
            return false;
        }

        public function validate() {
            $id = intval($this->getId());
            $hash = intval($this->getHash());
            $user = UserController::getInstance()->selectAdvanceOne(['id', '=', $id, 'AND', 'hash', '=', "'" . $hash . "'"]);
            return !empty($user);
        }

        public function getGroups() {
            return ['group1', 'group2'];
        }

    }

}
