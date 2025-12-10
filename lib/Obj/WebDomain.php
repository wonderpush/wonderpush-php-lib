<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO for web domain configuration.
 * @codeCoverageIgnore
 */
class WebDomain extends BaseObject {

  /** @var WebDomainSdkConfig */
  private $sdkConfig;
  /** @var string */
  private $origin;

  /**
   * @return WebDomainSdkConfig
   */
  public function getSdkConfig() {
    return $this->sdkConfig;
  }

  /**
   * @param WebDomainSdkConfig|array $sdkConfig
   * @return WebDomain
   */
  public function setSdkConfig($sdkConfig) {
    if (is_array($sdkConfig) || is_object($sdkConfig)) {
      $this->sdkConfig = new WebDomainSdkConfig($sdkConfig);
    } else {
      $this->sdkConfig = $sdkConfig;
    }
    return $this;
  }

  /**
   * @return string
   */
  public function getOrigin() {
    return $this->origin;
  }

  /**
   * @param string $origin
   * @return WebDomain
   */
  public function setOrigin($origin) {
    $this->origin = $origin;
    return $this;
  }

}