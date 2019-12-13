<?php

namespace controllers\admin\snippets {

    class Content extends \controllers\admin\AdminHtmlController {

        public function init() {
            $this->addParam('content', $this->getTemplateFullPath());
            $selectedNamespace = Sys()->request('namespace');
            if (empty($selectedNamespace)) {
                $namespaces = $this->getParentController()->getParam('namespaces');
                $selectedNamespace = isset($namespaces [0])?$namespaces [0]:0;
            }
            $this->addParam('selectedNamespace', $selectedNamespace);
            $snippets = service('Snippet')->getNamespaceSnippets($selectedNamespace);
            $this->addParam('snippets', $snippets);
        }

        public function getTemplatePath() {
            return "admin/snippets/content.tpl";
        }

        public function getAccessGroups() {
            return [];
        }

    }

}