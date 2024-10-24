<?php

namespace GuildUI;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\form\Form; // Impor untuk form
use pocketmine\form\CustomForm; // Impor untuk CustomForm

class Main extends PluginBase {

    private array $guilds = []; // Menyimpan guild yang ada

    public function onEnable(): void {
        $this->getLogger()->info("GuildUI plugin enabled!");
    }

    public function onDisable(): void {
        $this->getLogger()->info("GuildUI plugin disabled!");
    }

    // Fungsi untuk membuat guild UI
    public function createGuildUI(Player $player): void {
        $form = new CustomForm(function (Player $player, ?array $data) {
            if ($data !== null) {
                $guildName = $data[0]; // Mengambil nama guild dari input
                $this->guilds[$player->getName()] = $guildName; // Menyimpan guild untuk pemain
                $player->sendMessage("Guild '$guildName' has been created!");
            } else {
                $player->sendMessage("Guild creation cancelled.");
            }
        });

        $form->setTitle("Create Guild");
        $form->addInput("Enter Guild Name:"); // Input untuk nama guild
        $player->sendForm($form); // Mengirim form ke pemain
    }

    // Fungsi untuk menangani perintah
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if ($command->getName() === "guild") {
            if ($sender instanceof Player) {
                $this->createGuildUI($sender); // Memanggil fungsi untuk membuat guild UI
            } else {
                $sender->sendMessage("This command can only be used in-game.");
            }
            return true;
        }
        return false;
    }
}
