<?php

namespace controllers\main {

    class Index extends BaseHtmlController {

        public function init() {
            $this->addJsProperty('js_messages', service('Snippet')->getNamespaceSnippets('js_messages', true));
        }

        public function getTemplatePath() {
            return "main/index.tpl";
        }

        public function getAccessGroups() {
            return [];
        }

        public function getInvolvedControllersClasses() {
            return [];
        }

    }

}