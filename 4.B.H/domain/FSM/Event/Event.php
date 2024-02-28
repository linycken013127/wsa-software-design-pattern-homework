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

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}