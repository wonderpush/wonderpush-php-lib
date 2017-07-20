<?php

namespace WonderPush\Errors;

abstract class Base extends \Exception {

  const DEFAULT_MESSAGE = '';

  protected $codeStr;

  public function __construct($message = "", $codeStr = 0, \Exception $previous = null) {
    if ($message === '') $message = static::DEFAULT_MESSAGE;
    parent::__construct($message, intval($codeStr), $previous);
    $this->codeStr = (string)$codeStr;
  }

  /**
   * @return string The code as is has been returned by the API, as a string
   */
  public function getCodeStr() {
    return $this->codeStr;
  }

}
