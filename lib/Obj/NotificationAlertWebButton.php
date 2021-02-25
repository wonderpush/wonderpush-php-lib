<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

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
