<?php

namespace models\main {

    class Index extends \models\system\HtmlModel {

        public function init() {
            $this->addParam('index', 'main index');
        }

        public function getTemplatePath() {
            return VIEWS_DIR . "/main/index.tpl";
        }

        public function getAccessGroups() {
            return [];
        }

        public function getInvolvedModelsClasses() {
            return [Model2];
            
        }

    }

}