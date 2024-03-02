<?php

namespace domain\FSM;

class ActionProcessor implements TransitionAction
{
    private TransitionAction $next;

    public function __construct()
    {
    }

    public function process(): void
    {
        $this->next->process();
    }
}