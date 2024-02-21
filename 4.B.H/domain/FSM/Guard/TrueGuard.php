<?php

namespace domain\FSM\Guard;

use domain\FSM\Event\Event;

class TrueGuard extends Guard
{

    public function guard(Event $event): bool
    {
        return true;
    }
}