<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO part base for notification button reusability.
 * @see NotificationButton
 * @codeCoverageIgnore
 */
class NotificationButton extends BaseObject {

  /** @var string */
  protected $label;
  /** @var string */
  protected $targetUrl;
  /** @var NotificationButtonAction[] */
  protected $actions;

  /**
   * @return string
   */
  public function getLabel() {
    return $this->label;
  }

  /**
   * @param string $label
   * @return NotificationButton
   */
  public function setLabel($label) {
    $this->label = $label;
    return $this;
  }

  /**
   * @return string
   */
  public function getTargetUrl() {
    return $this->targetUrl;
  }

  /**
   * @param string $targetUrl
   * @return NotificationButton
   */
  public function setTargetUrl($targetUrl) {
    $this->targetUrl = $targetUrl;
    return $this;
  }

  /**
   * @return NotificationButtonAction[]
   */
  public function getActions() {
    return $this->actions;
  }

  /**
   * @param NotificationButtonAction[]|array[] $actions
   * @return NotificationButton
   */
  public function setActions($actions) {
    $this->actions = BaseObject::instantiateForSetter('\WonderPush\Obj\NotificationButtonAction[]', $actions);
    return $this;
  }

}
