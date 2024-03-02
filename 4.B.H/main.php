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
use domain\Guard\OverGuard;
use domain\Guard\TrueGuard;

require_once __DIR__ . '/vendor/autoload.php';

$interacting = new State('Interacting', null, null, [new SendMessageAction(new MessageEvent(), new TrueGuard())]);
$toInteracting = new Transition(null, new OnlineMemberEvent(), new OverGuard(10), null, $interacting);
$defaultConversation = new State('DefaultConversation', $toInteracting, null, [new SendMessageAction(new MessageEvent(), new TrueGuard())]);

$toDC = new Transition(null, new OnlineMemberEvent(), new TrueGuard(), null, $defaultConversation);
$normal = new State('Normal', $toDC, null, [new SendMessageAction(new MessageEvent(), new TrueGuard())]);

$fsm = new FiniteStateMachine($normal, [
    $toDC,
    $toInteracting
]);

dd($fsm->getState()->getName());




