<?php

namespace WonderPush\Api;
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
   * @param CollectionParams $collectionParams
   * @return ApplicationCollection
   * @throws \WonderPush\Errors\Net
   */
  public function all($collectionParams = null) {
    $response = $this->wp->rest()->get('/applications', $collectionParams ? $collectionParams->toArray() : array());
    return $response->checkedResult(ApplicationCollection::class);
  }

  public function get($id) {

  }



}
