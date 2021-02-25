<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

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
