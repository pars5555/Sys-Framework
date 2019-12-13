<?php

namespace controllers\admin\page_keywords {

    class Index extends \controllers\admin\AdminHtmlController {

        public function init() {
            $this->addParam('included_in_index', $this->getTemplateFullPath());
            $mainRoutings = json_decode(file_get_contents(MAIN_ROUTING_FILE), true);
            $filterRoutUrlsThatContainerIsIndex = $this->filterRoutUrlsThatContainerIsIndex($mainRoutings);
            
            $existingUrlsInTable = service('PageKeywords')->getAllPagesUrls();
            $missingUrlsInTable = array_diff($filterRoutUrlsThatContainerIsIndex, $existingUrlsInTable);
            $obsoleteUrlsInTable = array_diff($existingUrlsInTable, $filterRoutUrlsThatContainerIsIndex);
            service('PageKeywords')->addUrls($missingUrlsInTable);
            service('PageKeywords')->deleteByUrls($obsoleteUrlsInTable);
            $rows = service('PageKeywords')->selectAll();

            $this->addParam('rows', $rows);
        }

        public function getTemplatePath() {
            return "admin/page_keywords/index.tpl";
        }

        public function getAccessGroups() {
            return [];
        }

        private function filterRoutUrlsThatContainerIsIndex($routings) {
            $ret = [];
            foreach ($routings as $key => $routing) {
                if ($routing['controller'] == 'Index') {
                    $ret [] = $key;
                }
            }
            return $ret;
        }

    }

}