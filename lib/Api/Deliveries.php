<?php

namespace WonderPush\Api;

/**
 * Deliveries API
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
   * @return \WonderPush\RequestBuilders\PostDeliveries
   */
  public function preparePostDeliveries() {
    return new \WonderPush\RequestBuilders\PostDeliveries($this->wp);
  }

}
