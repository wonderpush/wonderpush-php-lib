<?php

namespace WonderPush\Api;
use WonderPush\Obj\InstallationCollection;
use WonderPush\Params\AllInstallationsParams;

/**
 * Applications API.
 */
class Installations {

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
   * @param array|AllInstallationsParams $params
   * @return InstallationCollection
   * @throws \WonderPush\Errors\Base
   */
  public function all($params = array()) {
    $response = $this->wp->rest()->get('/installations', is_array($params) ? $params : $params->toArray());
    return $response->checkedResult(InstallationCollection::class);
  }

}
