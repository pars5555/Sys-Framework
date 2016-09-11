<?php

namespace models\subdomain1 {

    class Index extends \models\system\HtmlModel {

        public function init() {
            $this->addParam('index', 'subdomain index');
        }

        public function getTemplatePath() {
            return VIEWS_DIR . "/main/index.tpl";
        }

    }

}