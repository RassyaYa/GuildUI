<?php

namespace GuildUI;

class Event {
    private string $name;
    private string $description;
    private string $organizer;
    private array $participants = [];

    public function __construct(string $name, string $description, string $organizer) {
        $this->name = $name;
        $this->description = $description;
        $this->organizer = $organizer;
    }

    public function addParticipant(string $playerName): void {
        if (!in_array($playerName, $this->participants)) {
            $this->participants[] = $playerName;
        }
    }

    public function getDetails(): array {
        return [
            "name" => $this->name,
            "description" => $this->description,
            "organizer" => $this->organizer,
            "participants" => $this->participants,
        ];
    }
}
