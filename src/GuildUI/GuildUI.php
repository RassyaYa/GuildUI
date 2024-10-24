<?php

namespace GuildUI;

use pocketmine\player\Player;

class GuildUI {
    /** @var PluginBase */
    private $plugin;

    public function __construct(PluginBase $plugin) {
        $this->plugin = $plugin;
    }

    public function createGuildUI(Player $player): void {
        $form = new CustomForm(function (Player $player, array $data) {
            if (isset($data[0])) {
                $guildName = $data[0];
                $player->sendMessage("Guild '$guildName' telah dibuat!");
                // Tambahkan logika untuk membuat guild di sini
            }
        });

        $form->setTitle("Buat Guild")
             ->addInput("Masukkan nama guild:", "Nama Guild")
             ->sendForm($player);
    }
}
