<?php

namespace models\system {

    abstract class HtmlModel extends SysModel {

        private $smarty;
        private $params = [];
        private $involvedModels = [];

        public function addParam($key, $value) {
            $this->params[$key] = $value;
        }

        public function setInvolvedModels($models) {
            $this->involvedModels = $models;
        }

        private function getAllModelAndInvolvedModelsNamesArray($model = null) {
            if (!isset($model)) {
                $model = $this;
            }
            $ret = [$model->getModelName()];
            foreach ($model->involvedModels as $m) {
                $ret = array_merge($ret, $this->getAllModelAndInvolvedModelsNamesArray($m));
            }
            return $ret;
        }

        private function addAllParamsToSmarty($model = null) {
            if (!isset($model)) {
                $model = $this;
            }
            foreach ($model->params as $key => $value) {
                $this->smarty->assign($key, $value);
            }
            foreach ($model->involvedModels as $m) {
                $this->addAllParamsToSmarty($m);
            }
        }

        public function draw() {
            $this->smarty = new \Smarty();
            $this->smarty->setTemplateDir(VIEWS_DIR);
            $this->smarty->setCompileDir(VIEWS_DIR . '/cache');
            $this->smarty->compile_check = true;
            $this->smarty->assign("SITE_PATH", SITE_PATH);
            $this->smarty->assign("VIEWS_DIR", VIEWS_DIR);
            $this->smarty->registerFilter("output", [$this, 'customHeader']);
            $this->addAllParamsToSmarty();
            http_response_code(200);
            $this->smarty->display($this->getTemplatePath());
        }

        public abstract function getTemplatePath();

        public function customHeader($tpl_output, $template) {
            var_dump($this->getAllModelAndInvolvedModelsNamesArray());
            exit;
            $jsString = '<meta name="generator" content="Pars Framework ' . Sys()->getVersion() . '" />';
            $jsString .= '<script type="text/javascript">';
            $jsString .= 'docReady(function() {Sys.ready();});';
            $jsString .= '</script>';
            $jsString .= '</head>';
            $tpl_output = str_replace('</head>', $jsString, $tpl_output);
            if (Sys()->getEnvironment() == "production") {
                $tpl_output = preg_replace('![\t ]*[\r]+[\t ]*!', '', $tpl_output);
            }
            return $tpl_output;
        }

        public function getModelName() {
            return get_class($this);
        }

    }

}