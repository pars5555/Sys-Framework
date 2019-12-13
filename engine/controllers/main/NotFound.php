<?php

namespace controllers\main {

    class NotFound extends BaseHtmlController {

        public function init() {
            
        }

        public function getTemplatePath() {
            return "main/not_found.tpl";
        }

        public function getAccessGroups() {
            return [];
        }

    }

}