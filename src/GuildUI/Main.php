<?php

namespace GuildUI;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\form\CustomForm; // Impor untuk CustomForm

class Main extends PluginBase {

    private array $guilds = []; // Menyimpan guild yang ada

    public function onEnable(): void {
        $this->getLogger()->info("GuildUI plugin enabled!");
    }

    public function onDisable(): void {
        $this->getLogger()->info("GuildUI plugin disabled!");
    }

    public function createGuildUI(Player $player): void {
        $ui = new GuildUI($this); // Menginisialisasi GuildUI
        $ui->createGuildUI($player); // Memanggil fungsi untuk membuat UI guild
    }

    public function getGuilds(): array {
        return $this->guilds; // Getter untuk guilds
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if ($command->getName() === "guild") {
            if ($sender instanceof Player) {
                $this->createGuildUI($sender);
            } else {
                $sender->sendMessage("This command can only be used in-game.");
            }
            return true;
        }
        return false;
    }
}
