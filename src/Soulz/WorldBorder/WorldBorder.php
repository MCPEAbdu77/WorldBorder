<?php

namespace Soulz\WorldBorder;

use pocketmine\event\Listener; // remove on evlistener implentation
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\math\Vector3;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as TF;

class WorldBorder extends PluginBase implements Listener // remove implement... on evlist implementation
{

    /** @var self */
    public static $instance;

    public function onLoad(){
        $this->getLogger()->info("Loading WorldBorder by Soul ✞#9999");
    }
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this),$this);
        $commands = [
        new SetPosCommand(),
        new CreateCommand(),
        new RemoveCommand()
        ];
        $this->getServer()->getCommandMap()->registerAll("BorderCommands", $commands);

        @mkdir($this->getDataFolder(), 0744, true);
        $this->saveResource('config.yml', false);
        $this->config = new Config($this->getDataFolder().'config.yml', Config::YAML); 

        $this->getLogger()->info("Enabling WorldBorder by Soul ✞#9999");
        $this->getLogger()->info("If you find this project useful, please contact my Discord to consider donating");
    }

    /** @param PlayerMoveEvent $e */
    public function onMove(PlayerMoveEvent $e): void{
        $player = $e->getPlayer();
        $level = $player->getLevel();
        $dat = $this->getConfig()->get("border");

        if(isset($dat[$level->getName()])){
            $v1 = new Vector3($level->getSpawnLocation()->getX(), 0, $level->getSpawnLocation()->getZ());
            $v2 = new Vector3($player->x, 0, $player->z);

            if($v2->distance($v1) > $dat[$level->getName()]){
                $e->setCancelled();
                $player->sendMessage(Utils::PREFIX.$this->getConfig()->get("border-message").TF::RESET);
            }

        }

    }

    public function onDisable(){
        $this->getLogger()->info("Disabling WorldBorder by Soul ✞#9999");
    }
}
