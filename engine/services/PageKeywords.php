<?php

namespace services {

    class PageKeywords extends \system\services\Mysql {

        public function getTableName() {
            return "page_keywords";
        }

        public function getNewEntity() {
            return new \entities\PageKeywords();
        }

        public function deleteByUrls($urls) {
            foreach ($urls as $url) {
                $this->deleteByField('url', $url);
            }
        }

        public function addUrls($urls) {
            foreach ($urls as $url) {
                $row = new \entities\PageTitle();
                $row->setUrl($url);
                $this->insert($row);
            }
        }

        public function getAllPagesUrls() {
            $ret = [];
            $rows = $this->selectAll();
            foreach ($rows as $row) {
                $ret [] = $row->getUrl();
            }
            return $ret;
        }

    }

}