<?php

namespace system {

    class Request {

        private static $instance;

        private function __construct() {
            
        }

        public static function getInstance() {
            if (self::$instance == null) {
                self::$instance = new Request();
            }
            return self::$instance;
        }

        public function request($key, $default = null, $filter = FILTER_DEFAULT) {
            $ret = filter_input(INPUT_REQUEST, $key, $filter);
            if ($ret === null) {
                return $default;
            }
            return $ret;
            
        }
        public function get($key, $default = null, $filter = FILTER_DEFAULT) {
            $ret = filter_input(INPUT_GET, $key, $filter);
            if ($ret === null) {
                return $default;
            }
            return $ret;
        }

        public function post($key, $default = null, $filter = FILTER_DEFAULT) {
            $ret = filter_input(INPUT_POST, $key, $filter);
            if ($ret === null) {
                return $default;
            }
            return $ret;
        }

        public function cookie($key, $default = null, $filter = FILTER_DEFAULT) {
            $ret = filter_input(INPUT_COOKIE, $key, $filter);
            if ($ret === null) {
                return $default;
            }
            return $ret;
        }
        
        public function session($key, $default = null, $filter = FILTER_DEFAULT) {
            $ret = filter_input(INPUT_SESSION, $key, $filter);
            if ($ret === null) {
                return $default;
            }
            return $ret;
        }
        
        public function input() {
            if (isset($this->input))
            {
                return $this->input;
            }
            $this->input = file_get_contents('php://input');
            
        }
        
        public function inputJson($assoc = false) {
            return json_decode($this->input(), $assoc);
        }

    }

}
    