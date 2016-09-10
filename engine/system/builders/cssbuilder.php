<?php

namespace system\builders {

    class CSSBuilder {

        public static function streamCss() {
            if (Sys()->isDevelopmentMode()) {
                self::streamDevCss();
            } else {
                self::streamProdCss();
            }
        }

        public static function streamDevCss() {
            $cssFiles = \system\Util::getDirectoryFiles(CSS_DIR, 'css', true);
            header('Content-type: text/css');
            foreach ($cssFiles as $file) {
                $file = SITE_PATH . "/css/" . trim($file);
                echo '@import url("' . $file . '");';
            }
        }

        public static function streamProdCss() {
            $cssFiles = \system\Util::getDirectoryFiles(CSS_DIR, 'css', false);
            $allFileContents = "";
            foreach ($cssFiles as $file) {
                $allFileContents .= file_get_contents($file);
            }
            header('Content-type: text/css');
            $css = self::minifyCss($allFileContents);            
            file_put_contents(PUBLIC_OUT_CSS_FILE, $css);
            (new \system\util\FileStreamer())->sendFile(PUBLIC_OUT_CSS_FILE, array("mimeType" => "text/css", "cache" => true));
        }

        public static function minifyCss($css) {
            return str_replace(array("\r\n", "\r", "\n", "\t"), '', preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css));
        }

    }

}