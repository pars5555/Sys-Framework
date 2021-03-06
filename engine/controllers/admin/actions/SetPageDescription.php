<?php

namespace controllers\admin\actions {

    use controllers\system\JsonController;

    class SetPageDescription extends JsonController {

        public function init() {
            $rowId = intval(Sys()->request('rowId'));
            if ($rowId == 0) {
                $this->addParam('status', 'error');
                $this->addParam('message', "Missing ID");
                return;
            }
            $en = Sys()->request('en');
            $hy = Sys()->request('hy');
            $ru = Sys()->request('ru');
            service('PageDescription')->updateAdvance(['id', '=', $rowId], ['en' => $en, 'hy' => $hy, 'ru' => $ru]);
        }

    }

}