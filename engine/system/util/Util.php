<?php

namespace system\util {

    class Util {

        public static function getDirectoryFiles($dir, $extensions = '*', $relative = false) {
            if (!is_dir($dir)){
                return [];
            }
            $dir = str_replace('\\', '/', $dir);
            $files = @scandir($dir);
            if (!is_array($extensions)) {
                $extensions = [$extensions];
            }
            $extensions = array_map('strtolower', $extensions);
            $results = [];
            if (empty($files)) {
                return $results;
            }
            $ignoreDirectories = [];
            $ignoreFiles = [];
            if (in_array('ignore.sys', $files)) {
                $ignoreJson = json_decode(file_get_contents($dir . DIRECTORY_SEPARATOR . 'ignore.sys'));
                if (!empty($ignoreJson)) {
                    $ignoreDirectories = isset($ignoreJson->directories) ? $ignoreJson->directories : [];
                    $ignoreFiles = isset($ignoreJson->files) ? $ignoreJson->files : [];
                }
            }
            foreach ($files as $file) {
                $path = realpath($dir . DIRECTORY_SEPARATOR . $file);
                if (is_file($path) && !in_array($file, $ignoreFiles)) {
                    if ($extensions[0] === '*' || in_array(strtolower(self::getFileExtension($path)), $extensions)) {
                        $results[] = $path;
                    }
                } else if ($file != "." && $file != ".." && !in_array($file, $ignoreDirectories)) {
                    $results = array_merge($results, self::getDirectoryFiles($path, $extensions));
                }
            }
            foreach ($results as &$value) {
                $value = rtrim(str_replace('\\', '/', $value), '\\/');
            }
            if ($relative) {
                $dirRealPath = trim(realpath($dir));
                $dirRealPathClean = trim(str_replace('\\', '/', $dirRealPath), '\\/');

                foreach ($results as &$value) {
                    $value = trim(str_replace($dirRealPathClean, "", $value), '\\/');
                    $value = trim(str_replace($dir, "", $value), '\\/');
                }
            }
            return $results;
        }

        public static function getFileExtension($file) {
            $parts = explode('.', $file);
            return end($parts);
        }

        public static function isLinux(&$osName = "") {
            $osName = PHP_OS;
            return !self::isWindows($osName);
        }
        
        public static function isWindows(&$osName = "") {
            $osName = PHP_OS;
            return strtoupper(substr(PHP_OS, 0, 3)) === 'WIN';
        }

        /**
         * Generate a random string, using a cryptographically secure 
         * pseudorandom number generator (random_int)
         * 
         * For PHP 7, random_int is a PHP core function
         * For PHP 5.x, depends on https://github.com/paragonie/random_compat
         * 
         * @param int $length      How many characters do we want?
         * @param string $keyspace A string of all possible characters
         *                         to select from
         * @return string
         */
        public static function generateHash($length = 64, $upper = false, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
            $pieces = [];
            $max = mb_strlen($keyspace, '8bit') - 1;
            for ($i = 0; $i < $length; ++$i) {
                $pieces [] = $keyspace[rand(0, $max)];
            }
            $ret = implode('', $pieces);
            return $upper ? strtoupper($ret) : $ret;
        }

        public static function deleteDir($dirPath) {
            if (!is_dir($dirPath)) {
                throw new InvalidArgumentException("$dirPath must be a directory");
            }
            if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
                $dirPath .= '/';
            }
            $files = glob($dirPath . '*', GLOB_MARK);
            foreach ($files as $file) {
                if (is_dir($file)) {
                    self::deleteDir($file);
                } else {
                    unlink($file);
                }
            }
            rmdir($dirPath);
        }

        public static function runBackground($command) {
            if (!self::isLinux()) {
                pclose(popen("start $command", "r"));
            } else {
                $outpout = [];
                exec($command . ' >/dev/null 2>&1 &', $outpout);
            }
        }

        public static function checkUploadedFile($requestFileVariableName) {
            $error = $_FILES[$requestFileVariableName]['error'];
            switch ($error) {
                case UPLOAD_ERR_OK :
                    return true;
                case UPLOAD_ERR_INI_SIZE :
                    return 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';

                case UPLOAD_ERR_FORM_SIZE :
                    return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.';

                case UPLOAD_ERR_PARTIAL :
                    return 'The uploaded file was only partially uploaded.';

                case UPLOAD_ERR_NO_FILE :
                    return 'No file was uploaded.';

                case UPLOAD_ERR_NO_TMP_DIR :
                    return 'Missing a temporary folder. Introduced in PHP 4.3.10 and PHP 5.0.3.';

                case UPLOAD_ERR_CANT_WRITE :
                    return 'Failed to write file to disk. Introduced in PHP 5.1.0.';

                case UPLOAD_ERR_EXTENSION :
                    return 'File upload stopped by extension. Introduced in PHP 5.2.0.';

                default :
                    return false;
            }
        }

        public static function resizeImageToGivenType($img, $newfilename, $w, $h, $type) {

            //Check if GD extension is loaded
            if (!extension_loaded('gd') && !extension_loaded('gd2')) {
                trigger_error("GD is not loaded", E_USER_WARNING);
                return false;
            }

            //Get Image size info
            $imgInfo = getimagesize($img);
            switch ($imgInfo[2]) {
                case IMAGETYPE_GIF :
                    $im = imagecreatefromgif($img);
                    break;
                case IMAGETYPE_JPEG :
                    $im = imagecreatefromjpeg($img);
                    break;
                case IMAGETYPE_PNG :
                    $im = imagecreatefrompng($img);
                    break;
                default :
                    trigger_error('Unsupported filetype!', E_USER_WARNING);
                    break;
            }

            //If image dimension is smaller, do not resize
            if ($imgInfo[0] <= $w && $imgInfo[1] <= $h) {
                $nHeight = $imgInfo[1];
                $nWidth = $imgInfo[0];
            } else {
                //yeah, resize it, but keep it proportional
                if ($w / $imgInfo[0] < $h / $imgInfo[1]) {
                    $nWidth = $w;
                    $nHeight = $imgInfo[1] * ($w / $imgInfo[0]);
                } else {
                    $nWidth = $imgInfo[0] * ($h / $imgInfo[1]);
                    $nHeight = $h;
                }
            }

            $nWidth = round($nWidth);
            $nHeight = round($nHeight);

            $newImg = imagecreatetruecolor($nWidth, $nHeight);
            $backgroundColor = imagecolorallocate($newImg, 255, 255, 255);
            imagefill($newImg, 0, 0, $backgroundColor);

            imagecopyresampled($newImg, $im, 0, 0, 0, 0, $nWidth, $nHeight, $imgInfo[0], $imgInfo[1]);

            if (strtolower($type) === 'png') {
                imagepng($newImg, $newfilename);
            } else if (strtolower($type) === 'gif') {
                imagegif($newImg, $newfilename);
            } else if (strtolower($type) === 'jpg') {
                imagejpeg($newImg, $newfilename);
            } else {
                trigger_error('Failed resize image!', E_USER_WARNING);
            }
            return true;
        }

    }

}