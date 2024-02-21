<?php

namespace domain\Waterball\Event;

use domain\FSM\Event\Event;

class LoginEvent extends Event
{

    public function __construct()
    {
        parent::__construct('LoginEvent');
    }
}