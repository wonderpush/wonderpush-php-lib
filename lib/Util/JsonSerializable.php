<?php

namespace WonderPush\Util;

if (interface_exists('\JsonSerializable', false)) {

  interface JsonSerializable extends \JsonSerializable {
  }

} else {

  // For PHP < 5.4
  interface JsonSerializable {
    public function jsonSerialize();
  }

}
