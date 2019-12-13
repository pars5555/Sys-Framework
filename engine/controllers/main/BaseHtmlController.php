<?php

namespace controllers\main {

    abstract class BaseHtmlController extends \controllers\system\HtmlController {

        function __construct() {
            parent::__construct();
            $lang = Sys()->getCookieParam('lang', Sys()->getConfig('languages.default_language_code', 'en'));
            $this->addParam('settings', service('Settings'));
            $this->addParam('lang', $lang);
            $this->addJsInitParam('lang', $lang);
            $this->addJsProperty('lang', $lang);
            $this->initPageTitles();
            $user = sysservice('Auth')->getAuthUser();
            if (!empty($user)) {
                $userObj = $user->getObject();
                $this->addParam('userObject', $userObj);
            }
        }

        public function noAccess() {
            Sys()->redirect('');
        }

        private function initPageTitles() {
            $pageUrl = \system\Router::getInstance()->getRequestUri();
            if (empty($pageUrl)) {
                $pageUrl = 'sysdefault';
            }
            $pageTitle = service('PageTitle')->selectOneByField('url', $pageUrl);
            $pageKeywords = service('PageKeywords')->selectOneByField('url', $pageUrl);
            $pageDescription = service('PageDescription')->selectOneByField('url', $pageUrl);
            if (!empty($pageTitle)) {
                $this->addParam('page_title', $pageTitle->getTitle());
            }
            if (!empty($pageKeywords)) {
                $this->addParam('meta_page_keywords', $pageKeywords->getTitle());
            }
            if (!empty($pageDescription)) {
                $this->addParam('meta_page_description', $pageDescription->getTitle());
            }
        }

    }

}