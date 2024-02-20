<?php

namespace domain\FSM\Guard;

use domain\Event\Event;
use domain\Event\OnlineUserEvent;

class BelowTenGuard extends Guard
{

    public function __construct()
    {
    }

    public function guard(OnlineUserEvent $event): bool
    {
        return $event->getValue() < 10;
    }
}