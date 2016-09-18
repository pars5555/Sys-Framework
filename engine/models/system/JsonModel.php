<?php

namespace models\system {

    abstract class JsonModel extends SysModel {

        private $params = [];

        public function addParam($key, $value) {
            $this->params[$key] = $value;
        }


    }

}