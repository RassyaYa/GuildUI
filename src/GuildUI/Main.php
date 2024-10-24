<?php

namespace GuildUI;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class Main extends PluginBase implements Listener {

    private array $guilds = [];
    private GuildUI $guildUI;

    public function onEnable(): void {
        $this->guildUI = new GuildUI($this);
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("GuildUI Plugin Enabled");
    }

    public function onJoin(PlayerJoinEvent $event): void {
        // Logic for new player joining (optional)
    }

    public function getGuilds(): array {
        return $this->guilds;
    }

    public function addGuild(Guild $guild): void {
        $this->guilds[$guild->getName()] = $guild;
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if ($command->getName() === "guild") {
            if (!$sender->hasPermission("guildui.command")) {
                $sender->sendMessage("Anda tidak memiliki izin untuk menggunakan perintah ini.");
                return true;
            }
            
            if (!$sender instanceof Player) {
                $sender->sendMessage("Perintah ini hanya bisa digunakan dalam permainan.");
                return true;
            }

            switch ($args[0] ?? '') {
                case "create":
                    $this->guildUI->createGuildUI($sender);
                    break;
                case "list":
                    $this->guildUI->showGuildsUI($sender);
                    break;
                case "achievements":
                    $this->guildUI->showAchievementsUI($sender);
                    break;
                case "feedback":
                    $this->guildUI->giveFeedbackUI($sender);
                    break;
                case "tournament":
                    $this->guildUI->createTournamentUI($sender);
                    break;
                default:
                    $sender->sendMessage("Usage: /guild [create|list|achievements|feedback|tournament]");
                    break;
            }
            return true;
        }
        return false;
    }
}
