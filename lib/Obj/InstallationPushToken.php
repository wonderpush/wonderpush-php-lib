<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO part for `installation.pushToken`.
 * @see Installation
 * @codeCoverageIgnore
 */
class InstallationPushToken extends BaseObject {

  /** @var string */
  private $data;
  /** @var string[] */
  private $senderIds;
  /** @var string */
  private $p256dh;
  /** @var string */
  private $auth;
  /** @var string */
  private $applicationServerKey;
  /** @var boolean */
  private $userVisibleOnly;
  /** @var array */
  private $meta;

  /**
   * @return string
   */
  public function getData() {
    return $this->data;
  }

  /**
   * @param array $data
   * @return InstallationPushToken
   */
  public function setData($data) {
    $this->data = $data;
    return $this;
  }

  /**
   * @return string[]
   */
  public function getSenderIds() {
    return $this->senderIds;
  }

  /**
   * @param string[]|string $senderIds
   * @return InstallationPushToken
   */
  public function setSenderIds($senderIds) {
    if (is_string($senderIds)) {
      $senderIds = explode(',', $senderIds); // transform "foo" into ["foo"] as well as comma-separated values into an array
    }
    $this->senderIds = $senderIds;
    return $this;
  }

  /**
   * @return string
   */
  public function getP256dh() {
    return $this->p256dh;
  }

  /**
   * @param string $p256dh
   * @return InstallationPushToken
   */
  public function setP256dh($p256dh) {
    $this->p256dh = $p256dh;
    return $this;
  }

  /**
   * @return string
   */
  public function getAuth() {
    return $this->auth;
  }

  /**
   * @param string $auth
   * @return InstallationPushToken
   */
  public function setAuth($auth) {
    $this->auth = $auth;
    return $this;
  }

  /**
   * @return string
   */
  public function getApplicationServerKey() {
    return $this->applicationServerKey;
  }

  /**
   * @param string $applicationServerKey
   * @return InstallationPushToken
   */
  public function setApplicationServerKey($applicationServerKey) {
    $this->applicationServerKey = $applicationServerKey;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getUserVisibleOnly() {
    return $this->userVisibleOnly;
  }

  /**
   * @param boolean $userVisibleOnly
   * @return InstallationPushToken
   */
  public function setUserVisibleOnly($userVisibleOnly) {
    $this->userVisibleOnly = $userVisibleOnly;
    return $this;
  }

  /**
   * @return array
   */
  public function getMeta() {
    return $this->meta;
  }

  /**
   * @param array $meta
   * @return InstallationPushToken
   */
  public function setMeta($meta) {
    $this->meta = $meta;
    return $this;
  }

}
