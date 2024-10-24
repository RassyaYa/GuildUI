<?php

namespace GuildUI;

use pocketmine\player\Player;
use pocketmine\form\Form;
use pocketmine\form\CustomForm;
use pocketmine\form\SimpleForm;

class GuildUI {

    private Main $plugin;

    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
    }

    public function createGuildUI(Player $player): void {
        $form = new CustomForm(function (Player $player, array $data) {
            if ($data === null || empty($data[0])) {
                $player->sendMessage("Nama guild tidak boleh kosong!");
                return;
            }

            // Membuat guild baru
            $guildName = $data[0];
            if (isset($this->plugin->getGuilds()[$guildName])) {
                $player->sendMessage("Guild dengan nama '{$guildName}' sudah ada!");
                return;
            }

            $guild = new Guild($guildName, $player->getName());
            $this->plugin->addGuild($guild);
            $player->sendMessage("Guild '{$guildName}' telah dibuat!");
        });

        $form->setTitle("Buat Guild");
        $form->addInput("Masukkan nama guild:");
        $player->sendForm($form);
    }

    public function showGuildsUI(Player $player): void {
        $form = new SimpleForm(function (Player $player, ?int $data) {
            // Aksi ketika memilih guild (bisa ditambahkan lebih banyak aksi di sini)
        });

        $form->setTitle("Daftar Guild");
        foreach ($this->plugin->getGuilds() as $guild) {
            $form->addButton($guild->getName());
        }
        $player->sendForm($form);
    }

    public function showAchievementsUI(Player $player): void {
        $form = new SimpleForm(function (Player $player, ?int $data) {
            // Aksi ketika memilih achievement
        });

        $form->setTitle("Prestasi Guild");
        foreach ($this->plugin->getGuilds() as $guild) {
            $form->addLabel("Guild: " . $guild->getName() . "\nPrestasi:");
            foreach ($guild->getAchievements() as $achievement) {
                $status = $achievement->isAchieved() ? "✔️ Achieved" : "❌ Not Achieved";
                $form->addLabel("- " . $achievement->getDetails()['name'] . ": " . $status);
            }
        }
        $player->sendForm($form);
    }

    public function giveFeedbackUI(Player $player): void {
        $form = new CustomForm(function (Player $player, array $data) {
            if ($data === null || empty($data[0])) {
                $player->sendMessage("Umpan balik tidak boleh kosong!");
                return;
            }

            // Simpan umpan balik
            $feedbackMessage = $data[0];
            $feedback = new Feedback($player->getName(), $feedbackMessage);
            // Logic untuk menyimpan umpan balik (bisa ke database atau file)
            $player->sendMessage("Umpan balik Anda telah dikirim. Terima kasih!");
        });

        $form->setTitle("Umpan Balik");
        $form->addInput("Masukkan umpan balik Anda:");
        $player->sendForm($form);
    }

    public function createTournamentUI(Player $player): void {
        $form = new CustomForm(function (Player $player, array $data) {
            if ($data === null || empty($data[0])) {
                $player->sendMessage("Nama turnamen tidak boleh kosong!");
                return;
            }

            $tournamentName = $data[0];
            $tournament = new GuildTournament($tournamentName);
            // Tambahkan guild yang berpartisipasi (logic bisa ditambahkan)
            $player->sendMessage("Turnamen '{$tournamentName}' telah dibuat!");
        });

        $form->setTitle("Buat Turnamen");
        $form->addInput("Masukkan nama turnamen:");
        $player->sendForm($form);
    }
}
