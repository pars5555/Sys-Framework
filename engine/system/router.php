<?php

namespace system {

    class Router {

        private $routings;
        private $requestUri;
        private static $instance = null;

        public function __construct() {
            $this->requestUri = trim(preg_replace('~/+~', '/', $_SERVER['REQUEST_URI']), '/');
            $this->initRoutingsInArray();
            $this->route();
        }

        private function initRoutingsInArray() {
            $routings = Sys()->getRoutings();
            $this->routings = [];
            foreach ($routings as $uri => $value) {
                $uriParts = explode('/', trim(preg_replace('~/+~', '/', $uri), '/'));
                if (count($uriParts) > 0) {
                    $routingRootPath = $uriParts[0];
                    if (!isset($this->routings [$routingRootPath])) {
                        $this->routings [$routingRootPath] = [];
                    }
                    $this->routings [$routingRootPath][] = ['uri_parts' => $uriParts, 'data' => $value, 'dept' => count($uriParts)];
                }
            }
        }

        public static function getInstance() {
            if (self::$instance == null) {
                self::$instance = new Router();
            }
            return self::$instance;
        }

        private function route() {
            if ($this->checkFile()) {
                return;
            }
            if ($this->checkEmptyRoute()) {
                return;
            }
            if ($this->checkCssRoute()) {
                return;
            }
            if ($this->checkJsRoute()) {
                return;
            }
            if ($this->checkDynamicRoute()) {
                return;
            }
            if ($this->_route()) {
                return;
            }
            
            SysExceptions::routeNotFound($this->requestUri);
        }

        private function checkCssRoute() {
            if ($this->requestUri === 'out/' . ALL_CSS_FILE) {
                builders\CSSBuilder::streamCss();
                return true;
            }
            return false;
        }

        private function checkJsRoute() {
            if ($this->requestUri === 'out/' . ALL_JS_FILE) {
                builders\JSBuilder::streamJs();
                return true;
            }
            return false;
        }

        private function checkEmptyRoute() {
            if (empty($this->requestUri)) {
                $this->defaultRoute();
                return true;
            }
            return false;
        }

        private function checkDynamicRoute() {
            if (substr($this->requestUri, 0, strlen(DYNAMIC_ROUTE_PREFIX)) === DYNAMIC_ROUTE_PREFIX) {
                $this->dynamicRoute();
                return true;
            }
            return false;
        }

        private function checkFile() {
            $filePath = realpath(PUBLIC_DIR.DIRECTORY_SEPARATOR.$this->requestUri);
            if (file_exists($filePath) && is_file($filePath))
            {
                (new util\FileStreamer)->sendFile($filePath);
                return true;
            }
        }
        
        private function _route() {
            $requestUriParts = explode('/', $this->requestUri);
            $dept = count($requestUriParts);
            $requestRootUriPart = $requestUriParts [0];
            $matchedRoutings = $this->getMatchedRoutingsToGivenRootPath($requestRootUriPart, $dept);
            if (empty($matchedRoutings)) {
                return false;
            }
            $matchedRouting = $this->getStrictMatchedRoutingToGivenPath($matchedRoutings, $requestUriParts);
            if (!$matchedRouting) {
                return false;
            }

            $modelObject = $this->initRouteModel($matchedRouting['data']);
            $this->initRouteInvolvedModel($matchedRouting['data'], $modelObject);
            $modelObject->draw();
            return true;
        }

        private function initRouteInvolvedModel($route, $model) {
            $involves = $this->getRouteInvolves($route);
            if (!empty($involves)) {
                if (!array($involves)) {
                    $involves = [$involves];
                }
                $models = [];
                foreach ($involves as $involve) {
                    $m = $this->initRouteModel($involve);
                    $models [] = $m;
                    $this->initRouteInvolvedModel($involve, $m);
                }
                $model->setInvolvedModels($models);
            }
        }

        private function getRouteInvolves($route) {
            if (array_key_exists('involve', $route) && !empty($route['involve'])) {
                return $route['involve'];
            }
            return false;
        }

        private function initRouteModel($route) {
            if (!array_key_exists('model', $route) || empty($route['model'])) {
                SysExceptions::modelAttributeNotFound($this->requestUri);
            }
            $modelPath = trim($route['model']);
            $modelClass = '\\models\\'. SUB_DOMAIN_DIR_FILE_NAME. '\\'. str_replace('.', '\\', $modelPath);
            $modelObject = new $modelClass();
            $modelObject->init();
            return $modelObject;
        }

        private function defaultRoute() {
            if (!array_key_exists('sysdefault', $this->routings))
            {
                SysExceptions::defaultRouteNotFound();
            }
            $matchedRouting = $this->routings['sysdefault'][0];
            $modelObject = $this->initRouteModel($matchedRouting['data']);
            $this->initRouteInvolvedModel($matchedRouting['data'], $modelObject);
            $modelObject->draw();
            return true;
        }

        private function dynamicRoute() {
            
        }

        private function routeMatched($uri_parts, $requestUriParts) {
            foreach ($uri_parts as $index => $pathElement) {
                if ($pathElement !== $requestUriParts[$index] && !$this->match($pathElement, $requestUriParts[$index])) {
                    return false;
                }
            }
            return true;
        }

        private function getStrictMatchedRoutingToGivenPath($routings, $requestUriParts) {
            foreach ($routings as $route) {
                if ($this->routeMatched($route['uri_parts'], $requestUriParts)) {
                    return $route;
                }
            }
            return false;
        }

        private function getMatchedRoutingsToGivenRootPath($rootPath, $dept) {
            $matchedRoutings = [];
            if (isset($this->routings[$rootPath])) {
                foreach ($this->routings[$rootPath] as $route) {
                    if ($route['dept'] === $dept) {
                        $matchedRoutings [] = $route;
                    }
                }
            }
            foreach ($this->routings as $routingRootPath => $route) {
                if ($routingRootPath [0] !== ROUTING_REGEX_START_CHAR || $route['dept'] !== $dept) {
                    continue;
                }
                if ($this->match($pattern, $routingRootPath)) {
                    $matchedRoutings[] = $route;
                }
            }
            return $matchedRoutings;
        }

        private function match($pattern, $string) {
            if ($pattern [0] !== ROUTING_REGEX_START_CHAR) {
                return $pattern === $string;
            }
            $pattern = substr($pattern, 1, -1);
            if ($pattern === 'number' && strval(intval($string)) === $string) {
                return true;
            }
            if (@preg_match($pattern, $string)) {
                return true;
            }
        }

    }

}