<?php

use domain\Bot\Bot;
use domain\FSM\Action\Transaction;
use domain\FSM\Guard\EqualIntGuard;
use domain\FSM\Guard\EqualStringGuard;
use domain\FSM\Guard\TrueGuard;
use domain\FSM\State\State;
use domain\FSMFacade;
use domain\Waterball\Action\KnowledgeGameOverAction;
use domain\Waterball\Action\RecordReplayAction;
use domain\Waterball\Community;
use domain\Waterball\Event\AnswerCompletedEvent;
use domain\Waterball\Event\CommandEvent;
use domain\Waterball\Event\EmptyEvent;
use domain\Waterball\Event\BroadcastingStateEvent;
use domain\Waterball\Event\LoginEvent;
use domain\Waterball\Event\LogoutEvent;
use domain\Waterball\Event\OnlineMemberCountEvent;
use domain\Waterball\Event\QuestioningOverTimeEvent;
use domain\Waterball\Event\StartedEvent;
use domain\Waterball\Guard\BelowTenGuard;
use domain\Waterball\Guard\OverTenGuard;
use domain\Waterball\WaterballEventGetter;

require_once __DIR__ . '/vendor/autoload.php';

// normal 進入時 發生 線上人數 < 10 觸發 轉移(Default Conversation)
// normal 進入時 發生 線上人數 >= 10 觸發 轉移(Interacting)
// normal 發生 指令 == king 觸發 轉移(KnowledgeKing)
// normal 發生 指令 == record 觸發 轉移(Record)
// Default Conversation 發生 傳遞訊息 觸發 傳遞訊息並標記成員()
// Default Conversation 發生 發文 觸發 文章留言並標記成員()
// 繼承 normal 發生 線上人數 >= 10 觸發 轉移(Interacting)
// Interacting 發生 傳遞訊息 觸發 傳遞訊息並標記成員() // 訊息不同於 default
// Interacting 發生 發文 觸發 文章留言並標記成員() // 訊息不同於 default
// 繼承 normal 發生 線上人數 < 10 觸發 轉移(Default Conversation)

// Record 進入時 發生 開始廣播 觸發 轉移(Recording)，否則會直接進入等待狀態。
// Record 進入時 發生 沒有廣播 觸發 轉移(Waiting)
// 繼承 Waiting 發生 開始廣播 觸發 轉移(Recording)
// Recording 發生 傳送語音訊息 觸發 語音訊息文字記錄()
// Record 發生 指令 == stop-recording 觸發 將紀錄語音訊息標記並傳送至聊天室() 轉移(Normal)

// Knowledge 進入時 觸發 轉移(Questioning)
// Knowledge 發生 指令 == king-stop 觸發 轉移(Normal)
// Questioning 發生 有人答對 觸發 傳送Congrats! you got the answer!() 出下一題()
// Questioning 發生 題目答完 觸發 轉移(ThanksForJoining)
// Questioning 發生 出題後1小時 觸發 stop() 轉移(ThanksForJoining)
// ThanksForJoining 進入時 發生 沒人廣播 進行廣播() 語音訊息公布遊戲結果()
// ThanksForJoining 進入時 發生 有人廣播 聊天訊息公布遊戲結果()
// ThanksForJoining 發生 發送遊戲結果後20() 觸發 轉移(Normal)
// ThanksForJoining 發生 指令 == play again 觸發 傳遞訊息(KnowledgeKing is gonna start again!) 轉移(Questioning)

$onlineMemberEvent = new OnlineMemberCountEvent();
$onlineMemberEvent->setValue(9);

$normal = new State(
    name: 'Normal',
    parent: null,
);
$defaultConversation = new State('DefaultConversation', $normal);
$interacting = new State('Interacting', $normal);

$record = new State('Record', null);
$waiting = new State('Waiting', $record);
$recording = new State('Recording', $record);

$knowledge = new State('KnowledgeKing', null);
$questioning = new State('Questing', $knowledge);
$thanksForJoining = new State('ThanksForJoining', $knowledge);

