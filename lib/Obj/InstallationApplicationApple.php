<?php

namespace WonderPush\Obj;

/**
 * DTO part for `installation.application.apple`.
 * @see InstallationApplication
 * @codeCoverageIgnore
 */
class InstallationApplicationApple extends BaseObject {

  /** @var string */
  private $apsEnvironment;
  /** @var string */
  private $appId;
  /** @var string[] */
  private $backgroundModes;

  /**
   * @return string
   */
  public function getApsEnvironment() {
    return $this->apsEnvironment;
  }

  /**
   * @param string $apsEnvironment
   * @return InstallationApplicationApple
   */
  public function setApsEnvironment($apsEnvironment) {
    $this->apsEnvironment = $apsEnvironment;
    return $this;
  }

  /**
   * @return string
   */
  public function getAppId() {
    return $this->appId;
  }

  /**
   * @param string $appId
   * @return InstallationApplicationApple
   */
  public function setAppId($appId) {
    $this->appId = $appId;
    return $this;
  }

  /**
   * @return string[]
   */
  public function getBackgroundModes() {
    return $this->backgroundModes;
  }

  /**
   * @param string[] $backgroundModes
   * @return InstallationApplicationApple
   */
  public function setBackgroundModes($backgroundModes) {
    $this->backgroundModes = $backgroundModes;
    return $this;
  }

}
