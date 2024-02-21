<?php

namespace domain\Waterball\Event;

use domain\FSM\Event\Event;

class LogoutEvent extends Event
{

    public function __construct()
    {
        parent::__construct('LogoutEvent');
    }
}