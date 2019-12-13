<?php

namespace controllers\admin {

    class Index extends AdminHtmlController {

        public function init() {
           
        }

        public function getTemplatePath() {
            return "admin/index.tpl";
        }

        public function getAccessGroups() {
            return ['admin'];
        }

        public function getInvolvedControllersClasses() {
            return [];
        }

    }

}