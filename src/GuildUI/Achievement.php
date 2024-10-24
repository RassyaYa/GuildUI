<?php

namespace GuildUI;

class Achievement {
    private string $name;
    private string $description;
    private bool $achieved = false;

    public function __construct(string $name, string $description) {
        $this->name = $name;
        $this->description = $description;
    }

    public function markAsAchieved(): void {
        $this->achieved = true;
    }

    public function isAchieved(): bool {
        return $this->achieved;
    }

    public function getDetails(): array {
        return [
            "name" => $this->name,
            "description" => $this->description,
            "achieved" => $this->achieved,
        ];
    }
}
