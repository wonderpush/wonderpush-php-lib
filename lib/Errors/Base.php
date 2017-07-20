<?php

namespace WonderPush\Errors;

abstract class Base extends \Exception {

  const DEFAULT_MESSAGE = '';

  public function __construct($message = "", $code = 0, \Exception $previous = null) {
    if ($message === '') $message = static::DEFAULT_MESSAGE;
    parent::__construct($message, $code, $previous);
  }

}
