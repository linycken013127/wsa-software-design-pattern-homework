<?php

namespace domain\Event;

use domain\FSM\Event;

class EmptyEvent extends Event
{
    public function __construct(mixed $value = null)
    {
        parent::__construct('EmptyEvent', $value);
    }
}