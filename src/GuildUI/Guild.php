<?php

namespace GuildUI;

class Guild {
    private string $name;
    private string $owner;
    private array $members = [];
    private array $achievements = [];
    private int $funds = 0;

    public function __construct(string $name, string $owner) {
        $this->name = $name;
        $this->owner = $owner;
        $this->members[] = $owner; // Add owner as member
    }

    public function getName(): string {
        return $this->name;
    }

    public function getOwner(): string {
        return $this->owner;
    }

    public function addMember(string $playerName): void {
        if (!in_array($playerName, $this->members)) {
            $this->members[] = $playerName;
        }
    }

    public function removeMember(string $playerName): void {
        $this->members = array_filter($this->members, function($member) use ($playerName) {
            return $member !== $playerName;
        });
    }

    public function getMembers(): array {
        return $this->members;
    }

    public function addAchievement(Achievement $achievement): void {
        $this->achievements[] = $achievement;
    }

    public function getAchievements(): array {
        return $this->achievements;
    }

    public function contributeFunds(int $amount): void {
        $this->funds += $amount;
    }

    public function getFunds(): int {
        return $this->funds;
    }
}
