<?php

namespace controllers\main {

    class Home extends BaseHtmlController {

        public function init() {
            $this->addParam('included_in_index', $this->getTemplateFullPath());
        }

        public function getTemplatePath() {
            return "main/home.tpl";
        }

        public function getAccessGroups() {
            return [];
        }


    }

}