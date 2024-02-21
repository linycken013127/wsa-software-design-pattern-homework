<?php

namespace domain\Waterball\Action;

use domain\FSM\Action\Action;
use domain\FSM\Event\Event;

class RecordReplayAction extends Action
{

    public function execute(Event $event): void
    {
        dump('將廣播內容print出來');
    }
}