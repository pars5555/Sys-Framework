<?php

namespace models\main {

    class Model2 extends \models\system\HtmlModel {

        public function init() {
            $this->addParam('model2', 444);
        }

        public function getTemplatePath() {
            return VIEWS_DIR . "/main/view2.tpl";
        }

    }

}