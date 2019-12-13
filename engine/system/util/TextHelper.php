<?php

namespace system\util {

    class TextHelper {

        static function removeTags($text, $tagName) {
            $doc = new \DOMDocument;

            @$doc->loadHTML(mb_convert_encoding($text, 'HTML-ENTITIES', 'UTF-8')); // load the HTML data

            $xpath = new \DOMXPath($doc);

            foreach ($xpath->query('//' . $tagName) as $tag) {
                $tag->parentNode->removeChild($tag);
            }
            $text = $doc->saveHTML();
            return $text;
        }

        static function truncate($text, $length = 100, $ending = '...', $html = false, $exact = true) {
            if ($html) {
                if (mb_strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
                    return $text;
                }
                $totalLength = mb_strlen(strip_tags($ending));
                $openTags = array();
                $truncate = '';

                preg_match_all('/(<\/?([\w+]+)[^>]*>)?([^<>]*)/', $text, $tags, PREG_SET_ORDER);
                foreach ($tags as $tag) {
                    if (!preg_match('/img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param/s', $tag[2])) {
                        if (preg_match('/<[\w]+[^>]*>/s', $tag[0])) {
                            array_unshift($openTags, $tag[2]);
                        } else if (preg_match('/<\/([\w]+)[^>]*>/s', $tag[0], $closeTag)) {
                            $pos = array_search($closeTag[1], $openTags);
                            if ($pos !== false) {
                                array_splice($openTags, $pos, 1);
                            }
                        }
                    }
                    $truncate .= $tag[1];

                    $contentLength = mb_strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/iu', ' ', $tag[3]));
                    if ($contentLength + $totalLength > $length) {
                        $left = $length - $totalLength;
                        $entitiesLength = 0;
                        if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/iu', $tag[3], $entities, PREG_OFFSET_CAPTURE)) {
                            foreach ($entities[0] as $entity) {
                                if ($entity[1] + 1 - $entitiesLength <= $left) {
                                    $left--;
                                    $entitiesLength += mb_strlen($entity[0]);
                                } else {
                                    break;
                                }
                            }
                        }

                        $truncate .= mb_substr($tag[3], 0, $left + $entitiesLength);
                        break;
                    } else {
                        $truncate .= $tag[3];
                        $totalLength += $contentLength;
                    }
                    if ($totalLength >= $length) {
                        break;
                    }
                }
            } else {
                if (mb_strlen($text) <= $length) {
                    return $text;
                } else {
                    $truncate = mb_substr($text, 0, $length - mb_strlen($ending));
                }
            }
            if (!$exact) {
                $spacepos = mb_strrpos($truncate, ' ');
                if (isset($spacepos)) {
                    if ($html) {
                        $bits = mb_substr($truncate, $spacepos);
                        preg_match_all('/<\/([a-z]+)>/', $bits, $droppedTags, PREG_SET_ORDER);
                        if (!empty($droppedTags)) {
                            foreach ($droppedTags as $closingTag) {
                                if (!in_array($closingTag[1], $openTags)) {
                                    array_unshift($openTags, $closingTag[1]);
                                }
                            }
                        }
                    }
                    $truncate = mb_substr($truncate, 0, $spacepos);
                }
            }
            $truncate .= $ending;

            if ($html) {
                foreach ($openTags as $tag) {
                    $truncate .= '</' . $tag . '>';
                }
            }

            return $truncate;
        }

        static function startsWith($haystack, $needle) {
            $length = strlen($needle);
            return (substr($haystack, 0, $length) === $needle);
        }
        
        static function  lowerCaseUnderscore($text) {
            return strtolower(preg_replace('/\B([A-Z])/', '_$1', $text));
        }

        static function camelCase($string, $prefix = '', $postfix = '') {
            return $prefix . ucfirst(preg_replace_callback('/_(.?)/', function($matches) {
                                return ucfirst($matches[1]);
                            }, $string)) . $postfix;
        }

        static function endsWith($haystack, $needle) {
            $length = strlen($needle);
            if ($length == 0) {
                return true;
            }

            return (substr($haystack, -$length) === $needle);
        }

    }

}