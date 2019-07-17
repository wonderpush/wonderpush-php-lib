<?php

namespace WonderPush\Errors;

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
