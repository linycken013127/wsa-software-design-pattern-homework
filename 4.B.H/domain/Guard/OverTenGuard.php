<?php

namespace domain\Guard;

use domain\Event;
use domain\Guard;

class OverTenGuard extends Guard
{

    public function __construct()
    {
    }

    public function guard(Event $event): bool
    {
        return $event->getValue() >= 10;
    }
}