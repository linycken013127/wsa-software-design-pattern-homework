<?php

namespace domain;

class OnlineMemberCountEvent extends Event
{
    public function __construct()
    {
        parent::__construct('OnlineMemberCountEvent');
    }
}