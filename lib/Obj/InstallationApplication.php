<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO part for `installation.application`.
 * @see Installation
 * @codeCoverageIgnore
 */
class InstallationApplication extends BaseObject {

  /** @var string */
  private $id;
  /** @var string */
  private $version;
  /** @var string */
  private $sdkVersion;
  /** @var string */
  private $domain;
  /** @var InstallationApplicationApple */
  private $apple;

  /**
   * @return string
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @param string $id
   * @return InstallationApplication
   */
  public function setId($id) {
    $this->id = $id;
    return $this;
  }

  /**
   * @return string
   */
  public function getVersion() {
    return $this->version;
  }

  /**
   * @param string $version
   * @return InstallationApplication
   */
  public function setVersion($version) {
    $this->version = $version;
    return $this;
  }

  /**
   * @return string
   */
  public function getSdkVersion() {
    return $this->sdkVersion;
  }

  /**
   * @param string $sdkVersion
   * @return InstallationApplication
   */
  public function setSdkVersion($sdkVersion) {
    $this->sdkVersion = $sdkVersion;
    return $this;
  }

  /**
   * @return string
   */
  public function getDomain() {
    return $this->domain;
  }

  /**
   * @param string $domain
   * @return InstallationApplication
   */
  public function setDomain($domain) {
    $this->domain = $domain;
    return $this;
  }

  /**
   * @return InstallationApplicationApple
   */
  public function getApple() {
    return $this->apple;
  }

  /**
   * @param InstallationApplicationApple $apple
   * @return InstallationApplication
   */
  public function setApple($apple) {
    $this->apple = BaseObject::instantiateForSetter('\WonderPush\Obj\InstallationApplicationApple', $apple);
    return $this;
  }

}
