<?php

namespace domain\Waterball\Event;

use domain\FSM\Event\Event;

class CommandEvent extends Event
{

    public function __construct()
    {
        parent::__construct('CommandEvent');
    }
}