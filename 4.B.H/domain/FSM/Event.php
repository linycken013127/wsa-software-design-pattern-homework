<?php

namespace domain\FSM;

abstract class Event
{
    public function __construct(
        private readonly string $name,
        private readonly mixed $value
    )
    {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getValue(): mixed
    {
        return $this->value;
    }
}