<?php

namespace domain\FSM\Action;

use domain\FSM\Event\Event;
use domain\FSM\FiniteStateMachine;
use domain\FSM\Guard\Guard;
use domain\FSM\State\State;

class Transaction extends Action
{
    protected FiniteStateMachine $FSM;
    public function __construct(
        protected State              $fromState,
        protected State              $toState,
        protected Event              $event,
        protected Guard              $guard,
        protected array              $beforeActions = []
    ) {
        parent::__construct($event, $guard);
    }

    public function execute(?Event $event=null): void
    {
        $this->beforeExecute();

        if ($event === null) {
            $event = $this->FSM->requestEvent($this->event);
            if ($this->trigger($event)) {
                $this->FSM->setState($this->toState);
            }
        } else {
            if ($this->trigger($event)) {
                $this->FSM->setState($this->toState);
            }
        }
    }

    public function getFSM(): FiniteStateMachine
    {
        return $this->FSM;
    }

    public function setFSM(FiniteStateMachine $FSM): void
    {
        $this->FSM = $FSM;
    }

    public function getFromState(): State
    {
        return $this->fromState;
    }

    public function getToState(): State
    {
        return $this->toState;
    }

    public function beforeExecute(): void
    {
        foreach ($this->beforeActions as $action) {
            $event = $this->FSM->requestEvent($action->getEvent());

            if ($this->trigger($event)) {
                $action->execute($event);
            }
        }
    }

}