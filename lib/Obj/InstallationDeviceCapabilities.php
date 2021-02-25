<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO part for `installation.device.capabilities`.
 * @see InstallationDevice
 * @codeCoverageIgnore
 */
class InstallationDeviceCapabilities extends BaseObject {

  /** @var boolean */
  private $bluetooth;
  /** @var boolean */
  private $bluetoothLe;
  /** @var boolean */
  private $nfc;
  /** @var boolean */
  private $ir;
  /** @var boolean */
  private $telephony;
  /** @var boolean */
  private $telephonyGsm;
  /** @var boolean */
  private $telephonyCdma;
  /** @var boolean */
  private $wifi;
  /** @var boolean */
  private $wifiDirect;
  /** @var boolean */
  private $gps;
  /** @var boolean */
  private $networkLocation;
  /** @var boolean */
  private $camera;
  /** @var boolean */
  private $frontCamera;
  /** @var boolean */
  private $microphone;
  /** @var boolean */
  private $sensorAccelerometer;
  /** @var boolean */
  private $sensorBarometer;
  /** @var boolean */
  private $sensorCompass;
  /** @var boolean */
  private $sensorGyroscope;
  /** @var boolean */
  private $sensorLight;
  /** @var boolean */
  private $sensorProximity;
  /** @var boolean */
  private $sensorStepCounter;
  /** @var boolean */
  private $sensorStepDetector;
  /** @var boolean */
  private $sip;
  /** @var boolean */
  private $sipVoip;
  /** @var boolean */
  private $touchscreen;
  /** @var boolean */
  private $touchscreenTwoFingers;
  /** @var boolean */
  private $touchscreenDistinct;
  /** @var boolean */
  private $touchscreenFullHand;
  /** @var boolean */
  private $usbAccessory;
  /** @var boolean */
  private $usbHost;

  /**
   * @return boolean
   */
  public function getBluetooth() {
    return $this->bluetooth;
  }

