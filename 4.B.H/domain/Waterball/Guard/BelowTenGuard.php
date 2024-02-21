<?php

namespace domain\Waterball\Guard;

use domain\FSM\Event\Event;
use domain\FSM\Guard\Guard;

class BelowTenGuard extends Guard
{

    public function __construct()
    {
    }

    public function guard(Event $event): bool
    {
        return $event->getValue() < 10;
    }
}