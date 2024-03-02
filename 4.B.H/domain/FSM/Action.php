<?php

namespace domain\FSM;

abstract class Action
{
    protected State $state;
    public function __construct(
        protected Event $event,
        protected Guard $guard,
    )
    {
    }

    abstract public function process(): void;

    public function trigger(Event $event): bool
    {
        return $event->getName() === $this->event->getName() && $this->guard->guard($event);
    }

    public function tryAction(Event $event): void
    {
        if ($this->trigger($event)) {
            $this->process();
        }
    }

    public function getEventAndTryAction(): void
    {

        $event = $this->state->getFsm()->eventGetter($this->event);
        $this->tryAction($event);
    }

    public function getState(): State
    {
        return $this->state;
    }

    public function setState(State $state): void
    {
        $this->state = $state;
    }
}