<?php

namespace models\system {

    abstract class HtmlModel extends SysModel {

        private $smarty;
        private $smartyParams = [];
        private $jsonParams = [];

        public function addParam($key, $value) {
            $this->smartyParams[$key] = $value;
        }

        public function addJsonParam($key, $value) {
            $this->jsonParams[$key] = $value;
        }

        private function getJsAllModelAndInvolvedModelsArray($model = null) {
            if (!isset($model)) {
                $model = $this;
            }
            $modelName = $model->getModelName();
            $JsModelName = str_replace('\\', '.', trim(substr($modelName, strpos($modelName, '\\', strpos($modelName, '\\') + 1)), '\\'));
            $ret = [['name' => $JsModelName, 'params' => $model->jsonParams]];
            foreach ($model->getInvolvedModels() as $m) {
                $ret = array_merge($ret, $this->getJsAllModelAndInvolvedModelsArray($m));
            }
            return $ret;
        }

        private function addAllParamsToSmarty($model = null) {
            if (!isset($model)) {
                $model = $this;
            }
            foreach ($model->smartyParams as $key => $value) {
                $this->smarty->assign($key, $value);
            }
            foreach ($model->getInvolvedModels() as $m) {
                $this->addAllParamsToSmarty($m);
            }
        }

        public function drawJSON($html) {
            header('Content-Type: application/json; charset=utf-8');
            http_response_code(200);
            echo json_encode(['html' => $html]);
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
            if (Sys()->isAjaxRequest()) {
                $html = $this->smarty->fetch($this->getTemplatePath());
                $this->drawJSON($html);
            } else {
                $this->smarty->display($this->getTemplatePath());
            }
        }

        public abstract function getTemplatePath();

        public function customHeader($tpl_output, $template) {
            $jsString = '<meta name="generator" content="Pars Framework ' . Sys()->getVersion() . '" />';
            $jsString .= '<script type="text/javascript">';
            $jsAllModelAndInvolvedModelsNames = json_encode($this->getJsAllModelAndInvolvedModelsArray());
            $jsString .= 'docReady(function() {Sys.ready(' . $jsAllModelAndInvolvedModelsNames . ');});';
            $jsString .= '</script>';
            $jsString .= '</head>';
            $tpl_output = str_replace('</head>', $jsString, $tpl_output);
            if (Sys()->getEnvironment() == "production") {
                $tpl_output = preg_replace('![\t ]*[\r]+[\t ]*!', '', $tpl_output);
            }
            return $tpl_output;
        }

        

    }

}