<?php

namespace WonderPush\Api;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

use WonderPush\Obj\SegmentCollection;
use WonderPush\Params\CollectionParams;

/**
 * Segments API.
 */
class Segments {

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
   * @param array|CollectionParams $collectionParams
   * @return SegmentCollection
   * @throws \WonderPush\Errors\Base
   */
  public function all($collectionParams = array()) {
    $response = $this->wp->rest()->get('/segments', is_array($collectionParams) ? $collectionParams : $collectionParams->toArray());
    return $response->checkedResult('\WonderPush\Obj\SegmentCollection');
  }
}
