<?php

namespace domain\FSM\Event;

interface EventGetterInterface
{
    public function requestEvent(Event $event): Event;
}