<?php

namespace system\connectors {

    use ngs\framework\exceptions\DebugException;

    class MySql extends \PDO {

        private static $instance = NULL;

        public function __construct($db_host, $db_user, $db_pass, $db_name) {
            parent::__construct('mysql:dbname=' . $db_name . ';host=' . $db_host . ';charset=utf8', $db_user, $db_pass);
            $this->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            $this->setAttribute(\PDO::ATTR_STRINGIFY_FETCHES, false);
            $this->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->setAttribute(\PDO::ATTR_STATEMENT_CLASS, array('\ngs\framework\dal\connectors\DBStatement'));
        }

        public static function getInstance($db_host, $db_user, $db_pass, $db_name) {
            if (is_null(self::$instance)) {
                self::$instance = new MySql($db_host, $db_user, $db_pass, $db_name);
            }
            return self::$instance;
        }

        public function prepare($statement, $driver_options = array()) {
            try {
                return parent::prepare($statement, $driver_options);
            } catch (\PDOException $ex) {
                throw new DebugException($ex->getMessage(), $ex->getCode());
            }
        }

        public function execute($bound_input_params = NULL) {
            try {
                return parent::execute($bound_input_params);
            } catch (\PDOException $ex) {
                throw new DebugException($ex->getMessage(), $ex->getCode());
            }
        }

    }

}
