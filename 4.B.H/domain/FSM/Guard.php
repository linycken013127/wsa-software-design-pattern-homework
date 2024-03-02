<?php

namespace domain\FSM;

interface Guard
{
    public function guard(Event $event): bool;
}