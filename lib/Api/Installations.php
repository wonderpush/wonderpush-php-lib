<?php

namespace WonderPush\Api;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

use WonderPush\Obj\InstallationCollection;
use WonderPush\Params\AllInstallationsParams;
use WonderPush\Params\PatchInstallationParams;
use WonderPush\Obj\SuccessResponse;

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
    return $response->checkedResult('\WonderPush\Obj\InstallationCollection');
  }

  /**
   * Partially update an existing installation
   * @param array|PatchInstallationParams $params - When using an array, please specify the 'installationId', and 'userId' key with an empty string as value
   * @return SuccessResponse
   * @throws \WonderPush\Errors\Base
   */
  public function patch($params) {
    $arrayParams = is_array($params) ? $params : $params->toArray();
    $installationId = $arrayParams['installationId'];
    unset($arrayParams['installationId']);
    $response = $this->wp->rest()->patch('/installations/' . $installationId, $arrayParams);
    return $response->checkedResult('\WonderPush\Obj\SuccessResponse');
  }

}
