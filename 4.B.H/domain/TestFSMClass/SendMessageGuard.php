<?php

namespace domain\TestFSMClass;

use domain\FSM\Event\Event;
use domain\FSM\Guard\Guard;

class SendMessageGuard extends Guard
{
    public function guard(Event $event): bool
    {
        return true;
    }
}