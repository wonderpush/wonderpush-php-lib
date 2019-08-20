<?php

namespace WonderPush\Obj;

class SuccessResponse extends BaseObject {

  /** @var boolean */
  private $success;

  /**
   * @return bool
   */
  public function isSuccess() {
    return $this->success;
  }

  /**
   * @param bool $success
   * @return DeliveriesCreateResponse
   */
  public function setSuccess($success) {
    $this->success = $success;
    return $this;
  }
}
