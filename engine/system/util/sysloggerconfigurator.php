<?php

/**
 * FormValidator class contains utility functions for working with html form value validation.
 *
 * @author Levon Naghashyan
 * @site http://naghashyan.com
 * @mail levon@naghashyan.com
 * @year 2013-2015
 */

namespace system\util {

    use LoggerAppenderDailyFile;
    use LoggerConfigurator;
    use LoggerHierarchy;
    use LoggerLayoutPattern;

    class SysLoggerConfigurator implements LoggerConfigurator {

        public function configure(LoggerHierarchy $hierarchy, $input = null) {
            $appFile = new LoggerAppenderDailyFile($input['name']);
            $appFile->setFile($input['file']);
            $appFile->setAppend(true);
            $appFile->setDatePattern("Y-m-d");
            if (isset($input['level'])) {
                $threshold = $input['level'];
            }
            if (empty($threshold)) {
                $threshold = 'debug';
            }
            $appFile->setThreshold($threshold);
            $appFile->activateOptions();
            // Use a different layout for the next appender
            $layout = new LoggerLayoutPattern();
            $layout->setConversionPattern("%date{d.m.Y H:i:s} %msg%newline");
            $layout->activateOptions();
            $appFile->setLayout($layout);
            $root = $hierarchy->getRootLogger();
            $root->addAppender($appFile);
        }

    }

}
