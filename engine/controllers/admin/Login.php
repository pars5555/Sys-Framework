<?php

namespace controllers\admin {

    use controllers\system\HtmlController;

    class Login extends HtmlController {

        public function init() {
            
        }

        public function getTemplatePath() {
            return "admin/login.tpl";
        }

        public function getAccessGroups() {
            return [];
        }

    }

}