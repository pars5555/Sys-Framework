<?php

namespace system\connectors {

    class MySql extends \PDO {

        public function __construct($db_host, $db_user, $db_pass, $db_name) {
            parent::__construct('mysql:dbname=' . $db_name . ';host=' . $db_host . ';charset=utf8', $db_user, $db_pass);
            $this->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            $this->setAttribute(\PDO::ATTR_STRINGIFY_FETCHES, false);
            $this->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

    }

}
