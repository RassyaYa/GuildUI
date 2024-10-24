<?php

namespace GuildUI;

use pocketmine\form\CustomForm;
use pocketmine\player\Player;

class GuildUI {
    public function createGuildUI(Player $player): void {
        $form = new CustomForm(function (Player $player, ?array $data) {
            if ($data !== null) {
                $guildName = $data[0]; // Mengambil input dari pemain
                $player->sendMessage("Guild '$guildName' telah dibuat!");
            }
        });

        $form->setTitle("Buat Guild");
        $form->addInput("Masukkan Nama Guild:");
        $player->sendForm($form);
    }
}
