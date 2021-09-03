<?php

namespace Soulz\WorldBorder;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\math\Vector3;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class WorldBorder extends PluginBase implements Listener {

    private $playerMotionCooldown = [];

    public function onEnable(){
    	@mkdir($this->getDataFolder());
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
				if (!isset($this->playerMotionCooldown[$player->getName()]) or $this->playerMotionCooldown[$player->getName()] > 3) {
					$player->sendTip("§l§8[§c!§8] §cWarning §8[§c!§8] \n§r§cYou have reached the world border§e!");
					$player->setMotion($event->getFrom()->subtract($player->getLocation())->normalize()->multiply(2));
					$this->playerMotionCooldown[$player->getName()] = 0;
				} else {
					$this->playerMotionCooldown[$player->getName()] = $this->playerMotionCooldown[$player->getName()] + 1;
				}

            }

        }

    }

    public function onQuit(PlayerQuitEvent $event) {
		$playerName = $event->getPlayer()->getName();
		if(isset($this->playerMotionCooldown[$playerName])){
			unset($this->playerMotionCooldown[$playerName]);
		}
	}
}
