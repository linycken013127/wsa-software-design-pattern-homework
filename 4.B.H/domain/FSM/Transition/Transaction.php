<?php

namespace domain\FSM\Transition;

use domain\Action;
use domain\Event;
use domain\FSM\StateHolder;
use domain\Guard;
use domain\State;

class Transaction extends Action
{
    public function __construct(
        protected StateHolder $holder,
        protected State       $fromState,
        protected State       $toState,
        protected Event       $event,
        protected Guard       $guard
    ) {
        parent::__construct($event, $guard);
    }

    public function execute(?Event $event=null): void
    {
        if ($event === null) {
            $event = $this->holder->requestEvent();

            dump("event");
            dump($event);
            if ($this->trigger($event)) {
                dump('check holder');
                $this->holder->setState($this->toState);
            }
        } else {
            if ($this->trigger($event)) {
                $this->holder->setState($this->toState);
            }
        }
    }

}