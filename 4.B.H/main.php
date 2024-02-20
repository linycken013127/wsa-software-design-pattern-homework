<?php

use domain\Event\OnlineUserEvent;
use domain\FSM\Action\Transition;
use domain\FSM\FiniteStateMachine;
use domain\FSM\Guard\BelowTenGuard;
use domain\FSM\State;

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

// bot trigger event
$normal = new State(
    'Normal',
);

$defaultConversation = new State(
    'DefaultConversation',
);

$onlineUserEvent = new OnlineUserEvent();
$onlineUserEvent->setValue(9);

$entryAction = new Transition(
    $normal,
    $onlineUserEvent,
    new BelowTenGuard(),
    $defaultConversation
);

$normal->setEntryAction($entryAction);

$fsm = new FiniteStateMachine(
    state: $normal,
    transitions: [],
    states: [$normal, $defaultConversation],
);

dd($fsm->getState());
