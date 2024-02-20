<?php

namespace domain;

abstract class Guard
{
    abstract public function guard(Event $event): bool;
}