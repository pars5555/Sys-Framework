<?php

namespace system\builders {

    class JSBuilder {

        public static function streamJs() {
            if (Sys()->isDevelopmentMode()) {
                self::streamDevJs();
            } else {
                self::streamProdJs();
            }
        }

        public static function streamDevJs() {            
            header('Content-type: text/javascript');
            $jsFiles = \system\util\Util::getDirectoryFiles(JS_COMMON_DIR, 'js', true);
            foreach ($jsFiles as $file) {
                $inputFile = SITE_PATH . "/js/common/" . trim($file);
                echo("document.write('<script type=\"text/javascript\" src=\"" . $inputFile . "\"></script>');\n\r");
            }
            
            
            $jsFiles = \system\util\Util::getDirectoryFiles(JS_DIR, 'js', true);
            foreach ($jsFiles as $file) {
                $inputFile = SITE_PATH . "/js/" . SUB_DOMAIN_DIR_FILE_NAME . '/'. trim($file);
                echo("document.write('<script type=\"text/javascript\" src=\"" . $inputFile . "\"></script>');\n\r");
            }
        }

        public static function streamProdJs() {
            $jsFiles = \system\util\Util::getDirectoryFiles(JS_DIR, 'js', false);
            $allFileContents = "";
            foreach ($jsFiles as $file) {
                $allFileContents .= file_get_contents($file);
            }
            header('Content-type: text/javascript');
            $js = JSMinifier::minify($allFileContents);
            @mkdir(dirname(PUBLIC_OUT_JS_FILE), 0755, true); 
            file_put_contents(PUBLIC_OUT_JS_FILE, $js);
            (new \system\util\FileStreamer())->sendFile(PUBLIC_OUT_JS_FILE, array("mimeType" => "text/javascript", "cache" => true));
        }

    }

}
