<?php

namespace domain\FSM\Guard;


use domain\FSM\Event\Event;

abstract class Guard
{

    /**
     * @param Event $param
     */
    public function __construct(Event $param)
    {
    }
}