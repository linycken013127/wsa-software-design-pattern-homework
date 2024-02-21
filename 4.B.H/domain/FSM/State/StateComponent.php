<?php

namespace domain\FSM\State;

use domain\FSM\Action\Action;
use domain\FSM\Event\Event;
use domain\FSM\FiniteStateMachine;

abstract class StateComponent
{
    protected FiniteStateMachine $FSM;

    public function __construct(
        protected readonly string $name,
        protected ?StateComponent $parent = null,
        protected ?Action $entryAction = null,
        protected ?Action $exitAction = null,
        protected ?array $actions = []
    )
    {
    }

    public function entryAction(): ?StateComponent
    {
        return $this->entryAction?->execute();
    }
    public function exitAction(Event $event): ?StateComponent
    {
        return $this->exitAction?->execute($event);
    }

    public function addActions(array $actions): void
    {
        foreach ($actions as $action) {
            $this->actions[] = $action;
        }
    }

    public function getParent(): ?StateComponent
    {
        return $this->parent;
    }

    public function setParent(?StateComponent $parent): void
    {
        $this->parent = $parent;
    }

    /**
     * @param Action|null $entryAction
     */
    public function setEntryAction(?Action $entryAction): void
    {
        $this->entryAction = $entryAction;
    }

    /**
     * @param Action|null $exitAction
     */
    public function setExitAction(?Action $exitAction): void
    {
        $this->exitAction = $exitAction;
    }

    /**
     * @return Action|null
     */
    public function getEntryAction(): ?Action
    {
        return $this->entryAction;
    }

    public function setFSM(FiniteStateMachine $FSM): void
    {
        $this->FSM = $FSM;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getActions(): ?array
    {
        return $this->actions;
    }

    public function setActions(?array $actions): void
    {
        $this->actions = $actions;
    }
}