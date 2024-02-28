<?php

namespace domain\WSA\Event;

use domain\FSM\Event;
use domain\FSM\Guard;

class BelowNumberGuard implements Guard
{

    /**
     * @param int $int
     */
    public function __construct(
        private readonly int $target
    )
    {
    }

    public function satisfyCriteria(Event $event): bool
    {
        return $event->getValue() < $this->target;
    }
}