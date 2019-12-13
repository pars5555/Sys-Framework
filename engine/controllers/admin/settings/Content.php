<?php

namespace controllers\admin\settings {

    class Content extends \controllers\admin\AdminHtmlController {

        public function init() {
            $this->addParam('content', $this->getTemplateFullPath());
            $settings = service('Settings')->getAllSettings();
            $this->addParam('settings', $settings);
        }

        public function getTemplatePath() {
            return "admin/settings/content.tpl";
        }

        public function getAccessGroups() {
            return [];
        }

    }

}