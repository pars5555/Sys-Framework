<?php

namespace controllers\admin\actions {

    use controllers\system\JsonController;

    class Login extends JsonController {

        public function init() {
            $email = Sys()->request('email');
            $password = Sys()->request('password');
            $adminId = service('Admin')->login($email, $password);
            if ($adminId) {
                $adminUser = new \system\security\users\Admin();
                $adminUser->login($adminId);
                Sys()->redirect("");
            }
            Sys()->redirect("login");
        }

    }

}