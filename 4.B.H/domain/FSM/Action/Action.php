<?php

namespace domain\FSM\Action;


use domain\Event\Event;
use domain\FSM\Guard\Guard;

abstract class Action
{
    public function __construct(
        protected readonly Event $event,
        protected readonly Guard $guard
    )
    {
    }

    abstract public function execute(Event $event);

    /**
     * @return Event
     */
    public function getEvent(): Event
    {
        return $this->event;
    }
}