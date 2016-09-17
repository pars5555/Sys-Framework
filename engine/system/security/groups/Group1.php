<?php

namespace system\security\groups {

    class Group1 implements IGroup {

        public function getUsers() {
            return [
                \system\security\users\User1,
                \system\security\users\User2
            ];
        }

    }

}
