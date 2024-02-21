<?php

namespace domain\Waterball;

use domain\FSM\Event\Event;
use domain\FSM\Event\EventGetterInterface;
use domain\Waterball\Event\OnlineMemberCountEvent;

class WaterballEventGetter implements EventGetterInterface
{
    private ?Event $event = null;

    public function __construct()
    {
    }


    public function requestEvent(Event $event): Event
    {
        // TODO: 先寫死POC用
        if ($this->event === null) {
            $event = new OnlineMemberCountEvent();
            $event->setValue(9);
            $this->setEvent($event);
        }

        return $this->event;
    }

    public function getEvent(): Event
    {
        return $this->event;
    }

    public function setEvent(Event $event): void
    {
        $this->event = $event;
    }
}