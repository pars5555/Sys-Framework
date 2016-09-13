<?php

namespace system\connectors {

    class MySql extends \PDO {

        private static $instance = NULL;

        public function __construct($db_host, $db_user, $db_pass, $db_name) {
            parent::__construct('mysql:dbname=' . $db_name . ';host=' . $db_host . ';charset=utf8', $db_user, $db_pass);
            $this->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            $this->setAttribute(\PDO::ATTR_STRINGIFY_FETCHES, false);
            $this->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        public static function getInstance($db_host, $db_user, $db_pass, $db_name) {
            if (is_null(self::$instance)) {
                self::$instance = new MySql($db_host, $db_user, $db_pass, $db_name);
            }
            return self::$instance;
        }

    }

}
