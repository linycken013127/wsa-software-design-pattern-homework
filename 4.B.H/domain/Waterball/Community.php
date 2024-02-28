<?php

namespace domain\Waterball;

use domain\Bot\Bot;
use domain\Waterball\Event\StartedEvent;

class Community
{

    public function __construct(
        private Bot $bot,
        private array $onlineMembers = [],
        private array $events = []
    )
    {
    }

    public function started(): void
    {
        $event = new StartedEvent();
        printf("🕑 3 seconds elapsed...\n");
        $this->bot->listener($event);
    }

    public function login(Member $member): void
    {
        $this->onlineMembers[$member->getId()] = $member;
    }

    public function logout(Member $member): void
    {
        unset($this->onlineMembers[$member->getId()]);
    }

    public function input(false|string $input)
    {
        $matches = [];
        preg_match('/^\[(.*?)\](.*)$/', $input, $matches);
        if (count($matches) === 3) {
            $event = $matches[1];
            $json = $matches[2];
            $this->bot->listener($this->events[$event]);
        }
    }
}