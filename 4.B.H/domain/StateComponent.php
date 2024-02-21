<?php

namespace domain;

abstract class StateComponent
{
    protected array $actions = [];

    public function __construct(
        protected readonly string $name,
        protected ?StateComponent $parent = null,
        protected ?Action $entryAction = null,
        protected ?Action $exitAction = null,
    )
    {

    }

    public function entryAction(Event $event): StateComponent
    {
        return $this->entryAction?->execute($event);
    }
    public function exitAction(Event $event): StateComponent
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
}