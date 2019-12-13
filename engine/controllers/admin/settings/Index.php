<?php

namespace controllers\admin\settings {

    class Index extends \controllers\admin\AdminHtmlController {

        public function init() {
            $this->addParam('included_in_index', $this->getTemplateFullPath());
            
        }

        public function getTemplatePath() {
            return "admin/settings/index.tpl";
        }

        public function getAccessGroups() {
            return [];
        }

        public function getInvolvedControllersClasses() {
            return ['\controllers\admin\settings\Content'];
        }


    }

}