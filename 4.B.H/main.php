<?php

use domain\Action\SendMessageAction;
use domain\Action\ToDefaultConversationAction;
use domain\Event\MessageEvent;
use domain\Event\OnlineMemberEvent;
use domain\FSM\ActionProcessor;
use domain\FSM\FiniteStateMachine;
use domain\FSM\State;
use domain\FSM\Transition;
use domain\Guard\BelowGuard;
use domain\Guard\TrueGuard;

require_once __DIR__ . '/vendor/autoload.php';

$defaultConversation = new State('DefaultConversation', null, null, [new SendMessageAction(new MessageEvent(), new TrueGuard())]);
$interacting = new State('Interacting', null, null, [new SendMessageAction(new MessageEvent(), new TrueGuard())]);

//new ToDefaultConversationAction(new OnlineMemberEvent(), new BelowGuard(10), $defaultConversation)

$toDC = new Transition(null, new OnlineMemberEvent(), new BelowGuard(10), null, $defaultConversation);
$normal = new State('Normal', $toDC, null, [new SendMessageAction(new MessageEvent(), new TrueGuard())]);

$fsm = new FiniteStateMachine($normal, [
    $toDC
]);

dd($fsm->getState()->getName());




