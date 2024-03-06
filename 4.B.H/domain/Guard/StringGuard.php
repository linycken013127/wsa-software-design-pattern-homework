<?php

namespace domain\Guard;

use domain\FSM\Event;
use domain\FSM\Guard;

class StringGuard implements Guard
{

    public function __construct(
        private readonly string $target
    )
    {
    }

    public function guard(Event $event): bool
    {
        return $event->getValue() === $this->target;
    }
}