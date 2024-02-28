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
            $json = json_decode($matches[2], JSON_THROW_ON_ERROR);
            if ($event === 'login') {
                if (isset($json['isAdmin'], $json['userId']) && $json['isAdmin'] === true) {
                    $this->login(new Admin($json['userId']));
                } else if (isset($json['isAdmin'], $json['userId']) && $json['isAdmin'] === false) {
                    $this->login(new Member($json['userId']));
                }
            }
            if ($event === '10 seconds elapsed') {
                dd($this->onlineMembers);
            }
            $this->bot->listener($this->events[$event]);
        }
    }
}