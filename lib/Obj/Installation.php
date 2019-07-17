<?php

namespace WonderPush\Obj;

/**
 * DTO for installations.
 *
 * See {@link https://www.wonderpush.com/docs/concepts/installation}
 * @codeCoverageIgnore
 */
class Installation extends BaseObject {

  /** @var string */
  private $id;
  /** @var string */
  private $userId;
  /** @var string */
  private $applicationId;
  /** @var string */
  private $accessToken;
  /** @var long */
  private $creationDate;
  /** @var long */
  private $updateDate;
  /** @var InstallationPushToken */
  private $pushToken;
  /** @var InstallationApplication */
  private $application;
  /** @var InstallationDevice */
  private $device;
  /** @var InstallationPreferences */
  private $preferences;
  /** @var array */
  private $custom;

  public function __construct($data = null) {
    parent::__construct($data);
  }

  public static function computeId($applicationId, $devicePlatform, $deviceId, $userId) {
    $id = $applicationId . ':' . $devicePlatform . ':' . $deviceId;
    if (!empty($userId)) {
      $id .= ':' . $userId;
    }
    return sha1($id);
  }

  /**
   * @return string
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @param string $id
   * @return Installation
   */
  public function setId($id) {
    $this->id = $id;
    return $this;
  }

  /**
   * @return long
   */
  public function getCreationDate() {
    return $this->creationDate;
  }

  /**
   * @param long $creationDate
   * @return Staff
   */
  public function setCreationDate($creationDate) {
    $this->creationDate = $creationDate;
    return $this;
  }

  /**
   * @return long
   */
  public function getUpdateDate() {
    return $this->updateDate;
  }

  /**
   * @param long $updateDate
   * @return Staff
   */
  public function setUpdateDate($updateDate) {
    $this->updateDate = $updateDate;
    return $this;
  }

  /**
   * @return string
   */
  public function getUserId() {
    return $this->userId;
  }

  /**
   * @param string $userId
   * @return Installation
   */
  public function setUserId($userId) {
    $this->userId = $userId;
    return $this;
  }

  /**
   * @return string
   */
  public function getApplicationId() {
    return $this->applicationId;
  }

  /**
   * @param string $applicationId
   * @return Installation
   */
  public function setApplicationId($applicationId) {
    $this->applicationId = $applicationId;
    return $this;
  }

  /**
   * @return string
   */
  public function getAccessToken() {
    return $this->accessToken;
  }

  /**
   * @param string $accessToken
   * @return Installation
   */
  public function setAccessToken($accessToken) {
    $this->accessToken = $accessToken;
    return $this;
  }

  /**
   * @return InstallationPushToken
   */
  public function getPushToken() {
    return $this->pushToken;
  }

  /**
   * @param InstallationPushToken|array $pushToken
   * @return Installation
   */
  public function setPushToken($pushToken) {
    $this->pushToken = BaseObject::instantiateForSetter('\WonderPush\Obj\InstallationPushToken', $pushToken);
    return $this;
  }

  /**
   * @return InstallationApplication
   */
  public function getApplication() {
    return $this->application;
  }

  /**
   * @param InstallationApplication|array $application
   * @return Installation
   */
  public function setApplication($application) {
    $this->application = BaseObject::instantiateForSetter('\WonderPush\Obj\InstallationApplication', $application);
    return $this;
  }

  /**
   * @return InstallationDevice
   */
  public function getDevice() {
    return $this->device;
  }

  /**
   * @param InstallationDevice|array $device
   * @return Installation
   */
  public function setDevice($device) {
    $this->device = BaseObject::instantiateForSetter('\WonderPush\Obj\InstallationDevice', $device);
    return $this;
  }

  /**
   * @return InstallationPreferences
   */
  public function getPreferences() {
    return $this->preferences;
  }

  /**
   * @param InstallationPreferences|array $preferences
   * @return Installation
   */
  public function setPreferences($preferences) {
    $this->preferences = BaseObject::instantiateForSetter('\WonderPush\Obj\InstallationPreferences', $preferences);
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
   * @return Installation
   */
  public function setCustom($custom) {
    $this->custom = $custom;
    return $this;
  }

}
