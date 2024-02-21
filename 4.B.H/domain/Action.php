<?php

namespace domain;

abstract class Action
{
    public function __construct(
        protected Event $event,
        protected Guard $guard
    )
    {
    }

    public function trigger(Event $event): bool
    {
        return $event->getName() === $this->event->getName() && $this->guard->guard($event);
    }
    abstract public function execute(Event $event): void;

    /**
     * @return Event
     */
    public function
    getEvent(): Event
    {
        return $this->event;
    }

}