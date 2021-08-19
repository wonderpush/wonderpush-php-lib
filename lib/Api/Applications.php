<?php

namespace WonderPush\Api;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

use WonderPush\Obj\ApplicationCollection;
use WonderPush\Params\CollectionParams;

/**
 * Applications API.
 */
class Applications {

  /**
   * Instance of the library whose credentials are to be used.
   * @var \WonderPush\WonderPush
   */
  private $wp;

  public function __construct(\WonderPush\WonderPush $wp) {
    $this->wp = $wp;
  }

  /**
   * List applications associated with the access token used to initialize the WonderPush object.
   * @param array|CollectionParams $collectionParams
   * @return ApplicationCollection
   * @throws \WonderPush\Errors\Base
   */
  public function all($collectionParams = array()) {
    $response = $this->wp->rest()->get('/applications', is_array($collectionParams) ? $collectionParams : $collectionParams->toArray());
    return $response->checkedResult('\WonderPush\Obj\ApplicationCollection');
  }

  public function patch($applicationId, $body = array(), $params = array()) {
    $response = $this->wp->rest()->patch('/applications/' . $applicationId, array_merge($params, array('body' => $body)));
    return $response->checkedResult('\WonderPush\Obj\Application', 'application');
  }
}
