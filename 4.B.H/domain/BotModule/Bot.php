<?php

namespace domain\BotModule;

use domain\FSM\FiniteStateMachine;
use domain\FSM\State\State;

class Bot extends FiniteStateMachine
{
    // 這邊已經用了Facade 要在想一下 Forces
    /**
     * @param State $normal
     */
    public function __construct(
    )
    {
        $event = $this->state->getEntryAction()?->getEvent();
        $event?->setValue(9);
        $this->setState($this->state->entryAction($event));
    }

}