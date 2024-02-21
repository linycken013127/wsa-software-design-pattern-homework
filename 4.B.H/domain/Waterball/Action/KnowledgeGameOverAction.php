<?php

namespace domain\Waterball\Action;

use domain\FSM\Action\Action;
use domain\FSM\Event\Event;

class KnowledgeGameOverAction extends Action
{

    public function execute(Event $event): void
    {
        dump('遊戲結束');
    }
}