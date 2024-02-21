<?php

namespace domain\TestFSMClass;

use domain\FSM\Action\Action;
use domain\FSM\Event\Event;

class SendMessageAction extends Action
{

    public function execute(Event $event): void
    {
        dump('get send message');
    }
}