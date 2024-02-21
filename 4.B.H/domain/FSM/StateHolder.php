<?php

namespace domain\FSM;

use domain\Event;
use domain\State;

abstract class StateHolder
{
    // TODO 這邊也是用猜的可能過度設計
    abstract public function requestEvent(): Event;

    public function __construct(
        protected State $state
    )
    {
    }

    public function addStates(array $states): void
    {
        foreach ($states as $state) {
            $state->setHolder($this);
        }
    }

    public function findState(string $name): State
    {
        return $this->states[$name];
    }

    public function getState(): State
    {
        return $this->state;
    }

    public function setState(State $state): void
    {
        $this->state = $state;
    }

}