<?php

namespace WonderPush\Api;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

use WonderPush\Obj\DeliveriesCreateResponse;
use WonderPush\Params\DeliveriesCreateParams;

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
   * Sends notifications.
   * @param DeliveriesCreateParams|array $params
   * @return DeliveriesCreateResponse
   * @throws \WonderPush\Errors\Base
   */
  public function create($params) {
    $response = $this->wp->rest()->post('/deliveries', is_array($params) ? $params : $params->toArray());
    return $response->checkedResult('\WonderPush\Obj\DeliveriesCreateResponse');

  }
}
