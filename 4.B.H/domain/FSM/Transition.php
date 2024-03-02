<?php

namespace domain\FSM;

class Transition extends Action implements TransitionAction
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
}