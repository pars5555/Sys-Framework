<?php

namespace controllers {

    class UserController extends \system\controllers\MysqlController {

        private static $instance = null;

        public static function getInstance() {
            if (is_null(self::$instance)) {
                self::$instance = new UserController();
            }
            return self::$instance;
        }

        public function getTableName() {
            return 'users';
        }

        public function createRecordInstance() {
            return new \records\User(); 
        }

    }

}
