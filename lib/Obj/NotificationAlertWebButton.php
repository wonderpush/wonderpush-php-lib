<?php

namespace WonderPush\Obj;

/**
 * DTO part for `notification.alert.web.buttons` items.
 * @see NotificationAlertWeb
 * @codeCoverageIgnore
 */
class NotificationAlertWebButton extends NotificationButton {

  /** @var string */
  private $action;
  /** @var string */
  private $icon;

  /**
   * @return string
   */
  public function getAction() {
    return $this->action;
  }

  /**
   * @param string $action
   * @return NotificationAlertWebButton
   */
  public function setAction($action) {
    $this->action = $action;
    return $this;
  }

  /**
   * @return string
   */
  public function getIcon() {
    return $this->icon;
  }

  /**
   * @param string $icon
   * @return NotificationAlertWebButton
   */
  public function setIcon($icon) {
    $this->icon = $icon;
    return $this;
  }

}
