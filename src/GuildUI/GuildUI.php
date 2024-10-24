<?php

namespace GuildUI;

use pocketmine\form\CustomForm;
use pocketmine\form\SimpleForm;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class GuildUI {

    private Main $plugin;

    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
    }

    public function createGuildUI(Player $player): void {
        $form = new CustomForm(function (Player $player, ?array $data) {
            if ($data !== null) {
                $guildName = $data[0]; // Mengasumsikan input berada di indeks 0
                // Logika untuk membuat guild dengan $guildName
                $player->sendMessage("Guild '$guildName' telah dibuat!");
            }
        });
        
        $form->setTitle("Buat Guild");
        $form->addInput("Masukkan Nama Guild:");

        $player->sendForm($form);
    }

    // Tambahkan metode lain untuk daftar, prestasi, umpan balik, turnamen...
}
