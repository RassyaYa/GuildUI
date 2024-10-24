<?php

namespace GuildUI;

class Feedback {
    private string $memberName;
    private string $message;

    public function __construct(string $memberName, string $message) {
        $this->memberName = $memberName;
        $this->message = $message;
    }

    public function getFeedback(): array {
        return [
            "member" => $this->memberName,
            "message" => $this->message,
        ];
    }
}
