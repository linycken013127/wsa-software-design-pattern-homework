<?php

use domain\Action\SendMessageAction;
use domain\Event\CommandEvent;
use domain\Event\EmptyEvent;
use domain\Event\MessageEvent;
use domain\Event\OnlineMemberEvent;
use domain\Event\StopBroadcastingEvent;
use domain\FSM\FiniteStateMachine;
use domain\FSM\State;
use domain\FSM\Transition;
use domain\Guard\LessThanOrEqualGuard;
use domain\Guard\StringGuard;
use domain\Guard\TrueGuard;

require_once __DIR__ . '/vendor/autoload.php';

$interacting = new State('Interacting', null, null, [new SendMessageAction(new MessageEvent(), new TrueGuard())]);
$fromDefaultConversationToInteracting = new Transition(null, new OnlineMemberEvent(), new LessThanOrEqualGuard(10), null, $interacting);
$defaultConversation = new State('DefaultConversation', $fromDefaultConversationToInteracting, null, [new SendMessageAction(new MessageEvent(), new TrueGuard())]);

$fromNormalToDefaultConversation = new Transition(null, new OnlineMemberEvent(), new TrueGuard(), null, $defaultConversation);
$normal = new State('Normal', $fromNormalToDefaultConversation, null, [new SendMessageAction(new MessageEvent(), new TrueGuard())]);

$fromRecordToWaiting = new Transition(null, new EmptyEvent(), new TrueGuard(), null, $normal);
$record = new State('Record', $fromRecordToWaiting, null);
$fromNormalToRecord = new Transition($normal, new CommandEvent(), new StringGuard('record'), null, $record);
// TODO 子狀態要有所有父的行為
$normal->setSubStates([$interacting, $defaultConversation]);
$normal->addActions([$fromNormalToRecord]);

$fsm = new FiniteStateMachine($normal, [
    $fromNormalToDefaultConversation,
    $fromDefaultConversationToInteracting,
    $fromRecordToWaiting,
    $fromNormalToRecord,
]);


dump($fsm->getState()->getName());

$fsm->listen(new CommandEvent('record'));
dd($fsm->getState()->getName());
