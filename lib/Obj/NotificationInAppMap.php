<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

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
