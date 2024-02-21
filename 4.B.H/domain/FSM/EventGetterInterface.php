<?php

namespace domain\FSM;

use domain\Event;

interface EventGetterInterface
{
    public function requestEvent(): Event;
}