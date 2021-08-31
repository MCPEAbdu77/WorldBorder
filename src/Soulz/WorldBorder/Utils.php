<?php

namespace Soulz\WorldBorder;

use pocketmine\utils\TextFormat;

class Utils {

    public const RED_PREFIX = TextFormat::GRAY. "[" . TextFormat::BOLD . TextFormat::RED. "!" . TextFormat::RESET . TextFormat::GRAY . "] " . TextFormat::RESET; // ") " = '[!]border-message' -> '[!] border-message'

    public const YELLOW_PREFIX = TextFormat::GRAY. "[" . TextFormat::BOLD . TextFormat::GOLD . "!" . TextFormat::RESET . TextFormat::GRAY . "] " . TextFormat::RESET; // ") " = '[!]border-message' -> '[!] border-message'

    public const GREEN_PREFIX = TextFormat::GRAY. "[" . TextFormat::BOLD . TextFormat::GREEN . "!" . TextFormat::RESET . TextFormat::GRAY. "] ". TextFormat::RESET; // ") " = '[!]border-message' -> '[!] border-message'

}
