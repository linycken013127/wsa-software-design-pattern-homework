<?php

namespace domain\FSM\State;

use domain\FSM\Event\Event;

class State extends StateComponent
{
    public function actionHandle(Event $event): void
    {
        foreach ($this->actions as $action) {
            if ($action->trigger($event)) {
                $action->execute($event);
            }
        }
    }
}