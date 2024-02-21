<?php

namespace domain;

class BelowTenGuard extends Guard
{

    public function __construct()
    {
    }

    public function guard(Event $event): bool
    {
        return $event->getValue() < 10;
    }
}