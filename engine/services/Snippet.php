<?php

namespace services {


    use system\services\Mysql;

    class Snippet extends Mysql {

        private $snippetsCache;

        function __construct() {
            parent::__construct();
            $this->snippetsCache = [];
        }

        public function getTableName() {
            return "snippets";
        }

        public function getNewEntity() {
            return new \entities\Snippet();
        }

        public function getAllNamespaces() {
            $rows = $this->selectAdvance('namespace', [], ['namespace']);
            $ret = [];
            foreach ($rows as $row) {
                $ret[] = $row->getNamespace();
            }
            return $ret;
        }

        public function getNamespaceSnippets($namespace, $oneLang = False) {
            $rows = $this->selectByField('namespace', $namespace);
            $ret = [];
            foreach ($rows as $row) {
                if ($oneLang) {
                    $ret [$row->getName()] = $this->get($row->getNamespace(), $row->getName());
                } else {
                    $ret [$row->getName()] = $row;
                }
            }
            return $ret;
        }

        public function getCapitalize($name, $languageCode = null, $cache = true) {
            $snippet = $this->get($name, $languageCode, $cache);
            return mb_convert_case(mb_strtolower($snippet), MB_CASE_TITLE, "UTF-8");
        }

        public function getUcfirst($name, $languageCode = null, $cache = true) {
            $snippet = $this->get($name, $languageCode, $cache);
            return mb_ucfirst($snippet);
        }

        public function get($namespace, $name, $returnEmptyIfEmpty = false, $languageCode = null) {
            $name = trim($name);
            $namespace = trim($namespace, "\t\n\r\0\x0B/");
            if (!isset($languageCode)) {
                $languageCode = LANG;
            }
            if (!isset($this->snippetsCache[$namespace]) || !isset($this->snippetsCache[$namespace][$name])) {
                $rows = $this->selectByField('namespace', $namespace);
                foreach ($rows as $row) {
                    $this->snippetsCache[$namespace][$row->getName()]['en'] = $row->getEn();
                    $this->snippetsCache[$namespace][$row->getName()]['ru'] = $row->getRu();
                    $this->snippetsCache[$namespace][$row->getName()]['hy'] = $row->getHy();
                }
            }
            if (isset($this->snippetsCache[$namespace]) && isset($this->snippetsCache[$namespace][$name])) {
                if (!empty($this->snippetsCache[$namespace][$name][$languageCode])) {
                    return $this->snippetsCache[$namespace][$name][$languageCode];
                }
                if ($returnEmptyIfEmpty) {
                    return "";
                }
                $ret = $this->snippetsCache[$namespace][$name]['en'];
                return !empty($ret) ? $ret : $name;
            } else {
                $sn = new \entities\Snippet();
                $sn->setNamespace($namespace);
                $sn->setName($name);
                $this->insert($sn);
                return $name;
            }
        }

    }

}