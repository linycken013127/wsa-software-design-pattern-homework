<?php

namespace domain;

class SendMessageEvent extends Event
{
    public function __construct(string $value)
    {
        parent::__construct('SendMessageEvent');
        $this->value = $value;
    }
}