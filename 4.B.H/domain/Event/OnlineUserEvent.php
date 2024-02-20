<?php

namespace domain\Event;

class OnlineUserEvent extends Event
{
    protected string $name = "OnlineUserEvent";
    public function __construct()
    {
        parent::__construct($this->name);
    }

    private int $value;

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue(int $value): void
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}