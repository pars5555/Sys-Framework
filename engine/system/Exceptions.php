<?php

namespace system {

    class SysExceptions {

        public static function fileNotFound($filePath) {
            header('HTTP/1.0 500 Forbidden');
            throw new \Exception('File not found: ' . $filePath, 10040);
        }

        public static function routeNotFound($route) {
            header('HTTP/1.0 404 Forbidden');
            throw new \Exception('No route found with: ' . $route, 10020);
        }
        
        public static function defaultRouteNotFound() {
            header('HTTP/1.0 404 Forbidden');
            throw new \Exception('No default route found. Please <sysdefault> route in routings.js file', 10020);
        }
        
        public static function noMysqlConfig() {
            header('HTTP/1.0 500 Forbidden');
            throw new \Exception('No mysql config found in project config file. Please add <mysql> settings in config file. ("mysql": {"host": "127.0.0.1","user": "root","pass": "","name": "instmanager"})', 10020);
        }
        
        public static function noAccessModel($model) {
            header('HTTP/1.0 403 Forbidden');
            throw new \Exception('No Access to model ('.$model->getModelName().'). User should has one of these group(s) ['. implode(', ',$model->getAccessGroups()).']', 403);
        }
        
        public static function unknownError() {
            header('HTTP/1.0 500 Forbidden');
            throw new \Exception('Unknown Error', 10020);
            
        }

        public static function modelAttributeNotFound($route) {
            header('HTTP/1.0 500 Forbidden');
            throw new \Exception('No <model> attibute found in the route: ' . $route, 10021);
        }
        
        public static function loggerIsNotEnabled() {
            header('HTTP/1.0 500 Forbidden');
            throw new \Exception('Logger is not enabled for this request. Please enable logger by overriding <log()> method in your request.', 10021);
        }

    }

}