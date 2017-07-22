<?php

namespace WonderPush\ResponseParsers;

/**
 * Base class for parsed response with `success` fields.
 *
 * Raises `success: false` responses into `\WonderPush\Errors\Unsuccessful` errors.
 */
class BaseSuccess extends Base {

  private $success;

  /**
   * @return boolean
   */
  public function getSuccess() {
    return $this->success;
  }

  public function exception() {
    $exception = parent::exception();
    if ($exception !== null) return $exception;
    if ($this->getSuccess() !== true) {
      return new \WonderPush\Errors\Unsuccessful($this->netRequest(), $this->netResponse());
    }
    return null;
  }

}
