<?php

namespace domain\FSM;

use domain\FSM\Event\Event;
use domain\FSM\Event\EventGetterInterface;
use domain\FSM\State\State;

class FiniteStateMachine
{
    public function __construct(
        protected State                $state,
        protected array                $states,
        protected EventGetterInterface $eventGetter
    )
    {

    }

    public function start(): void
    {
        $this->state->entryAction();
    }

    // TODO 這裡猜轉接
    public function requestEvent(Event $event): Event
    {
        return $this->eventGetter->requestEvent($event);
    }

    public function trigger(Event $event): void
    {
        $this->state->actionHandle($event);
    }

    public function setState(State $state): void
    {
        $this->state = $state;
    }

    public function getState(): State
    {
        return $this->state;
    }

}