<?php

ini_set('upload_max_filesize', '1M');
date_default_timezone_set("Asia/Yerevan");

class EventListener implements system\listeners\iEventListener {

    public function onEvent($event) {
        $authUser = sysservice('Auth')->getAuthUser();
        if (!empty($authUser)) {
            service('User')->setLastActivityDatetime($authUser->getId());
        }
    }

}

$eventListener = new EventListener();
controllers\system\SysController::subscribeEvent($eventListener);
