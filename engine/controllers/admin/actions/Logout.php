<?php

namespace controllers\admin\actions {

    use controllers\system\JsonController;

    class Logout extends JsonController {

        public function init() {
            sysservice('Auth')->logout();
            Sys()->redirect("login");
        }

    }

}