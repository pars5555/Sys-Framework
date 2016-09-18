<?php

namespace models\system\install {

    class Index extends \models\system\HtmlModel {

        public function init() {
        }


        public function getTemplatePath() {
            return VIEWS_DIR . "/system/install/index.tpl";
        }

    }

}