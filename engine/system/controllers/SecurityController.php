<?php

namespace system\controllers {

    class SecurityController {

        private static $instance = null;

        private function __construct() {
            
        }

        public static function getInstance() {
            if (self::$instance == null) {
                self::$instance = new SecurityController();
            }
            return self::$instance;
        }
        
        public function validate($model)
        {
            $groupNames = $model->getAccessGroups();
            
        }

    }

}
