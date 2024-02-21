<?php

namespace domain\FSM\Guard;

use domain\FSM\Event\Event;

abstract class Guard
{
    abstract public function guard(Event $event): bool;
}