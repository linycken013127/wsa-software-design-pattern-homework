<?php

namespace domain\Waterball\Event;

use domain\FSM\Event\Event;

class BroadcastingStateEvent extends Event
{

    public function __construct()
    {
        parent::__construct('GoBroadcastingEvent');
    }
}