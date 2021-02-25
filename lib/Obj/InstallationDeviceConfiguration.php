<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO part for `installation.device.configuration`.
 * @see InstallationDevice
 * @codeCoverageIgnore
 */
class InstallationDeviceConfiguration extends BaseObject {

  /** @var string */
  private $timeZone;
  /** @var string */
  private $locale;
  /** @var string */
  private $country;
  /** @var string */
  private $currency;
  /** @var string */
  private $carrier;

  /**
   * @return string
   */
  public function getTimeZone() {
    return $this->timeZone;
  }

  /**
   * @param string $timeZone
   * @return InstallationDeviceConfiguration
   */
  public function setTimeZone($timeZone) {
    $this->timeZone = $timeZone;
    return $this;
  }

  /**
   * @return string
   */
  public function getLocale() {
    return $this->locale;
  }

  /**
   * @param string $locale
   * @return InstallationDeviceConfiguration
   */
  public function setLocale($locale) {
    $this->locale = $locale;
    return $this;
  }

  /**
   * @return string
   */
  public function getCountry() {
    return $this->country;
  }

  /**
   * @param string $country
   * @return InstallationDeviceConfiguration
   */
  public function setCountry($country) {
    $this->country = $country;
    return $this;
  }

  /**
   * @return string
   */
  public function getCurrency() {
    return $this->currency;
  }

  /**
   * @param string $currency
   * @return InstallationDeviceConfiguration
   */
  public function setCurrency($currency) {
    $this->currency = $currency;
    return $this;
  }

  /**
   * @return string
   */
  public function getCarrier() {
    return $this->carrier;
  }

  /**
   * @param string $carrier
   * @return InstallationDeviceConfiguration
   */
  public function setCarrier($carrier) {
    $this->carrier = $carrier;
    return $this;
  }

}
