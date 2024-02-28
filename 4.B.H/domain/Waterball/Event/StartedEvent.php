<?php

namespace domain\Waterball\Event;

use domain\FSM\Event\Event;

class StartedEvent extends Event
{

    public function __construct()
    {
        parent::__construct('started');
    }
}