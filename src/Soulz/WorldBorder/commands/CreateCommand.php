<?php

namespace Soulz\WorldBorder\commands;

use pocketmine\command\{
 Command,
 CommandSender
};
use pocketmine\utils\TextFormat;

class CreateCommand extends Command {

    public function __construct(){
        parent::__construct("/wbcreate");
        $this->setDescription("");
        $this->setUsage("/wbcreate {border_name}");
        $this->setPermission("border.create.command");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args){
        if(!$sender instanceof Player){
            $sender->sendMessage("You must execute $commandLabel in-game!");
            return;
        }
        // continue later
    }
}
