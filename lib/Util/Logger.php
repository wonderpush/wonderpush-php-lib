<?php

namespace WonderPush\Util;

interface Logger {

  public function log($level, $message, array $context = array());

}
