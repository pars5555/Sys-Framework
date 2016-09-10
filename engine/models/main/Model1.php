<?php

namespace models\main {

    class Model1 extends \models\system\HtmlModel {

        public function init() {
            $this->addParam('model1', 444);
        }

        public function getTemplatePath() {
            return VIEWS_DIR . "/main/view1.tpl";
        }
        
        public function getCssFiles() {
            return VIEWS_DIR . "/main/view1.tpl";
        }

    }

}