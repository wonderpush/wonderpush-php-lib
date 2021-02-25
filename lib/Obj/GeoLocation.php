<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO part for `location` fields.
 * @codeCoverageIgnore
 */
class GeoLocation extends BaseObject {

  /** @var double */
  private $lat;
  /** @var double */
  private $lon;

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
