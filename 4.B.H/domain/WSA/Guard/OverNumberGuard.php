<?php

namespace domain\WSA\Guard;

use domain\FSM\Event;
use domain\FSM\Guard;

class OverNumberGuard implements Guard
{

    /**
     * @param int $int
     */
    public function __construct(
        private int $target,
    )
    {
    }

    public function satisfyCriteria(Event $event): bool
    {
        return $event->getValue() > $this->target;
    }
}