<?php

use domain\FSM\Action;
use domain\FSM\Action\TransitionAction;
use domain\FSM\FiniteStateMachine;
use domain\FSM\State;
use domain\WSA\Event\BelowNumberGuard;
use domain\WSA\Event\OnlineMemberCountEvent;
use domain\WSA\Guard\OverNumberGuard;

require_once __DIR__ . '/vendor/autoload.php';


$fsm = new FiniteStateMachine();


// normal
$normal = new State(
    'normal',
    new TransitionAction(new OnlineMemberCountEvent(), new OverNumberGuard(10), 'interacting', $fsm),
    new TransitionAction(new OnlineMemberCountEvent(), new BelowNumberGuard(10), 'default', $fsm),
);

// interacting
$interacting = new State(
    'interacting',
    new TransitionAction(new OnlineMemberCountEvent(), new OverNumberGuard(10), 'interacting', $fsm),
    new TransitionAction(new OnlineMemberCountEvent(), new BelowNumberGuard(10), 'default', $fsm),
);

// default
$default = new State(
    'default',
    new TransitionAction(new OnlineMemberCountEvent(), new OverNumberGuard(10), 'interacting', $fsm),
    new TransitionAction(new OnlineMemberCountEvent(), new BelowNumberGuard(10), 'default', $fsm),
);
$fsm->setState($normal)->addStates([$default, $interacting]);

$fsm->init();

dd($fsm->getState()->getName());

