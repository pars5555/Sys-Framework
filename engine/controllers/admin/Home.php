<?php

namespace controllers\admin {


    class Home extends AdminHtmlController {

        public function init() {
            $this->addParam('included_in_index', $this->getTemplateFullPath());
        }

        public function getTemplatePath() {
            return "admin/home.tpl";
        }

        public function getAccessGroups() {
            return ['admin'];
        }

    }

}