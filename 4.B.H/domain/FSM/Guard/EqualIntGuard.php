<?php

namespace domain\FSM\Guard;

use domain\FSM\Event\Event;

class EqualIntGuard extends Guard
{

    public function __construct(
        private readonly int $target
    )
    {
    }

    public function guard(Event $event): bool
    {
        return $event->getValue() === $this->target;
    }
}