<?php

namespace domain\Event;

use domain\FSM\Event;

class CommandEvent extends Event
{
    public function __construct(mixed $value = null)
    {
        parent::__construct('CommandEvent', $value);
    }
}