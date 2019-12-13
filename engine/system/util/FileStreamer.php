<?php

namespace system\util {

    class FileStreamer {

//-----------------------------Streamer Part---------//		
        /**
         * send file to user
         * set correct headers and stream file to user
         * check if file from local or remote
         * if local using 3 streamer option
         * standart - php file open and read
         * xAccelRedirect - nginx streamer
         * xSendfile - apache file streamer module
         * if remote
         * read remote file and stream to user
         *
         * @param string $file - full file path
         * @param array $options - (filename-custom file name, mimeType-custom mime type of file, contentLength-custom file size,
         * cache true|false, remoteFile-is file remote, streamer - for local files,headers-addition headers)
         *
         * @return files bytes
         */
        public function sendFile($file, $options = array()) {
            $defaultOptions = array("filename" => null, "mimeType" => null, "contentLength" => null, "cache" => false, "remoteFile" => false, "streamer" => "standart", "headers" => array());
            $options = array_merge($defaultOptions, $options);
            if ($options["remoteFile"] == false) {
                if (strpos($file, "https://") !== false || strpos($file, "http://") !== false || strpos($file, "ftp://") !== false) {
                    $options["remoteFile"] = true;
                }
            }
            if ($options["remoteFile"] == true) {
                $options["remoteFileData"] = get_headers($file, true);
            }
            //check if user set file name than send user's filename if not get from file
            if ($options["filename"] != null) {
                header('Content-Disposition: attachment; filename=' . $options["filename"]);
            }
            //check if user set mimetype than send user if not get from file
            if ($options["mimeType"] == null) {
                if ($options["remoteFile"] === false) {
                    header('Content-type: ' . $this->mime_content_type($file));
                } else {
                    header('Content-type: ' . $options["remoteFileData"]["Content-Type"]);
                }
            } else {
                header('Content-type: ' . $options["mimeType"]);
            }
            //check if content lengh if null and check if we
            //should use php file stream than we should add
            //file size in headers else use user defined file size
            if ($options["contentLength"] == null) {
                if ($options["streamer"] == "standart" && $options["remoteFile"] === false) {
                    header('Content-Length: ' . filesize($file));
                } else {
                    header('Content-Length: ' . $options["remoteFileData"]["Content-Length"]);
                }
            } else {
                header('Content-Length: ' . $options["contentLength"]);
            }

            //send cache headers
            $this->sendCacheHeaders($file, $options);
            foreach ($options["headers"] as $key => $value) {
                header($value);
            }
            if ($options["remoteFile"] === true) {
                $this->doStreamFromUrl($file);
                return;
            }
            $this->doStreamFile(realpath($file), $options["streamer"]);
        }

        /**
         * send cache headers
         *
         *
         * @param string $file - full file path
         * @param array $options - (filename-custom file name, mimeType-custom mime type of file, contentLength-custom file size,
         * cache true|false, remoteFile-is file remote, streamer - for local files,headers-addition headers)
         *
         * @return files bytes
         */
        private function sendCacheHeaders($file, $options) {
            //if cache is true that check if browser have that file.
            if ($options["cache"]) {
                $etag = md5_file($file);
                if ($options["remoteFile"] == true) {
                    $lastModifiedTime = $options["remoteFileData"]["Last-Modified"];
                    header("Last-Modified: " . $lastModifiedTime);
                    if ($options["remoteFileData"]["Etag"]) {
                        $etag = $options["remoteFileData"]["Etag"];
                    }
                } else {
                    $lastModifiedTime = filemtime($file);
                    header("Last-Modified: " . gmdate("D, d M Y H:i:s", $lastModifiedTime) . " GMT");
                }

                header("Etag: " . $etag);
                if (@strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) == $lastModifiedTime || (isset($_SERVER['HTTP_IF_NONE_MATCH']) && trim($_SERVER['HTTP_IF_NONE_MATCH']) == $etag)) {
                    header("HTTP/1.1 304 Not Modified");
                    return true;
                }

                header("Cache-Control: private, max-age=10800, pre-check=10800");
                header("Pragma: private");
            } else {
                header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
                header("Cache-Control: no-store, no-cache, must-revalidate");
                header("Cache-Control: post-check=0, pre-check=0", false);
                header("Pragma: no-cache");
            }
        }

