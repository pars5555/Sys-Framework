<?php

namespace controllers\admin\actions {

    use controllers\system\JsonController;

    class SetSetting extends JsonController {

        public function init() {
            $rowId = intval(Sys()->request('id'));
            if ($rowId == 0) {
                $this->addParam('status', 'error');
                $this->addParam('message', "Missing ID");
                return;
            }
            $value = Sys()->request('value');
            $description = Sys()->request('description');
            $phrase_ru = Sys()->request('phrase_ru');
            service('Settings')->updateAdvance(['id', '=', $rowId], ['value' => $value, 'description' => $description]);
        }

    }

}