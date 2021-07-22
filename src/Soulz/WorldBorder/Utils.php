<?php

namespace Soulz\WorldBorder;

class Utils {

    public const PREFIX = TF::GRAY."(".TF::BOLD.TF::RED."!".TF::RESET.TF::GRAY.") ".TF::RESET; // ") " = '(!)border-message' -> '(!) border-message'

    public function getPrefix(){
        return self::PREFIX;
  }
}
