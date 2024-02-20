<?php

namespace domain\FSM\Guard;

use domain\Event\Event;

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