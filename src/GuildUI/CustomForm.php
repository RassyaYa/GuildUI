<?php

namespace GuildUI;

use pocketmine\form\Form;
use pocketmine\player\Player;

class CustomForm implements Form {
    private string $title;
    private array $inputs = [];
    private $callback; // Gunakan mixed untuk mendukung callable

    public function __construct($callback) { // Gunakan mixed
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
        // Implementasikan logika pengiriman form kepada pemain di sini
    }

    public function handleResponse(Player $player, mixed $data): void { // Ubah tipe data menjadi mixed
        if (is_callable($this->callback)) {
            ($this->callback)($player, $data); // Pastikan callback bisa dipanggil
        }
    }
}
