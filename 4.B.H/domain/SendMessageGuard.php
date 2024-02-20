<?php

namespace domain;

class SendMessageGuard extends Guard
{
    public function guard(Event $event): bool
    {
        return true;
    }
}