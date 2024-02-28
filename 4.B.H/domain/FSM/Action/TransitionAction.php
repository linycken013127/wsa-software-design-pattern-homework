<?php

namespace domain\FSM\Action;

use domain\FSM\Action;
use domain\FSM\Event;
use domain\FSM\FiniteStateMachine;
use domain\FSM\Guard;

class TransitionAction extends Action
{

    public function __construct(
        protected Event            $event,
        protected Guard            $guard,
        private readonly string             $state,
        private readonly FiniteStateMachine $fsm)
    {
        parent::__construct($event, $guard);
    }

    public function action(): void
    {
        $this->fsm->setState($this->fsm->findState($this->state));
    }
}