$normalEntryAction = new Transaction(
    fromState: $normal,
    toState: $defaultConversation,
    event: new EmptyEvent(),
    guard: new TrueGuard()
);
$normal->setEntryAction($normalEntryAction);

$defaultConversationToInteractingAction = new Transaction(
    fromState: $defaultConversation,
    toState: $interacting,
    event: new LoginEvent(),
    guard: new OverTenGuard()
);

$interactingToDefaultConversationAction = new Transaction(
    fromState: $interacting,
    toState: $defaultConversation,
    event: new LogoutEvent(),
    guard: new BelowTenGuard()
);

$normalToRecordAction = new Transaction(
    fromState: $normal,
    toState: $record,
    event: new CommandEvent(),
    guard: new EqualStringGuard('record')
);


$recordEntryAction = new Transaction(
    fromState: $normal,
    toState: $waiting,
    event: new EmptyEvent(),
    guard: new TrueGuard()
);
$waitingToRecordingAction = new Transaction(
    fromState: $waiting,
    toState: $recording,
    event: new BroadcastingStateEvent(),
    guard: new EqualStringGuard('go broadcasting')
);

$recordingToWaitingAction = new Transaction(
    fromState: $recording,
    toState: $normal,
    event: new BroadcastingStateEvent(),
    guard: new EqualStringGuard('stop broadcasting')
);

$action = new RecordReplayAction(
    event: new CommandEvent(),
    guard: new EqualStringGuard('stop-recording')
);

$recordToNormalExitAction = new Transaction(
    fromState: $record,
    toState: $normal,
    event: new CommandEvent(),
    guard: new EqualStringGuard('stop-recording'),
    beforeActions: [
        $action
    ]
);

$normalToKnowledgeKingAction = new Transaction(
    fromState: $normal,
    toState: $knowledge,
    event: new CommandEvent(),
    guard: new EqualStringGuard('king')
);

$knowledgeEntryAction = new Transaction(
    fromState: $normal,
    toState: $knowledge,
    event: new EmptyEvent(),
    guard: new TrueGuard()
);

$questioningToThanksForJoiningAction = new Transaction(
    fromState: $questioning,
    toState: $thanksForJoining,
    event: new AnswerCompletedEvent(),
    guard: new EqualIntGuard(3)
);

$questioningOverTimeToNormalAction = new Transaction(
    fromState: $questioning,
    toState: $normal,
    event: new QuestioningOverTimeEvent(),
    guard: new EqualIntGuard(60)
);

$thanksForJoiningToQuestioningAction = new Transaction(
    fromState: $thanksForJoining,
    toState: $questioning,
    event: new CommandEvent(),
    guard: new EqualStringGuard('play again')
);

$knowledgeToNormalAction = new Transaction(
    fromState: $knowledge,
    toState: $normal,
    event: new CommandEvent(),
    guard: new EqualStringGuard('king-stop'),
    beforeActions: [
        new KnowledgeGameOverAction(
            event: new EmptyEvent(),
            guard: new TrueGuard(),
        )
    ]
);

$watterballEventGetter = new WaterballEventGetter();

$fsm = new FSMFacade(
    initState: $normal,
    transactions: [
        $normalEntryAction,
        $defaultConversationToInteractingAction,
        $interactingToDefaultConversationAction,
        $normalToRecordAction,
        $recordEntryAction,
        $waitingToRecordingAction,
        $recordingToWaitingAction,
        $recordToNormalExitAction,
        $normalToKnowledgeKingAction,
        $knowledgeEntryAction,
        $questioningToThanksForJoiningAction,
        $questioningOverTimeToNormalAction,
        $thanksForJoiningToQuestioningAction,
        $knowledgeToNormalAction,
    ],
    eventGetter: $watterballEventGetter,
);
$defaultConversation->setActions([$defaultConversationToInteractingAction]);

//$onlineMemberEvent->setValue(11);
//$watterballEventGetter->setEvent($onlineMemberEvent);
//
//$fsm->trigger($onlineMemberEvent);

$bot = new Bot($fsm);
$wsa = new Community(
    $bot,
    events: [
        'started' => new StartedEvent(),
    ]
);

while (true) {
    // input
    $input = readline();
    $wsa->input($input);
}

