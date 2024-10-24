<?php

namespace GuildUI;

use pocketmine\form\CustomForm; // Pastikan untuk mengimpor CustomForm
use pocketmine\form\Form; // Impor Form jika diperlukan
use pocketmine\player\Player;

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

        $form->setTitle("Create Guild");
        $form->addInput("Enter Guild Name:"); // Menambahkan input untuk nama guild
        $player->sendForm($form); // Mengirimkan form kepada pemain
    }
}
