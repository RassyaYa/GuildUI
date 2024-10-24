<?php

namespace GuildUI;

use pocketmine\form\CustomForm; // Pastikan diimpor
use pocketmine\Player; // Pastikan diimpor
use pocketmine\plugin\PluginBase;

class GuildUI {
    private Main $plugin;

    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
    }

    public function createGuildUI(Player $player): void {
        $this->plugin->getLogger()->info("Creating guild UI for player: " . $player->getName());

        $form = new CustomForm(function (Player $player, ?array $data) {
            if ($data !== null) {
                $guildName = $data[0]; // Asumsi input ada di indeks 0
                $player->sendMessage("Guild '$guildName' telah dibuat!");
            }
        });

        $form->setTitle("Buat Guild");
        $form->addInput("Masukkan Nama Guild:");
        $player->sendForm($form);
    }
}
