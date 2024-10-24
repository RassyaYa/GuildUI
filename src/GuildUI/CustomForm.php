<?php

namespace GuildUI;

use pocketmine\form\Form;
use pocketmine\Player;

class CustomForm implements Form {
    /** @var string */
    private $title;

    /** @var array */
    private $elements = [];

    /** @var callable */
    private $callback;

    public function __construct(callable $callback) {
        $this->callback = $callback;
    }

    public function setTitle(string $title): self {
        $this->title = $title;
        return $this;
    }

    public function addInput(string $text, string $placeholder = "", string $default = ""): self {
        $this->elements[] = [
            "type" => "input",
            "text" => $text,
            "placeholder" => $placeholder,
            "default" => $default,
        ];
        return $this;
    }

    public function sendForm(Player $player): void {
        // Kode untuk mengirimkan form kepada pemain.
        // Misalnya, menggunakan API form untuk mengirimkan custom form.
    }

    public function handleResponse(Player $player, array $data): void {
        // Panggil fungsi callback dengan pemain dan data
        ($this->callback)($player, $data);
    }

    public function jsonSerialize(): array {
        return [
            "type" => "form",
            "title" => $this->title,
            "content" => "",
            "buttons" => $this->elements,
        ];
    }
}
