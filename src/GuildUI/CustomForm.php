<?php

namespace GuildUI;

use pocketmine\form\Form;
use pocketmine\player\Player;

class CustomForm implements Form {
    private string $title;
    private array $inputs = [];
    private callable $callback;

    public function __construct(callable $callback) {
        $this->callback = $callback;
    }

    public function setTitle(string $title): self {
        $this->title = $title;
        return $this;
    }

    public function addInput(string $text, string $placeholder = ""): self {
        $this->inputs[] = [
            "type" => "input",
            "text" => $text,
            "placeholder" => $placeholder,
        ];
        return $this;
    }

    public function sendForm(Player $player): void {
        // Kirim form kepada pemain di sini
        // Pastikan untuk mengimplementasikan pengiriman form dengan benar
    }

    public function handleResponse(Player $player, $data): void {
        // Pastikan tipe $data tidak terlalu spesifik
        ($this->callback)($player, $data);
    }
}
