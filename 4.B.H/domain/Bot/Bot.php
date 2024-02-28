<?php

namespace domain\Bot;

use domain\FSM\Event\Event;
use domain\FSMFacade;

class Bot
{
    public function __construct(
        private FSMFacade $fsm
    )
    {
    }

    public function listener(Event $event): void
    {
        $this->fsm->trigger($event);
    }
}