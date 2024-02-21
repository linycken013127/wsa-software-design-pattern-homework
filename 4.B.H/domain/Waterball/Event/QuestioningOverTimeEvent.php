<?php

namespace domain\Waterball\Event;

use domain\FSM\Event\Event;

class QuestioningOverTimeEvent extends Event
{

    public function __construct()
    {
        parent::__construct('QuestioningOverTimeEvent');
    }


}