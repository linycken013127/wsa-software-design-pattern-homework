<?php

namespace domain\FSM;

interface TransitionAction
{
    public function process(): void;
}