<?php

namespace models\main {

    class Model2 extends \models\system\HtmlModel {

        public function init() {
            $this->addParam('model1', 'main Model2');
        }

        public function getTemplatePath() {
            return VIEWS_DIR . "/main/view2.tpl";
        }

        public function getAccessGroups() {
            return ['group1'];
        }

    }

}