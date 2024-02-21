<?php

namespace domain\Waterball\Event;

use domain\FSM\Event\Event;

class OnlineMemberCountEvent extends Event
{
    public function __construct()
    {
        parent::__construct('OnlineMemberCountEvent');
    }
}