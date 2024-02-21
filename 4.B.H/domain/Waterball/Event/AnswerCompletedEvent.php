<?php

namespace domain\Waterball\Event;

use domain\FSM\Event\Event;

class AnswerCompletedEvent extends Event
{

    public function __construct()
    {
        parent::__construct('AnswerCompletedEvent');
    }
}