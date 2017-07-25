<?php

namespace WonderPush\Api;

/**
 * Deliveries API.
 *
 * Using this API you can send push notifications.
 */
class Deliveries {

  /**
   * Instance of the library whose credentials are to be used.
   * @var \WonderPush\WonderPush
   */
  private $wp;

  public function __construct(\WonderPush\WonderPush $wp) {
    $this->wp = $wp;
  }

  /**
   * Prepare a call to `POST /deliveries`, to send push notifications.
   * @return \WonderPush\RequestBuilders\DeliveriesCreate
   */
  public function prepareCreate() {
    return new \WonderPush\RequestBuilders\DeliveriesCreate($this->wp);
  }

}
