<?php

namespace domain\FSM;

class Transition extends ActionProcessor
{

    public function __construct(
        private ?State $fromState,
        Event $event,
        Guard $guard,
        private readonly ?array $actions,
        private readonly State $toState,
    )
    {
        parent::__construct($event, $guard);
    }

    public function process(): void
    {
        $this->fromState->getFsm()->switchState($this->toState);
    }

    public function setFromState(?State $fromState): void
    {
        $this->fromState = $fromState;
    }

    public function getFromState(): ?State
    {
        return $this->fromState;
    }

    public function getToState(): State
    {
        return $this->toState;
    }
}