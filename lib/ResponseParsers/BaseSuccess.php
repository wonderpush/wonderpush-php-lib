<?php

namespace WonderPush\ResponseParsers;

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
