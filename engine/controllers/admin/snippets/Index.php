<?php

namespace controllers\admin\snippets {

    class Index extends \controllers\admin\AdminHtmlController {

        public function init() {
            $this->addParam('included_in_index', $this->getTemplateFullPath());
            $namespaces = service('Snippet')->getAllNamespaces();
            $this->addParam('namespaces', $namespaces);
        }

        public function getTemplatePath() {
            return "admin/snippets/index.tpl";
        }

        public function getAccessGroups() {
            return [];
        }

        public function getInvolvedControllersClasses() {
            return ['\controllers\admin\snippets\Content'];
        }

    }

}