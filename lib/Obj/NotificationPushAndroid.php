<?php

namespace WonderPush\Obj;

/**
 * DTO part for `notification.push.android`.
 * @see NotificationPush
 * @codeCoverageIgnore
 */
class NotificationPushAndroid extends NotificationPush {

  /** @var boolean */
  private $delayWhileIdle;
  /** @var string */
  private $collapseKey;
  /** @var string */
  private $restrictedPackageName;

  /**
   * @return boolean
   */
  public function getDelayWhileIdle() {
    return $this->delayWhileIdle;
  }

  /**
   * @param boolean $delayWhileIdle
   * @return $this
   */
  public function setDelayWhileIdle($delayWhileIdle) {
    $this->delayWhileIdle = $delayWhileIdle;
    return $this;
  }

  /**
   * @return string
   */
  public function getCollapseKey() {
    return $this->collapseKey;
  }

  /**
   * @param string $collapseKey
   * @return $this
   */
  public function setCollapseKey($collapseKey) {
    $this->collapseKey = $collapseKey;
    return $this;
  }

  /**
   * @return string
   */
  public function getRestrictedPackageName() {
    return $this->restrictedPackageName;
  }

  /**
   * @param string $restrictedPackageName
   * @return $this
   */
  public function setRestrictedPackageName($restrictedPackageName) {
    $this->restrictedPackageName = $restrictedPackageName;
    return $this;
  }

}
