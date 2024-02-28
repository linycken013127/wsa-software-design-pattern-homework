<?php

namespace domain\FSM;

class FiniteStateMachine
{
    private State $state;
    private array $states = [];

    public function __construct()
    {
    }

    public function init(): void
    {
        $this->state->entryAction();
    }

    public function addState(State $state): void
    {
        $this->states[$state->getName()] = $state;
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
     * @return FiniteStateMachine
     */
    public function setState(State $state): FiniteStateMachine
    {
        $this->state = $state;
        return $this;
    }

    public function addStates(array $array): void
    {
        foreach ($array as $state) {
            $this->addState($state);
        }
    }

    public function findState(string $state): State
    {
        return $this->states[$state];
    }
}