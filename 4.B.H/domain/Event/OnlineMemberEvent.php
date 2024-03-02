<?php

namespace domain\Event;

use domain\FSM\Event;

class OnlineMemberEvent extends Event
{
    public function __construct(mixed $value = null)
    {
        parent::__construct('OnlineMemberEvent', $value);
    }
}