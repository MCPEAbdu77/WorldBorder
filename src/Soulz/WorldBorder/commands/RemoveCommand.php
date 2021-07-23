<?php

namespace Soulz\WorldBorder\commands;

use pocketmine\command\{Command,
                        CommandSender};
use pocketmine\level\Position;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

use Soulz\WorldBorder\WorldBorder;
 
class RemoveCommand extends Command {

    public function __construct(){
        parent::__construct("//wbremove", "Delete a WorldBorder", null, ["//wbdelete"]);
    }

    
}
