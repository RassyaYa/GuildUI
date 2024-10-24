<?php

namespace GuildUI;

class Member {
    private string $name;
    private int $contributionPoints = 0;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function addContribution(int $points): void {
        $this->contributionPoints += $points;
    }

    public function getContributionPoints(): int {
        return $this->contributionPoints;
    }

    public function getName(): string {
        return $this->name;
    }
}
