<?php

namespace controllers\system\install\actions {

    use controllers\system\JsonController;

    class ClearTemplateCache extends JsonController {

        public function init() {
            ini_set('max_execution_time', 120);
            $files = glob(VIEWS_DIR . '/cache/*');
            foreach ($files as $file) { // iterate files
                if (is_file($file)) {
                    @unlink($file);
                }
            }
        }

    }

}