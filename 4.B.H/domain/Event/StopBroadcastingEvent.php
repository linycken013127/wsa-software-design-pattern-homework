<?php

namespace domain\Event;

use domain\FSM\Event;

class StopBroadcastingEvent extends Event
{
    public function __construct(mixed $value = null)
    {
        parent::__construct('StopBroadcastingEvent', $value);
    }
}