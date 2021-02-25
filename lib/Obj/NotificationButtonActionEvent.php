<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO part for notification button action `event` field.
 * @see NotificationButtonAction
 * @codeCoverageIgnore
 */
class NotificationButtonActionEvent extends BaseObject {

  /** @var string */
  protected $type;
  /** @var array */
  protected $custom;

  /**
   * @return string
   */
  public function getType() {
    return $this->type;
  }

  /**
   * @param string $type
   * @return NotificationButtonActionEvent
   */
  public function setType($type) {
    $this->type = $type;
    return $this;
  }

  /**
   * @return array
   */
  public function getCustom() {
    return $this->custom;
  }

  /**
   * @param array $custom
   * @return NotificationButtonActionEvent
   */
  public function setCustom($custom) {
    $this->custom = $custom;
    return $this;
  }

}
