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

        public function validate($model) {
            $modelAccessGroups = $model->getAccessGroups();
            if (empty($modelAccessGroups)) {
                return true;
            }
            $authUser = AuthController::getInstance()->getAuthUser();
            $authUser->validate();
            $userGroups = $authUser->getGroups();
            $validated = !empty(array_intersect($userGroups, $modelAccessGroups));
            if (!$validated) {
                \system\SysExceptions::noAccessModel($model);
            }
        }

    }

}
