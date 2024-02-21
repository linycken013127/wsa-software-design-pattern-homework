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
        $this->addStates($this->states);
    }

    public function fsmStart(): void
    {
        dump('start state:');
        dump($this->state->getName());
        $this->state->entryAction();
    }

    public function addStates(array $states): void
    {
        foreach ($states as $state) {
            $state->setFSM($this);
            $this->states[$state->getName()] = $state;
        }
    }

    // TODO 這裡猜轉接
    public function requestEvent(): Event
    {
        return $this->eventGetter->requestEvent();
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