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
  /** @var bool */
  private $resubscribe;

  /** @var array */
  private $allowedSubscriptionDomains;
  /** @var mixed */
  private $subscriptionNative;
  /** @var mixed */
  private $subscriptionDialog;
  /** @var mixed */
  private $subscriptionBell;
  /** @var mixed */
  private $subscriptionBlurb;
  /** @var mixed */
  private $optInOptions;
  /** @var mixed */
  private $plugins;
  /** @var string */
  private $serviceWorkerUrl;
  /** @var string */
  private $frameUrl;

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

  /**
   * @return bool
   */
  public function getResubscribe() {
    return $this->resubscribe !== false; // A missing value means "true"
  }

  /**
   * @param bool $resubscribe
   * @return WebSdkInitOptions
   */
  public function setResubscribe($resubscribe) {
    $this->resubscribe = $resubscribe !== false;
    return $this;
  }

  /**
   * @return array
   */
  public function getAllowedSubscriptionDomains() {
    return $this->allowedSubscriptionDomains;
  }

  /**
   * @param array $allowedSubscriptionDomains
   * @return WebSdkInitOptions
   */
  public function setAllowedSubscriptionDomains($allowedSubscriptionDomains) {
    $this->allowedSubscriptionDomains = $allowedSubscriptionDomains;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getSubscriptionNative() {
    return $this->subscriptionNative;
  }

  /**
   * @param mixed $subscriptionNative
   * @return WebSdkInitOptions
   */
  public function setSubscriptionNative($subscriptionNative) {
    $this->subscriptionNative = $subscriptionNative;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getSubscriptionDialog() {
    return $this->subscriptionDialog;
  }

  /**
   * @param mixed $subscriptionDialog
   * @return WebSdkInitOptions
   */
  public function setSubscriptionDialog($subscriptionDialog) {
    $this->subscriptionDialog = $subscriptionDialog;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getSubscriptionBell() {
    return $this->subscriptionBell;
  }

  /**
   * @param mixed $subscriptionBell
   * @return WebSdkInitOptions
   */
  public function setSubscriptionBell($subscriptionBell) {
    $this->subscriptionBell = $subscriptionBell;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getSubscriptionBlurb() {
    return $this->subscriptionBlurb;
  }

  /**
   * @param mixed $subscriptionBlurb
   * @return WebSdkInitOptions
   */
  public function setSubscriptionBlurb($subscriptionBlurb) {
    $this->subscriptionBlurb = $subscriptionBlurb;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getOptInOptions() {
    return $this->optInOptions;
  }

  /**
   * @param mixed $optInOptions
   * @return WebSdkInitOptions
   */
  public function setOptInOptions($optInOptions) {
    $this->optInOptions = $optInOptions;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getPlugins() {
    return $this->plugins;
  }

  /**
   * @param mixed $plugins
   * @return WebSdkInitOptions
   */
  public function setPlugins($plugins) {
    $this->plugins = $plugins;
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
   * @return WebSdkInitOptions
   */
  public function setServiceWorkerUrl($serviceWorkerUrl) {
    $this->serviceWorkerUrl = $serviceWorkerUrl;
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
   * @return WebSdkInitOptions
   */
  public function setFrameUrl($frameUrl) {
    $this->frameUrl = $frameUrl;
    return $this;
  }

}
