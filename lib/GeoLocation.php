<?php

namespace WonderPush;

/**
 * DTO part for `location` fields.
 */
class GeoLocation extends Object {

  /** @var double */
  private $lat;
  /** @var double */
  private $lon;

  public function __construct($data = null) {
    parent::__construct($data);
  }

  /**
   * @return double
   */
  public function getLat() {
    return $this->lat;
  }

  /**
   * @param double $lat
   * @return GeoLocation
   */
  public function setLat($lat) {
    $this->lat = $lat;
    return $this;
  }

  /**
   * @return double
   */
  public function getLon() {
    return $this->lon;
  }

  /**
   * @param double $lon
   * @return GeoLocation
   */
  public function setLon($lon) {
    $this->lon = $lon;
    return $this;
  }

}
