<?php

namespace WonderPush\Util;

/**
 * A logger that dumps to error_log()
 */
class DefaultLogger extends \Psr\Log\AbstractLogger {

  public function log($level, $message, array $context = array()) {
    if (!empty($context)) {
      $message = StringUtil::format($message, $context);
    }

    error_log($message);
  }

}
