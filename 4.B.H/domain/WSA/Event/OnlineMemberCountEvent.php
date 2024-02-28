<?php

namespace domain\WSA\Event;

use domain\FSM\Event;

class OnlineMemberCountEvent implements Event
{
    private int $value;
    public function __construct(
        private readonly string $name = 'OnlineMemberCountEvent',
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
}