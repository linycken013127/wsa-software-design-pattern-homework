<?php

namespace domain\Event;

class Event
{
    private $value;


    public function __construct(
        protected string $name
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
    public function getValue()
    {
        return $this->value;
    }
}