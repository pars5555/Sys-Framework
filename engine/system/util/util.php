<?php

namespace system\util {

    class Util {

        public static function getDirectoryFiles($dir, $extension, $relative = false) {
            $files = scandir($dir);
            $results = [];
            foreach ($files as $file) {
                $path = realpath($dir . DIRECTORY_SEPARATOR . $file);
                if (is_file($path)) {
                    if (self::getFileExtension($path) === $extension) {
                        $results[] = $path;
                    }
                } else if ($file != "." && $file != "..") {
                    $results = array_merge($results, self::getDirectoryFiles($path, $extension));
                }
            }
            if ($relative) {
                foreach ($results as &$value) { // reference
                    $value = trim(str_replace($dir, "", $value), '\\/');
                }
            }
            return $results;
        }

        public static function getFileExtension($file) {
            $parts = explode('.', $file);
            return end($parts);
        }

       
    }

}