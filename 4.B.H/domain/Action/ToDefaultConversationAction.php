<?php

namespace domain\Action;

use domain\Event\OnlineMemberEvent;
use domain\FSM\Action;
use domain\FSM\Event;
use domain\FSM\Guard;
use domain\FSM\State;
use domain\Guard\BelowGuard;

class ToDefaultConversationAction extends Action
{
    public function __construct(
        Event $event,
        Guard $guard,
        protected readonly State $toState
    )
    {
        parent::__construct($event, $guard);
    }

    public function process(): void
    {
        $this->state->getFsm()->switchState($this->toState);
    }
}