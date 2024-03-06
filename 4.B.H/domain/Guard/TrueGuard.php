<?php

namespace domain\Guard;

use domain\FSM\Event;
use domain\FSM\Guard;

class TrueGuard implements Guard
{

    public function guard(Event $event): bool
    {
        return true;
    }
}