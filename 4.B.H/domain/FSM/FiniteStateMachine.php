<?php

namespace domain\FSM;

use domain\Event\OnlineMemberEvent;

class FiniteStateMachine
{

    public function __construct(
        private State $state,
        private readonly array $transitions,
    )
    {
        $this->state->setFsm($this);
        $this->initTransitions();

        $this->state->entryAction();
    }

    public function eventGetter(Event $event): Event
    {
        // 問主體 回傳帶有 Value 的 Event
        dump('還沒寫');
//        return $event;
        return new OnlineMemberEvent(11);
    }

    public function switchState(State $toState): void
    {
        $this->state->exitAction();
        $this->state = $toState;
        $this->state->entryAction();
    }

    public function getState(): State
    {
        return $this->state;
    }

    private function initTransitions(): void
    {
        foreach ($this->transitions as $transition) {
            $transition->getFromState()?->setFsm($this);
            $transition->getToState()?->setFsm($this);
        }
    }
}