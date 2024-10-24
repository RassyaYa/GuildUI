<?php

namespace GuildUI;

use pocketmine\plugin\PluginBase; // Pastikan ini sudah ada
use pocketmine\player\Player;

class GuildUI {
    private PluginBase $plugin; // Pastikan tipe ini sesuai dengan kelas plugin Anda

    public function __construct(PluginBase $plugin) {
        $this->plugin = $plugin; // Simpan plugin yang diteruskan
    }

    public function createGuildUI(Player $player): void {
        $form = new CustomForm(function (Player $player, mixed $data) {
            // Tangani respons di sini
        });
        
        $form->setTitle("Judul Guild");
        $form->addInput("Masukkan Nama Guild", "Nama Guild");
        
        $form->sendForm($player);
    }
}
