<?php

namespace domain;

class SendMessageAction extends Action
{

    public function execute(Event $event): void
    {
        dump('get send message');
    }
}