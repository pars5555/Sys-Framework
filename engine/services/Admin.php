<?php

namespace services {

    class Admin extends \system\services\Mysql {

        public function getTableName() {
            return 'admins';
        }

        public function getNewEntity() {
            return new \entities\Admin();
        }

        public function login($email, $password) {
            $row = $this->selectOneByField('email', $email);
            if (empty($row)) {
                return false;
            }
            if ($row->getPassword() === $password) {
                return $row->getId();
            }
            return false;
        }

    }

}
