<?php

namespace pocketmine\form;

use pocketmine\player\Player;
use pocketmine\utils\TextFormat;

class CustomForm {

    private string $title;
    private array $elements = [];
    private callable $callback;

    public function __construct(callable $callback) {
        $this->callback = $callback;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

    public function addInput(string $text, string $placeholder = "", string $default = ""): void {
        $this->elements[] = [
            'type' => 'input',
            'text' => $text,
            'placeholder' => $placeholder,
            'default' => $default
        ];
    }

    public function sendForm(Player $player): void {
        $data = [
            'title' => $this->title,
            'elements' => $this->elements
        ];

        // Kirim data form ke pemain (implementasi pengiriman tergantung pada bagaimana Anda menangani form)
        // Contoh:
        $player->sendForm($this->callback, $data);
    }
}
