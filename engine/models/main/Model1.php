<?php

namespace models\main {

    class Model1 extends \models\system\HtmlModel {

        public function init() {
            new \system\security\users\User1();
            $this->addParam('model1', 'main Model1');
        }

        public function getTemplatePath() {
            return VIEWS_DIR . "/main/view1.tpl";
        }
        
    }

}