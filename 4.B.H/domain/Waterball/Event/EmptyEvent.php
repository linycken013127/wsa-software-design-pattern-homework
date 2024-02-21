<?php

namespace domain\Waterball\Event;

use domain\FSM\Event\Event;

class EmptyEvent extends Event
{
    public function __construct()
    {
        parent::__construct('EmptyEvent');
    }
}