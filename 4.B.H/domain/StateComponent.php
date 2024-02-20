<?php

namespace domain;

abstract class StateComponent
{
    protected array $actions = [];

    public function __construct(
        protected readonly string $name,
        protected ?StateComponent $parent = null
    )
    {

    }

    abstract public function entryAction();
    abstract public function exitAction();

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
}