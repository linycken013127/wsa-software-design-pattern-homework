<?php

namespace domain\FSM;

class State
{
    public function __construct(
        private readonly string $name,
        private readonly Action $entryAction,
        private readonly Action $exitAction,
        private readonly ?State $parent = null,
        private readonly array $children = [],
    )
    {
    }

    public function entryAction(): void
    {
        $this->parent?->entryAction();
        $this->entryAction->action();
    }

    public function exitAction(): void
    {
        $this->exitAction->action();
        $this->parent?->exitAction();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}