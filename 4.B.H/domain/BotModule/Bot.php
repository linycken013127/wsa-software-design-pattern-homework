<?php

namespace domain\BotModule;

use domain\State;

class Bot
{

    /**
     * @param State $normal
     */
    public function __construct(
        private State $state
    )
    {
        $event = $this->state->getEntryAction()?->getEvent();
        $event?->setValue(9);
        $this->setState($this->state->entryAction($event));
    }

    /**
     * @param State $state
     */
    public function setState(State $state): void
    {
        $this->state = $state;
    }
}