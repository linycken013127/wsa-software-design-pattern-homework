<?php

namespace domain\FSM;

interface Guard
{
    public function satisfyCriteria(Event $event): bool;
}