<?php

namespace domain;

abstract class StateComponent
{

    public function __construct(
        protected readonly string $name,
        protected ?StateComponent $parent = null
    )
    {

    }

    abstract public function entryAction();
    abstract public function exitAction();

    public function getParent(): ?StateComponent
    {
        return $this->parent;
    }

    public function setParent(?StateComponent $parent): void
    {
        $this->parent = $parent;
    }
}