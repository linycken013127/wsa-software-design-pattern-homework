<?php

namespace domain;

use domain\FSM\Event\Event;
use domain\FSM\Event\EventGetterInterface;
use domain\FSM\FiniteStateMachine;
use domain\FSM\State\State;

class FSMFacade
{
    private FiniteStateMachine $FSM;


    public function __construct(
        private readonly State $initState,
        private readonly array $transactions,
        private readonly EventGetterInterface $eventGetter,
    )
    {
        $states = $this->getStatusFromTransactions($transactions);
        $this->initFSM($this->initState, $states, $this->transactions, $this->eventGetter);

        $this->initTransactions($this->transactions);
    }

    private function initFSM(State $initState, array $states, array $transactions, EventGetterInterface $eventGetter): void
    {
        $this->FSM = new FiniteStateMachine(
            $initState,
            $states,
            $eventGetter,
        );
        $this->initTransactions($transactions);
        $this->FSM->start();
    }

    public function trigger(Event $event): void
    {
        $this->FSM->trigger($event);
    }

    public function getFSMState(): string
    {
        return $this->FSM->getState()->getName();
    }

    private function initTransactions(array $transactions): void
    {
        foreach ($transactions as $transaction) {
            $transaction->setFSM($this->FSM);
        }
    }

    private function getStatusFromTransactions(array $transactions): array
    {
        $states = [];
        foreach ($transactions as $transaction) {
            if (! in_array($transaction->getFromState()->getName(), array_keys($states))) {
                $states[$transaction->getFromState()->getName()] = $transaction->getFromState();
            }
            if (! in_array($transaction->getToState()->getName(), array_keys($states))) {
                $states[$transaction->getToState()->getName()] = $transaction->getToState();
            }
        }
        return $states;
    }

}