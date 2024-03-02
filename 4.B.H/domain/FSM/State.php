<?php

namespace domain\FSM;

class State
{
    private FiniteStateMachine $fsm;

    public function __construct(
        protected readonly string $name,
        protected readonly ?Action $entryAction,
        protected readonly ?Action $exitAction,
        protected readonly ?array $actions,
    )
    {
        if ($entryAction instanceof Transition) {
            $entryAction->setFromState($this);
        }
        $this->entryAction?->setState($this);
        $this->exitAction?->setState($this);
        foreach ($this->actions as $action) {
            $action->setState($this);
        }

    }

    public function entryAction(): void
    {
        $this->entryAction->getEventAndTryAction();
    }

    public function exitAction(): void
    {
        $this->exitAction->getEventAndTryAction();
    }

    public function listen(Event $event): void
    {
        foreach ($this->actions as $action) {
            $action->tryAction($event);
        }
    }

    public function getFsm(): FiniteStateMachine
    {
        return $this->fsm;
    }

    public function setFsm(FiniteStateMachine $fsm): void
    {
        $this->fsm = $fsm;
    }

    public function getName(): string
    {
        return $this->name;
    }
}