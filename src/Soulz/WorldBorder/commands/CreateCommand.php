<?php

namespace Soulz\WorldBorder\commands;

use pocketmine\command\{
 Command,
 CommandSender
};
use pocketmine\utils\TextFormat;

class CreateCommand extends Command {

    public function __construct(){
        parent::__construct("/wbcreate", "Creates the border with selected positions", null, ["/worldbordercreate"]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args){
        if(!$sender instanceof Player){
            $sender->sendMessage("You must execute this command in-game!");
            return;
        }
        // continue later
    }
}
