<?php

namespace WonderPush\Api;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

use WonderPush\Params\TrackEventParams;
use WonderPush\Obj\SuccessResponse;

/**
 * Applications API.
 */
class Events {

  /**
   * Instance of the library whose credentials are to be used.
   * @var \WonderPush\WonderPush
   */
  private $wp;

  public function __construct(\WonderPush\WonderPush $wp) {
    $this->wp = $wp;
  }

  /**
   * Track an event
   * @param array|TrackEventParams $params - When using an array, please specify the 'installationId', and 'userId' key with an empty string as value
   * @return SuccessResponse
   * @throws \WonderPush\Errors\Base
   */
  public function track($params) {
    $arrayParams = is_array($params) ? $params : $params->toArray();
    $response = $this->wp->rest()->post('/events', $arrayParams);
    return $response->checkedResult('\WonderPush\Obj\SuccessResponse');
  }

}
