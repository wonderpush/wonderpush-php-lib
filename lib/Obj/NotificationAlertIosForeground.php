<?php

namespace WonderPush\Obj;

/**
 * DTO part for `notification.alert.ios.foreground`.
 * @see NotificationAlertIos
 * @codeCoverageIgnore
 */
class NotificationAlertIosForeground extends BaseObject {

  /** @var boolean */
  protected $autoOpen;
  /** @var boolean */
  protected $autoDrop;

  /**
   * @return boolean
   */
  public function getAutoOpen() {
    return $this->autoOpen;
  }

  /**
   * @param boolean $autoOpen
   * @return NotificationAlertIosForeground
   */
  public function setAutoOpen($autoOpen) {
    $this->autoOpen = $autoOpen;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getAutoDrop() {
    return $this->autoDrop;
  }

  /**
   * @param boolean $autoDrop
   * @return NotificationAlertIosForeground
   */
  public function setAutoDrop($autoDrop) {
    $this->autoDrop = $autoDrop;
    return $this;
  }

}
