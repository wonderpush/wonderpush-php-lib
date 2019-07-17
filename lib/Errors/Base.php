<?php

namespace WonderPush\Errors;

/**
 * Base class for WonderPush errors.
 *
 * The WonderPush API returns string error codes.
 * This class exposes them as string, in addition to expose their parsed version with {@link getCode()}.
 */
abstract class Base extends \Exception {

  /**
   * The default error message to use when none has been provided at construct time.
   */
  const DEFAULT_MESSAGE = '';

  protected $codeStr;

  public function __construct($message = '', $codeStr = '0', \Exception $previous = null) {
    if ($message === '') {
      $message = static::DEFAULT_MESSAGE;
    }
    parent::__construct($message, (int)$codeStr, $previous);
    $this->codeStr = (string)$codeStr;
  }

  /**
   * The code as is has been returned by the API, as a string.
   * @return string
   */
  public function getCodeStr() {
    return $this->codeStr;
  }

}
