<?php

namespace WonderPush\Util;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

interface Logger {

  public function log($level, $message, array $context = array());

}
