<?php

namespace controllers\system {

    abstract class JsonController extends SysController {

        private $params = [];

        public function addParam($key, $value) {
            $this->params[$key] = $value;
        }

        public function addParams($params) {
            $this->params = array_merge($this->params, $params);
        }

        public function draw() {
            header('Content-Type: application/json');
            $httpResponseCode = $this->getException()->getCode();
            http_response_code($httpResponseCode);
            if ($httpResponseCode !== 200) {
                if (Sys()->isDevelopmentMode()) {
                    $this->params['sys_error_msg'] = $this->getException()->getMessage() . "\r\n" . $this->getException()->getTraceAsString();
                } else {
                    $this->params['sys_error_msg'] = $this->getException()->getMessage();
                }
                $this->params['sys_error_code'] = $httpResponseCode;
            }
            echo json_encode($this->params) . "\r\n";
        }

    }

}