<?php

namespace domain\Waterball;

use domain\FSM\Event\Event;
use domain\FSM\Event\EventGetterInterface;
use domain\Waterball\Event\OnlineMemberCountEvent;

class WaterballEventGetter implements EventGetterInterface
{

    public function __construct()
    {
    }


    public function requestEvent(Event $event): Event
    {
        // TODO: 先寫死POC用
        // 這邊要去找對應的Event取得資訊
        $event = new OnlineMemberCountEvent();
        $event->setValue(9);
        return $event;
    }
}