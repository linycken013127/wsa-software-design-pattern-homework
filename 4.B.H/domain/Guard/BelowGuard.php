<?php

namespace domain\Guard;

use domain\FSM\Event;
use domain\FSM\Guard;

class BelowGuard implements Guard
{
    public function __construct(
        private readonly int $target
    )
    {
    }

    public function guard(Event $event): bool
    {
        return $event->getValue() < $this->target;
    }
}