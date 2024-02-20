<?php

namespace domain\FSM;

use domain\FSM\Action\Action;

class State
{
    private FiniteStateMachine $fsm;

    public function __construct(
        private readonly string $name,
        private ?Action $entryAction = null,
        private ?Action $exitAction = null,
    )
    {
    }

    public function entryAction(): void
    {
        $this->entryAction?->execute($this->entryAction->getEvent());
    }

    public function exitAction(): void
    {
        $this->exitAction?->execute($this->exitAction->getEvent());
    }

    public function toState(State $state): void
    {
        $this->fsm->transition($state);
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return FiniteStateMachine
     */
    public function getFsm(): FiniteStateMachine
    {
        return $this->fsm;
    }

    /**
     * @param FiniteStateMachine $fsm
     */
    public function setFsm(FiniteStateMachine $fsm): void
    {
        $this->fsm = $fsm;
    }

    /**
     * @return Action|null
     */
    public function getEntryAction(): ?Action
    {
        return $this->entryAction;
    }

    /**
     * @param Action|null $entryAction
     */
    public function setEntryAction(?Action $entryAction): void
    {
        $this->entryAction = $entryAction;
    }

    /**
     * @return Action|null
     */
    public function getExitAction(): ?Action
    {
        return $this->exitAction;
    }

    /**
     * @param Action|null $exitAction
     */
    public function setExitAction(?Action $exitAction): void
    {
        $this->exitAction = $exitAction;
    }
}