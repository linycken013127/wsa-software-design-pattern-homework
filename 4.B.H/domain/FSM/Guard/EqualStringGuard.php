<?php

namespace domain\FSM\Guard;

use domain\FSM\Event\Event;

class EqualStringGuard extends Guard
{

    public function __construct(
        private readonly string $target,
    )
    {
    }

    public function guard(Event $event): bool
    {
        return $event->getValue() === $this->target;
    }
}