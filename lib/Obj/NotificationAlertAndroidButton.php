<?php

namespace WonderPush\Obj;

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
