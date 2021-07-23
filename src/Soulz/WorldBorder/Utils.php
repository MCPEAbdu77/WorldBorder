<?php

namespace Soulz\WorldBorder;

use pocketmine\utils\TextFormat as TF;

class Utils {

    public const RED_PREFIX = TF::GRAY."[".TF::BOLD.TF::RED."!".TF::RESET.TF::GRAY."] ".TF::RESET; // ") " = '[!]border-message' -> '[!] border-message'

    public const YELLOW_PREFIX = TF::GRAY."[".TF::BOLD.TF::GOL."!".TF::RESET.TF::GRAY."] ".TF::RESET; // ") " = '[!]border-message' -> '[!] border-message'

    public const GREEN_PREFIX = TF::GRAY."[".TF::BOLD.TF::GREEN."!".TF::RESET.TF::GRAY."] ".TF::RESET; // ") " = '[!]border-message' -> '[!] border-message'

    public function getPrefix(){
        return self::RED_PREFIX;
        return self::YELLOW_PREFIX;
        return self::GREEN_PREFIX;
  }

}
