<?php

namespace WonderPush\Util;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * A logger that dumps to `error_log()`.
 */
class DefaultLogger implements Logger {

  public function log($level, $message, array $context = array()) {
    if (!empty($context) && is_string($message)) {
      $message = StringUtil::format($message, $context);
    }

    if ($message instanceof \stdClass) {
      if (defined('JSON_UNESCAPED_SLASHES')) {
        // @codingStandardsIgnoreLine
        $message = json_encode($message, JSON_UNESCAPED_SLASHES);
      } else {
        $message = json_encode($message);
      }
    }

    /** @noinspection ForgottenDebugOutputInspection */
    error_log($message);
  }

}
