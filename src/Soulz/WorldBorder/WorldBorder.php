<?php

namespace Soulz\WorldBorder;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\math\Vector3;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class WorldBorder extends PluginBase implements Listener {

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        @mkdir($this->getDataFolder(), 0744, true);
        $this->saveResource('config.yml', false);
        $this->config = new Config($this->getDataFolder() . 'config.yml', Config::YAML); 
        
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    /** 
     * @param PlayerMoveEvent $event 
     */
    public function onMove(PlayerMoveEvent $event): void {
        $player = $event->getPlayer();
        $level = $player->getLevel();
        $dat = $this->getConfig()->get("border");

        if(isset($dat[$level->getName()])){
            $v1 = new Vector3($level->getSpawnLocation()->getX(), 0, $level->getSpawnLocation()->getZ());
            $v2 = new Vector3($player->x, 0, $player->z);

            if($v2->distance($v1) > $dat[$level->getName()]){
                $event->setCancelled();
                $player->sendMessage(Utils::RED_PREFIX . $this->getConfig()->get("border-message") . TextFormat::RESET);
            }

        }

    }
}
