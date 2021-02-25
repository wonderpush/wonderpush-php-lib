<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO part for `notification.alert.android.buttons` items.
 * @see NotificationAlertAndroid
 * @codeCoverageIgnore
 */
class NotificationAlertAndroidButton extends NotificationButton {

  /** @var string */
  private $icon;

  /**
   * @return string
   */
  public function getIcon() {
    return $this->icon;
  }

  /**
   * @param string $icon
   * @return $this
   */
  public function setIcon($icon) {
    $this->icon = $icon;
    return $this;
  }

}
