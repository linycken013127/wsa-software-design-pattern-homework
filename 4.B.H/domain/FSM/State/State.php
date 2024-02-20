<?php

namespace domain\FSM\State;

use domain\FSM\Trigger\Trigger;

class State
{

    /**
     * @param string $name
     * @param Trigger[] $triggers
     */
    public function __construct(string $name, array $triggers)
    {
    }
}