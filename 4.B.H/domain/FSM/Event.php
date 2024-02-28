<?php

namespace domain\FSM;

interface Event
{
    public function getName(): string;

    public function getValue();
}