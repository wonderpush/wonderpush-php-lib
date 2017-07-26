<?php

namespace WonderPush\Obj;

/**
 * DTO part base for notification button reusability.
 * @see NotificationButton
 * @codeCoverageIgnore
 */
class NotificationButton extends Object {

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
    $this->actions = Object::instantiateForSetter('\WonderPush\Obj\NotificationButtonAction[]', $actions);
    return $this;
  }

}
