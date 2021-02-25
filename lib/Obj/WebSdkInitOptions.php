<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

class WebSdkInitOptions extends BaseObject {

  /** @var string */
  private $applicationName;
  /** @var string */
  private $applicationServerKey;
  /** @var string */
  private $customDomain;
  /** @var string */
  private $notificationDefaultUrl;
  /** @var string */
  private $notificationIcon;
  /** @var string */
  private $manifestUrl;

  /**
   * @return string
   */
  public function getApplicationName() {
    return $this->applicationName;
  }

  /**
   * @param string $applicationName
   * @return WebSdkInitOptions
   */
  public function setApplicationName($applicationName) {
    $this->applicationName = $applicationName;
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
   * @return WebSdkInitOptions
   */
  public function setApplicationServerKey($applicationServerKey) {
    $this->applicationServerKey = $applicationServerKey;
    return $this;
  }

  /**
   * @return string
   */
  public function getCustomDomain() {
    return $this->customDomain;
  }

  /**
   * @param string $customDomain
   * @return WebSdkInitOptions
   */
  public function setCustomDomain($customDomain) {
    $this->customDomain = $customDomain;
    return $this;
  }

  /**
   * @return string
   */
  public function getNotificationDefaultUrl() {
    return $this->notificationDefaultUrl;
  }

  /**
   * @param string $notificationDefaultUrl
   * @return WebSdkInitOptions
   */
  public function setNotificationDefaultUrl($notificationDefaultUrl) {
    $this->notificationDefaultUrl = $notificationDefaultUrl;
    return $this;
  }

  /**
   * @return string
   */
  public function getNotificationIcon() {
    return $this->notificationIcon;
  }

  /**
   * @param string $notificationIcon
   * @return WebSdkInitOptions
   */
  public function setNotificationIcon($notificationIcon) {
    $this->notificationIcon = $notificationIcon;
    return $this;
  }

  /**
   * @return string
   */
  public function getManifestUrl() {
    return $this->manifestUrl;
  }

  /**
   * @param string $manifestUrl
   * @return WebSdkInitOptions
   */
  public function setManifestUrl($manifestUrl) {
    $this->manifestUrl = $manifestUrl;
    return $this;
  }

  public function getByWonderPushDomain() {
    $customDomain = $this->getCustomDomain();
    if (!$customDomain) return null;
    if (strpos($customDomain, 'http://') !== 0
      && strpos($customDomain, 'https://') !== 0) {
      return $customDomain;
    }
    return null;
  }
}
