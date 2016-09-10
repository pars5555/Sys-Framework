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
            $jsFiles = \system\Util::getDirectoryFiles(JS_DIR, 'js', true);
            header('Content-type: text/javascript');
            foreach ($jsFiles as $file) {
                $inputFile = SITE_PATH . "/js/" . trim($file);
                echo("document.write('<script type=\"text/javascript\" src=\"" . $inputFile . "\"></script>');\n\r");
            }
        }

        public static function streamProdJs() {
            $jsFiles = \system\Util::getDirectoryFiles(JS_DIR, 'js', false);
            $allFileContents = "";
            foreach ($jsFiles as $file) {
                $allFileContents .= file_get_contents($file);
            }
            header('Content-type: text/javascript');
            $js = JSMinifier::minify($allFileContents);
            file_put_contents(PUBLIC_OUT_JS_FILE, $js);
            (new \system\util\FileStreamer())->sendFile(PUBLIC_OUT_JS_FILE, array("mimeType" => "text/javascript", "cache" => true));
        }

    }

}
