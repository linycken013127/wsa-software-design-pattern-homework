<?php

namespace domain\FSM;

class FiniteStateMachine
{
    public function __construct(
        private State $state,
        private readonly array $transitions,
        private readonly array $states
    )
    {
        $this->addState($states);
        $this->state->entryAction();
    }

    public function addState(array $states): void
    {
        foreach ($states as $state) {
            $state->setFsm($this);
        }
    }

    public function transition(State $state): void
    {
        $this->state->exitAction();
        $this->setState($state);
        $this->state->entryAction();
    }

    /**
     * @return State
     */
    public function getState(): State
    {
        return $this->state;
    }

    /**
     * @param State $state
     */
    public function setState(State $state): void
    {
        $this->state = $state;
    }

    public function getTransitions(): array
    {
        return $this->transitions;
    }

    public function getStates(): array
    {
        return $this->states;
    }
}