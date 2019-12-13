<?php

namespace services {


    use system\services\Mysql;

    class Settings extends Mysql {

        private $settingsCache;

        function __construct() {
            parent::__construct();
            $this->settingsCache = [];
            $this->getAllSettings();
        }

        public function getTableName() {
            return "settings";
        }

        public function getNewEntity() {
            return new \entities\Settings();
        }

        public function setValue($var, $value) {
            $this->updateAdvance(['var', '=', "'$var'"], ['value'=>$value]);
        }
        
        public function getValue($var, $trim = false, $fromCache = true) {
            if ($fromCache) {
                $ret = $this->settingsMapCache[$var];
            } else {
                $ret = $this->selectOneByField('var', $var, 'value');
            }
            if ($trim) {
                return trim($ret);
            }
            return $ret;
        }

        public function getAllSettings($forceUpdate = false) {
            if (empty($this->settingsCache) || $forceUpdate) {
                $this->settingsCache = $this->selectAll();
                foreach ($this->settingsCache as $row) {
                    $this->settingsMapCache[$row->getVar()] = $row->getValue();
                }
            }
            return $this->settingsCache;
        }

    }

}