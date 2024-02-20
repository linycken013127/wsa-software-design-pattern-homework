<?php

namespace domain\FSM\Action;

use domain\Event\Event;
use domain\FSM\Guard\Guard;
use domain\FSM\State;

class Transition extends Action
{

    public function __construct(
        private readonly State $fromState,
        Event $event,
        Guard $guard,
        private readonly State $toState
    )
    {
        parent::__construct($event, $guard);
    }

    public function execute(Event $event)
    {
        if ($event->getName() === $this->event->getName() && $this->guard->guard($event)) {
            $this->fromState->toState($this->toState);
        }
    }
}