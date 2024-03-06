<?php

namespace domain\Event;

use domain\FSM\Event;

class MessageEvent extends Event
{
    public function __construct(mixed $value = null)
    {
        parent::__construct('MessageEvent', $value);
    }
}