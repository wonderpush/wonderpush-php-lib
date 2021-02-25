<?php

namespace WonderPush\Params;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

use WonderPush\Obj\BaseObject;

class PatchInstallationParams extends BaseObject {

  /** @var string */
  private $installationId;

  /** @var string */
  private $userId;

  /** @var array */
  private $custom;

  /**
   * PatchInstallationParams constructor.
   * @param string $userId
   */
  public function __construct($installationId, $userId = '') {
    parent::__construct();
    $this->installationId = $installationId;
    $this->userId = $userId ? $userId : '';
  }

  /**
   * @return string
   */
  public function getInstallationId() {
    return $this->installationId;
  }

  /**
   * @param string $installationId
   * @return PatchInstallationParams
   */
  public function setInstallationId($installationId) {
    $this->installationId = $installationId;
    return $this;
  }

  protected function buildDataFromFields() {
    return (object) \WonderPush\Util\ArrayUtil::filterNulls(array(
      'installationId' => $this->installationId,
      'userId' => $this->userId,
      'body' => (object) \WonderPush\Util\ArrayUtil::filterNulls(array(
        'custom' => $this->custom,
      )),
    ));
  }

  /**
   * @return string
   */
  public function getUserId() {
    return $this->userId;
  }

  /**
   * @param string $userId
   * @return PatchInstallationParams
   */
  public function setUserId($userId) {
    $this->userId = $userId ? $userId : '';
    return $this;
  }

  /**
   * @return array
   */
  public function getProperties() {
    return $this->custom;
  }

  /**
   * @param array $properties
   * @return PatchInstallationParams
   */
  public function setProperties($properties) {
    $this->custom = $properties;
    return $this;
  }
}
