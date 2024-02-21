<?php

namespace domain;

use domain\BotModule\Bot;
use Exception;
use RuntimeException;

class Transition extends Action
{

    public function __construct(
        protected StateComponent $fromState,
        protected Event $event,
        protected Guard $guard,
        protected StateComponent $toState,
        protected ?StateComponent $elseToState,
        protected Bot $bot,
    )
    {
        parent::__construct($event, $guard);
    }

    public function execute(): StateComponent
    {
        // 問bot Event為何
        if ($this->trigger($event)) {
            return $this->toState;
        }
        if ($this->elseToState) {
            return $this->elseToState;
        }
        throw new RuntimeException('No transition is triggered');
    }
}