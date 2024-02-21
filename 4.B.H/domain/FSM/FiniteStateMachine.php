<?php

namespace domain\FSM;

use domain\Event;
use domain\State;

class FiniteStateMachine extends StateHolder
{
    public function __construct(
        State                          $state,
        protected array                $states,
        protected EventGetterInterface $eventGetter
    )
    {
        parent::__construct($state);
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
            $state->setHolder($this);
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
}