        /**
         * read and send file bytes
         *
         *
         * @param string $streamFile - full file path
         * @param string $streamer - streamer mode
         *
         * @return files bytes
         */
        private function doStreamFile($streamFile, $streamer) {
            switch ($streamer) {
                case 'xAccelRedirect' :
                    header('X-Accel-Redirect: ' . $streamFile);
                    break;
                case 'xSendfile' :
                    header('X-Sendfile: ' . $streamFile);
                    break;
                default :
                    $file = @fopen($streamFile, "rb");
                    if ($file) {
                        while (!feof($file)) {
                            print(fread($file, 2048 * 8));
                            flush();
                            if (connection_status() != 0) {
                                @fclose($file);
                                die();
                            }
                        }
                        @fclose($file);
                    }
                    break;
            }

            exit;
        }

        /**
         * read and send remote file bytes
         *
         *
         * @param string $url
         *
         * @return files bytes
         */
        private function doStreamFromUrl($url) {
            $file = @fopen($url, "rb");
            if ($file) {
                while (!feof($file)) {
                    print(fread($file, 2048 * 8));
                    flush();
                    if (connection_status() != 0) {
                        @fclose($file);
                        die();
                    }
                }
                @fclose($file);
            }
        }

        function mime_content_type($filename) {

            $mime_types = array(
                'txt' => 'text/plain',
                'htm' => 'text/html',
                'html' => 'text/html',
                'php' => 'text/html',
                'css' => 'text/css',
                'js' => 'application/javascript',
                'json' => 'application/json',
                'xml' => 'application/xml',
                'swf' => 'application/x-shockwave-flash',
                'flv' => 'video/x-flv',
                // images
                'png' => 'image/png',
                'jpe' => 'image/jpeg',
                'jpeg' => 'image/jpeg',
                'jpg' => 'image/jpeg',
                'gif' => 'image/gif',
                'bmp' => 'image/bmp',
                'ico' => 'image/vnd.microsoft.icon',
                'tiff' => 'image/tiff',
                'tif' => 'image/tiff',
                'svg' => 'image/svg+xml',
                'svgz' => 'image/svg+xml',
                // archives
                'zip' => 'application/zip',
                'rar' => 'application/x-rar-compressed',
                'exe' => 'application/x-msdownload',
                'msi' => 'application/x-msdownload',
                'cab' => 'application/vnd.ms-cab-compressed',
                // audio/video
                'mp3' => 'audio/mpeg',
                'qt' => 'video/quicktime',
                'mov' => 'video/quicktime',
                // adobe
                'pdf' => 'application/pdf',
                'psd' => 'image/vnd.adobe.photoshop',
                'ai' => 'application/postscript',
                'eps' => 'application/postscript',
                'ps' => 'application/postscript',
                // ms office
                'doc' => 'application/msword',
                'rtf' => 'application/rtf',
                'xls' => 'application/vnd.ms-excel',
                'ppt' => 'application/vnd.ms-powerpoint',
                'pptx' => 'application/vnd.ms-powerpoint',
                // open office
                'odt' => 'application/vnd.oasis.opendocument.text',
                'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
            );

            $parts = explode('.', $filename);
            $ext = strtolower(array_pop($parts ));
            if (array_key_exists($ext, $mime_types)) {
                return $mime_types[$ext];
            } elseif (function_exists('finfo_open')) {
                $finfo = finfo_open(FILEINFO_MIME);
                $mimetype = finfo_file($finfo, $filename);
                finfo_close($finfo);
                return $mimetype;
            } else {
                return 'application/octet-stream';
            }
        }

    }

}
