<?php

namespace domain\FSM\Action;

use domain\FSM\Event\Event;
use domain\FSM\FiniteStateMachine;
use domain\FSM\Guard\Guard;
use domain\FSM\State\State;

class Transaction extends Action
{
    public function __construct(
        protected FiniteStateMachine $fsm,
        protected State              $fromState,
        protected State              $toState,
        protected Event              $event,
        protected Guard              $guard
    ) {
        parent::__construct($event, $guard);
    }

    public function execute(?Event $event=null): void
    {
        if ($event === null) {
            $event = $this->fsm->requestEvent();

            dump("event");
            dump($event);
            if ($this->trigger($event)) {
                dump('check holder');
                $this->fsm->setState($this->toState);
            }
        } else {
            if ($this->trigger($event)) {
                $this->fsm->setState($this->toState);
            }
        }
    }

}