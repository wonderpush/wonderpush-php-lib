<?php

namespace WonderPush\Errors;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * JSON related errors.
 */
class Parsing extends Base {

  /**
   * The output of json_last_error();
   * @var int
   */
  private $jsonErrorCode;

  public function __construct($jsonErrorCode, $message = '', $codeStr = '0', \Exception $previous = null) {
    parent::__construct($message, $codeStr, $previous);
    $this->jsonErrorCode = $jsonErrorCode;
  }

  /**
   * The output of json_last_error();
   * @return int
   */
  public function getJsonErrorCode() {
    return $this->jsonErrorCode;
  }

}
