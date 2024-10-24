<?php

namespace GuildUI;

use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;

class GuildUI {
    private PluginBase $plugin; // Tipe PluginBase

    public function __construct(PluginBase $plugin) {
        $this->plugin = $plugin; // Menyimpan plugin yang diteruskan
    }

    public function createGuildUI(Player $player): void {
        // Menggunakan $plugin untuk melakukan sesuatu, misalnya logging
        $this->plugin->getLogger()->info("Membuka UI Guild untuk pemain: " . $player->getName());

        $form = new CustomForm(function (Player $player, mixed $data) {
            // Tangani respons di sini
        });
        
        $form->setTitle("Judul Guild");
        $form->addInput("Masukkan Nama Guild", "Nama Guild");
        
        $form->sendForm($player);
    }
}