  /**
   * @param boolean $bluetooth
   * @return InstallationDeviceCapabilities
   */
  public function setBluetooth($bluetooth) {
    $this->bluetooth = $bluetooth;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getBluetoothLe() {
    return $this->bluetoothLe;
  }

  /**
   * @param boolean $bluetoothLe
   * @return InstallationDeviceCapabilities
   */
  public function setBluetoothLe($bluetoothLe) {
    $this->bluetoothLe = $bluetoothLe;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getNfc() {
    return $this->nfc;
  }

  /**
   * @param boolean $nfc
   * @return InstallationDeviceCapabilities
   */
  public function setNfc($nfc) {
    $this->nfc = $nfc;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getIr() {
    return $this->ir;
  }

  /**
   * @param boolean $ir
   * @return InstallationDeviceCapabilities
   */
  public function setIr($ir) {
    $this->ir = $ir;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getTelephony() {
    return $this->telephony;
  }

  /**
   * @param boolean $telephony
   * @return InstallationDeviceCapabilities
   */
  public function setTelephony($telephony) {
    $this->telephony = $telephony;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getTelephonyGsm() {
    return $this->telephonyGsm;
  }

  /**
   * @param boolean $telephonyGsm
   * @return InstallationDeviceCapabilities
   */
  public function setTelephonyGsm($telephonyGsm) {
    $this->telephonyGsm = $telephonyGsm;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getTelephonyCdma() {
    return $this->telephonyCdma;
  }

  /**
   * @param boolean $telephonyCdma
   * @return InstallationDeviceCapabilities
   */
  public function setTelephonyCdma($telephonyCdma) {
    $this->telephonyCdma = $telephonyCdma;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getWifi() {
    return $this->wifi;
  }

  /**
   * @param boolean $wifi
   * @return InstallationDeviceCapabilities
   */
  public function setWifi($wifi) {
    $this->wifi = $wifi;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getWifiDirect() {
    return $this->wifiDirect;
  }

  /**
   * @param boolean $wifiDirect
   * @return InstallationDeviceCapabilities
   */
  public function setWifiDirect($wifiDirect) {
    $this->wifiDirect = $wifiDirect;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getGps() {
    return $this->gps;
  }

  /**
   * @param boolean $gps
   * @return InstallationDeviceCapabilities
   */
  public function setGps($gps) {
    $this->gps = $gps;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getNetworkLocation() {
    return $this->networkLocation;
  }

  /**
   * @param boolean $networkLocation
   * @return InstallationDeviceCapabilities
   */
  public function setNetworkLocation($networkLocation) {
    $this->networkLocation = $networkLocation;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getCamera() {
    return $this->camera;
  }

  /**
   * @param boolean $camera
   * @return InstallationDeviceCapabilities
   */
  public function setCamera($camera) {
    $this->camera = $camera;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getFrontCamera() {
    return $this->frontCamera;
  }

  /**
   * @param boolean $frontCamera
   * @return InstallationDeviceCapabilities
   */
  public function setFrontCamera($frontCamera) {
    $this->frontCamera = $frontCamera;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getMicrophone() {
    return $this->microphone;
  }

  /**
   * @param boolean $microphone
   * @return InstallationDeviceCapabilities
   */
  public function setMicrophone($microphone) {
    $this->microphone = $microphone;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getSensorAccelerometer() {
    return $this->sensorAccelerometer;
  }

  /**
   * @param boolean $sensorAccelerometer
   * @return InstallationDeviceCapabilities
   */
  public function setSensorAccelerometer($sensorAccelerometer) {
    $this->sensorAccelerometer = $sensorAccelerometer;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getSensorBarometer() {
    return $this->sensorBarometer;
  }

  /**
   * @param boolean $sensorBarometer
   * @return InstallationDeviceCapabilities
   */
  public function setSensorBarometer($sensorBarometer) {
    $this->sensorBarometer = $sensorBarometer;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getSensorCompass() {
    return $this->sensorCompass;
  }

  /**
   * @param boolean $sensorCompass
   * @return InstallationDeviceCapabilities
   */
  public function setSensorCompass($sensorCompass) {
    $this->sensorCompass = $sensorCompass;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getSensorGyroscope() {
    return $this->sensorGyroscope;
  }

  /**
   * @param boolean $sensorGyroscope
   * @return InstallationDeviceCapabilities
   */
  public function setSensorGyroscope($sensorGyroscope) {
    $this->sensorGyroscope = $sensorGyroscope;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getSensorLight() {
    return $this->sensorLight;
  }

  /**
   * @param boolean $sensorLight
   * @return InstallationDeviceCapabilities
   */
  public function setSensorLight($sensorLight) {
    $this->sensorLight = $sensorLight;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getSensorProximity() {
    return $this->sensorProximity;
  }

  /**
   * @param boolean $sensorProximity
   * @return InstallationDeviceCapabilities
   */
  public function setSensorProximity($sensorProximity) {
    $this->sensorProximity = $sensorProximity;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getSensorStepCounter() {
    return $this->sensorStepCounter;
  }

  /**
   * @param boolean $sensorStepCounter
   * @return InstallationDeviceCapabilities
   */
  public function setSensorStepCounter($sensorStepCounter) {
    $this->sensorStepCounter = $sensorStepCounter;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getSensorStepDetector() {
    return $this->sensorStepDetector;
  }

  /**
   * @param boolean $sensorStepDetector
   * @return InstallationDeviceCapabilities
   */
  public function setSensorStepDetector($sensorStepDetector) {
    $this->sensorStepDetector = $sensorStepDetector;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getSip() {
    return $this->sip;
  }

  /**
   * @param boolean $sip
   * @return InstallationDeviceCapabilities
   */
  public function setSip($sip) {
    $this->sip = $sip;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getSipVoip() {
    return $this->sipVoip;
  }

  /**
   * @param boolean $sipVoip
   * @return InstallationDeviceCapabilities
   */
  public function setSipVoip($sipVoip) {
    $this->sipVoip = $sipVoip;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getTouchscreen() {
    return $this->touchscreen;
  }

  /**
   * @param boolean $touchscreen
   * @return InstallationDeviceCapabilities
   */
  public function setTouchscreen($touchscreen) {
    $this->touchscreen = $touchscreen;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getTouchscreenTwoFingers() {
    return $this->touchscreenTwoFingers;
  }

  /**
   * @param boolean $touchscreenTwoFingers
   * @return InstallationDeviceCapabilities
   */
  public function setTouchscreenTwoFingers($touchscreenTwoFingers) {
    $this->touchscreenTwoFingers = $touchscreenTwoFingers;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getTouchscreenDistinct() {
    return $this->touchscreenDistinct;
  }

  /**
   * @param boolean $touchscreenDistinct
   * @return InstallationDeviceCapabilities
   */
  public function setTouchscreenDistinct($touchscreenDistinct) {
    $this->touchscreenDistinct = $touchscreenDistinct;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getTouchscreenFullHand() {
    return $this->touchscreenFullHand;
  }

  /**
   * @param boolean $touchscreenFullHand
   * @return InstallationDeviceCapabilities
   */
  public function setTouchscreenFullHand($touchscreenFullHand) {
    $this->touchscreenFullHand = $touchscreenFullHand;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getUsbAccessory() {
    return $this->usbAccessory;
  }

  /**
   * @param boolean $usbAccessory
   * @return InstallationDeviceCapabilities
   */
  public function setUsbAccessory($usbAccessory) {
    $this->usbAccessory = $usbAccessory;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getUsbHost() {
    return $this->usbHost;
  }

  /**
   * @param boolean $usbHost
   * @return InstallationDeviceCapabilities
   */
  public function setUsbHost($usbHost) {
    $this->usbHost = $usbHost;
    return $this;
  }

}
