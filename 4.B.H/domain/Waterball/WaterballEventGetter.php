<?php

namespace domain\Waterball;

use domain\Event;
use domain\FSM\EventGetterInterface;
use domain\OnlineMemberCountEvent;

class WaterballEventGetter implements EventGetterInterface
{

    public function __construct()
    {
    }


    public function requestEvent(): Event
    {
        // TODO: 先寫死POC用
        $event = new OnlineMemberCountEvent();
        $event->setValue(9);
        return $event;
    }
}