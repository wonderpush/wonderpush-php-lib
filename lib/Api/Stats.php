<?php

namespace WonderPush\Api;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

use WonderPush\Obj\FrequentFieldValues;
use WonderPush\Params\FrequentFieldValuesParams;

/**
 * Stats API.
 */
class Stats {

  /**
   * Instance of the library whose credentials are to be used.
   * @var \WonderPush\WonderPush
   */
  private $wp;

  public function __construct(\WonderPush\WonderPush $wp) {
    $this->wp = $wp;
  }

  /**
   * List segments associated with the access token used to initialize the WonderPush object.
   * @param array|FrequentFieldValuesParams $params
   * @return FrequentFieldValues
   * @throws \WonderPush\Errors\Base
   */
  public function frequentFieldValues($params = array()) {
    $response = $this->wp->rest()->get('/stats/frequentFieldValues', is_array($params) ? $params : $params->toArray());
    return $response->checkedResult('\WonderPush\Obj\FrequentFieldValues');
  }
}
