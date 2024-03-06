<?php

namespace domain\FSM;

class ActionProcessor extends Action
{
    protected Transition $next;

    public function process(): void
    {
        $this->getEventAndTryAction();
        $this->next->process();
    }
}