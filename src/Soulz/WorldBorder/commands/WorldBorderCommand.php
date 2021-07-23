<?php

namespace Soulz\WorldBorder\commands;

use pocketmine\command\{Command,
                        CommandSender};
use pocketmine\utils\TextFormat as TF;

use libs\jojoe77777\FormAPI\FormAPI;
use libs\jojoe77777\FormAPI\SimpleForm;

use Soulz\WorldBorder\WorldBorder;

class WorldBorderCommand extends Command {

    public function __construct(){
        parent::__construct("/worldborder", "View WorldBorder Info", null, ["/wb"]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args){
        if(!$sender->isOp()){
            $sender->sendMessage(Utils::PREFIX.TextFormat::RED.TextFormat::BOLD."Error: ".TextFormat::RESET.TextFormat::GRAY."You must be an operator to execute this command")
        }
        if(!$sender instanceof Player){
            $sender->sendMessage("You must execute this command in-game!");
            return;
        }
        $this->form($sender);
    }

    public function wbCommand($sender){
        $form = new SimpleForm($sender){
            $form->setTitle(TextFormat::RED.TextFormat::BOLD."World Border".TextFormat::RESET);
            $form->setContent(TextFormat:GRAY."WorldBorder by Soulz\n".TextFormat:GRAY."Version: 1.2.0\n".TextFormat:GRAY."API: 3.0.0\n\n".TextFormat:RED."Commands: \n".TextFormat:GRAY."//wb 1 || Select Border Position One\n".TextFormat:GRAY."//wb 2 || Select Border Position Two\n".TextFormat:GRAY."//wb create || Create a border\n".TextFormat:GRAY."//wb list || List all current borders\n".TextFormat:GRAY."//wb delete || Delete a border\n".TextFormat::RESET);
            $form->sendToPlayer($sender);
            return true;
    }
}
