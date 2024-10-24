<?php

namespace GuildUI;

use pocketmine\form\CustomForm; // Pastikan ini ada
use pocketmine\player\Player; // Pastikan Anda juga mengimpor Player
use pocketmine\form\Form; // Impor ini jika Anda membutuhkannya

class GuildUI {

    private Main $plugin; // Menyimpan instance plugin utama

    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
    }

    public function createGuildUI(Player $player): void {
        $form = new CustomForm(function (Player $player, ?array $data) {
            if ($data !== null) {
                $guildName = $data[0];
                $this->plugin->getGuilds()[$player->getName()] = $guildName; // Simpan guild yang baru dibuat
                $player->sendMessage("Guild '$guildName' has been created!");
            } else {
                $player->sendMessage("Guild creation cancelled.");
            }
        });

        $form->setTitle("Create Guild"); // Mengatur judul form
        $form->addInput("Enter Guild Name:"); // Menambahkan input untuk nama guild
        $player->sendForm($form); // Mengirimkan form kepada pemain
    }
}
