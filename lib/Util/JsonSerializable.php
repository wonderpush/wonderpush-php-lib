<?php

namespace WonderPush\Util;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

if (interface_exists('\JsonSerializable', false)) {

  interface JsonSerializable extends \JsonSerializable {
  }

} else {

  // For PHP < 5.4
  interface JsonSerializable {
    public function jsonSerialize();
  }

}
