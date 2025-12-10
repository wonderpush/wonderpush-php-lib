<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO for web domain SDK configuration.
 * @codeCoverageIgnore
 */
class WebDomainSdkConfig extends BaseObject {

  /** @var string */
  private $notificationDefaultUrl;
  /** @var string */
  private $notificationIcon;
  /** @var string */
  private $applicationName;
  /** @var string */
  private $frameUrl;
  /** @var string */
  private $serviceWorkerUrl;

  /**
   * @return string
   */
  public function getNotificationDefaultUrl() {
    return $this->notificationDefaultUrl;
  }

  /**
   * @param string $notificationDefaultUrl
   * @return WebDomainSdkConfig
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
   * @return WebDomainSdkConfig
   */
  public function setNotificationIcon($notificationIcon) {
    $this->notificationIcon = $notificationIcon;
    return $this;
  }

  /**
   * @return string
   */
  public function getApplicationName() {
    return $this->applicationName;
  }

  /**
   * @param string $applicationName
   * @return WebDomainSdkConfig
   */
  public function setApplicationName($applicationName) {
    $this->applicationName = $applicationName;
    return $this;
  }

  /**
   * @return string
   */
  public function getFrameUrl() {
    return $this->frameUrl;
  }

  /**
   * @param string $frameUrl
   * @return WebDomainSdkConfig
   */
  public function setFrameUrl($frameUrl) {
    $this->frameUrl = $frameUrl;
    return $this;
  }

  /**
   * @return string
   */
  public function getServiceWorkerUrl() {
    return $this->serviceWorkerUrl;
  }

  /**
   * @param string $serviceWorkerUrl
   * @return WebDomainSdkConfig
   */
  public function setServiceWorkerUrl($serviceWorkerUrl) {
    $this->serviceWorkerUrl = $serviceWorkerUrl;
    return $this;
  }

}