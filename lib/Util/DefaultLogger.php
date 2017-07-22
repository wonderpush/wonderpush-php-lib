<?php

namespace WonderPush\Util;

/**
 * A logger that dumps to `error_log()`.
 */
class DefaultLogger extends \Psr\Log\AbstractLogger {

  public function log($level, $message, array $context = array()) {
    if (!empty($context) && is_string($message)) {
      $message = StringUtil::format($message, $context);
    }

    if ($message instanceof \stdClass) {
      if (defined('JSON_UNESCAPED_SLASHES')) {
        $message = json_encode($message, JSON_UNESCAPED_SLASHES);
      } else {
        $message = json_encode($message);
      }
    }

    error_log($message);
  }

}
