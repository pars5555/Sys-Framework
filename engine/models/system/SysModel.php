<?php

namespace models\system {

    abstract class SysModel {

        private $logger = null;
        private $involvedModels = [];
        private $containerModel = null;

        function __construct() {
            $this->initLogger();
        }

        public abstract function init();

        public abstract function draw();

        public function getModelName() {
            return get_class($this);
        }

        public function getAccessGroups() {
            return [];
        }

        public function getInvolvedModelsClasses() {
            return [];
        }

        public function setContainerModel($model) {
            $this->containerModel = $model;
        }

        public function getContainerModel() {
            return $this->containerModel;
        }

        public function setInvolvedModels($models) {
            foreach ($models as $model) {
                $model->setContainerModel($this);
            }
            $this->involvedModels = $models;
        }

        public function getInvolvedModels() {
            return $this->involvedModels;
        }

        private function initLogger() {
            $log = $this->log();
            if (!empty($log)) {
                $reflect = new \ReflectionClass($this);
                $name = str_replace(['/', '\\'], '.', $reflect->getName());
                $logFilePath = LOG_DIR . '/' . $name . '.log';
                \Logger::configure(['file' => $logFilePath, 'name' => $name, 'level' => Sys()->getConfig('log_level')], new \system\util\SysLoggerConfigurator());
                $this->logger = \Logger::getLogger($name);
                if ($log['dump_request'] == true) {
                    $args = print_r($_REQUEST, true);
                    $args = preg_replace('/\s+/', '', $args);
                    $this->logger->info("Request dump: " . $args);
                }
                if ($log['dump_input'] == true) {
                    $this->logger->info("Input dump: " . print_r(file_get_contents('php://input'), true));
                }
            }
        }

        protected function getLogger() {
            if (!isset($this->logger)) {
                \system\SysExceptions::loggerIsNotEnabled();
            }
            return $this->logger;
        }

        protected function log() {
            return Sys()->getConfig('log');
        }

    }

}