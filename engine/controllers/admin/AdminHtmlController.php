<?php

namespace controllers\admin {

    abstract class AdminHtmlController extends \controllers\system\HtmlController {

        public function noAccess() {
            Sys()->redirect('login');
        }

        public function getAccessGroups() {
            return ['admin'];
        }

    }

}