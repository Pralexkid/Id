<?php

namespace Pralex;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Main extends PluginBase
{
    public function onEnable()
    {
        $this->getLogger()->info("Plugin on");
    }

    public function onDisable()
    {
        $this->getLogger()->info("Plugin off");
    }

    public function Oncommand(CommandSender $sender, Command $cmd, string $label, array $args): bool
    {
        if ($cmd->getName() == "id") {
            if ($sender instanceof Player) {
                $id = $sender->getInventory()->getItemInHand()->getId();
                if ($sender->getInventory()->getItemInHand()->getId() == 0) {
                    $sender->sendPopup("You don't have anything in your hand !");
                } else {
                    $sender->sendPopup("$id");
                }
            } else {
                $this->getLogger()->info("Must be executed as player !");
            }
        }return true;
    }
}