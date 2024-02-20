<?php

namespace domain;

abstract class Event
{
    protected $value;
    public function __construct(
        protected string $name
    )
    {
    }

    public function getName()
    {
    }
}