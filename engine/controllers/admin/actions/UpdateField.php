<?php

namespace controllers\admin\actions {

    use controllers\system\JsonController;

    class UpdateField extends JsonController {

        public function init() {
            $id = intval(Sys()->request('id'));
            $fieldName = trim(Sys()->request('field_name'));
            $fieldValue = Sys()->request('field_value');
            $serviceName = trim(Sys()->request('data_service'));
            $this->checkField($serviceName, $fieldName, $fieldValue);
            service($serviceName)->updateFieldById($id, $fieldName, $fieldValue);
            $row = service($serviceName)->selectById($id);
            $this->addParam('value', $row->$fieldName);
            if ($serviceName === 'PromotionalItems') {
                service($serviceName)->reorderRows();
                if ($fieldName == 'asin') {
                    service('Product')->cacheItemInBackground($fieldValue);
                }
            }
            if ($serviceName === 'UserTransactions' && $fieldName == 'status') {
                $this->addParam('display_value', \entities\UserTransaction::STATUSES[$row->$fieldName]);
            }
            if ($serviceName === 'UserTransactions' && $fieldName == 'type') {
                $this->addParam('display_value', $row->$fieldName);
            }
            if ($serviceName === 'UserTransactions' && $fieldName == 'user_id') {
                $userId = $row->$fieldName;
                $user = service('User')->selectById($userId);
                if ($user){
                    $this->addParam('value', $user->getEmail());
                }else{
                    $this->addParam('value', 'N/A');
                    service($serviceName)->updateFieldById($id, $fieldName, 0);
                }
            }
        }

        private function checkField($serviceName, $fieldName, &$fieldValue) {
            if ($serviceName === 'UserTransactions' && $fieldName == 'user_id') {
                $userIdOrEmail = $fieldValue;
                if (is_numeric($userIdOrEmail)){
                    $user = service('User')->selectById($userIdOrEmail);
                }else{
                    $user = service('User')->selectOneByField('email', $userIdOrEmail);
                }
                if (!empty($user)){
                    $fieldValue = $user->getId();
                }
            }
        }

    }

}
