<?php

namespace entities {

    class PageKeywords extends \system\entities\SysEntity {

        public $id;
        public $url;
        public $en;
        public $hy;
        public $ru;

        function getTitle($defLang = 'en') {
            $code = LANG;
            return $this->$code;
        }

    }

}
