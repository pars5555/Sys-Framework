<?php

namespace controllers\admin\actions {

    use controllers\system\JsonController;

    class SetSnippet extends JsonController {

        public function init() {
            $rowId = intval(Sys()->request('rowId'));
            if ($rowId == 0) {
                $this->addParam('status', 'error');
                $this->addParam('message', "Missing ID");
                return;
            }
            $phrase_en = Sys()->request('phrase_en');
            $phrase_hy = Sys()->request('phrase_hy');
            $phrase_ru = Sys()->request('phrase_ru');
            service('Snippet')->updateAdvance(['id', '=', $rowId], ['en' => $phrase_en, 'hy' => $phrase_hy, 'ru' => $phrase_ru]);
        }

    }

}