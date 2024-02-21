<?php

namespace domain;

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