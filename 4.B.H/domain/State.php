<?php

namespace domain;

class State extends StateComponent
{

    public function entryAction()
    {
        dump("entryAction: {$this->name}");
    }

    public function exitAction()
    {
        dump("exitAction: {$this->name}");
    }
}