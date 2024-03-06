<?php

namespace domain\Action;

use domain\FSM\Action;

class SendMessageAction extends Action
{

    public function process(): void
    {
        dump('傳訊息到聊天室');
    }
}