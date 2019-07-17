<?php

namespace WonderPush\Obj;

/**
 * DTO part for `notification.inApp.map`.
 * @see NotificationInApp
 * @codeCoverageIgnore
 */
class NotificationInAppMap extends BaseObject {

  /** @var NotificationInAppMapPlace */
  private $place;

  /**
   * @return NotificationInAppMapPlace
   */
  public function getPlace() {
    return $this->place;
  }

  /**
   * @param NotificationInAppMapPlace|array $place
   * @return NotificationInAppMap
   */
  public function setPlace($place) {
    $this->place = BaseObject::instantiateForSetter('\WonderPush\Obj\NotificationInAppMapPlace', $place);
    return $this;
  }

}
