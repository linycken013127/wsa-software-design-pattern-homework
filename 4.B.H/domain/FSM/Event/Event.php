<?php

namespace domain\FSM\Event;

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

    public function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}