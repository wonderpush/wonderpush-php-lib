<?php

namespace WonderPush\Params;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

use WonderPush\Obj\BaseObject;

class TrackEventParams extends BaseObject {

  /** @var string */
  private $installationId;

  /** @var string */
  private $userId;

  /** @var array */
  private $custom;

  /** @var string */
  private $type;

  /**
   * TrackEventParams constructor.
   * @param string $userId
   */
  public function __construct($type, $installationId, $userId = '') {
    parent::__construct();
    $this->type = $type;
    $this->installationId = $installationId;
    $this->userId = $userId ? $userId : '';
  }

  /**
   * @return string
   */
  public function getType() {
    return $this->type;
  }

  /**
   * @param string $type
   * @return TrackEventParams
   */
  public function setType($type) {
    $this->type = $type;
    return $this;
  }

  /**
   * @return string
   */
  public function getInstallationId() {
    return $this->installationId;
  }

  /**
   * @param string $installationId
   * @return TrackEventParams
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
        'type' => $this->type,
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
   * @return TrackEventParams
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
   * @return TrackEventParams
   */
  public function setProperties($properties) {
    $this->custom = $properties;
    return $this;
  }

  /**
   * @return array
   */
  public function getCustom() {
    return $this->custom;
  }

  /**
   * @param array $custom
   * @return TrackEventParams
   */
  public function setCustom($custom) {
    $this->custom = $custom;
    return $this;
  }
}
