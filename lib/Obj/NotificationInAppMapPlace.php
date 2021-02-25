<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO part for `notification.inApp.map.place`.
 * @see NotificationInAppMap
 * @codeCoverageIgnore
 */
class NotificationInAppMapPlace extends BaseObject {

  /** @var GeoLocation */
  private $point;
  /** @var integer */
  private $zoom;
  /** @var string */
  private $name;

  /**
   * @return GeoLocation
   */
  public function getPoint() {
    return $this->point;
  }

  /**
   * @param GeoLocation $point
   * @return NotificationInAppMapPlace
   */
  public function setPoint($point) {
    $this->point = BaseObject::instantiateForSetter('\WonderPush\Obj\GeoLocation', $point);
    return $this;
  }

  /**
   * @return integer
   */
  public function getZoom() {
    return $this->zoom;
  }

  /**
   * @param integer $zoom
   * @return NotificationInAppMapPlace
   */
  public function setZoom($zoom) {
    $this->zoom = $zoom;
    return $this;
  }

  /**
   * @return string
   */
  public function getName() {
    return $this->name;
  }

  /**
   * @param string $name
   * @return NotificationInAppMapPlace
   */
  public function setName($name) {
    $this->name = $name;
    return $this;
  }

}
