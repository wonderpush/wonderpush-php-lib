<?php

namespace WonderPush;

class Installation extends Object {

  /** @var string */
  private $id;
  /** @var string */
  private $userId;
  /** @var string */
  private $applicationId;
  /** @var string */
  private $accessToken;
  /** @var long */
  private $creationDate;
  /** @var long */
  private $updateDate;
  /** @var InstallationPushToken */
  private $pushToken;
  /** @var InstallationApplication */
  private $application;
  /** @var InstallationDevice */
  private $device;
  /** @var InstallationPreferences */
  private $preferences;
  /** @var array */
  private $custom;

  public function __construct($data = null) {
    parent::__construct($data);
  }

  public static function computeId($applicationId, $devicePlatform, $deviceId, $userId) {
    $id = $applicationId . ':' . $devicePlatform . ':' . $deviceId;
    if (!empty($userId)) {
      $id .= ':' . $userId;
    }
    return sha1($id);
  }

  /**
   * @return string
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @param string $id
   * @return Installation
   */
  public function setId($id) {
    $this->id = $id;
    return $this;
  }

  /**
   * @return long
   */
  public function getCreationDate() {
    return $this->creationDate;
  }

  /**
   * @param long $creationDate
   * @return Staff
   */
  public function setCreationDate($creationDate) {
    $this->creationDate = $creationDate;
    return $this;
  }

  /**
   * @return long
   */
  public function getUpdateDate() {
    return $this->updateDate;
  }

  /**
   * @param long $updateDate
   * @return Staff
   */
  public function setUpdateDate($updateDate) {
    $this->updateDate = $updateDate;
    return $this;
  }

  /**
   * @return string
   */
  public function getUserId() {
    return $this->userId;
  }

  /**
   * @param string $userId
   * @return Installation
   */
  public function setUserId($userId) {
    $this->userId = $userId;
    return $this;
  }

  /**
   * @return string
   */
  public function getApplicationId() {
    return $this->applicationId;
  }

  /**
   * @param string $applicationId
   * @return Installation
   */
  public function setApplicationId($applicationId) {
    $this->applicationId = $applicationId;
    return $this;
  }

  /**
   * @return string
   */
  public function getAccessToken() {
    return $this->accessToken;
  }

  /**
   * @param string $accessToken
   * @return Installation
   */
  public function setAccessToken($accessToken) {
    $this->accessToken = $accessToken;
    return $this;
  }

  /**
   * @return InstallationPushToken
   */
  public function getPushToken() {
    return $this->pushToken;
  }

  /**
   * @param InstallationPushToken|array $pushToken
   * @return Installation
   */
  public function setPushToken($pushToken) {
    $this->pushToken = Object::instantiateForSetter('\WonderPush\InstallationPushToken', $pushToken);
    return $this;
  }

  /**
   * @return InstallationApplication
   */
  public function getApplication() {
    return $this->application;
  }

  /**
   * @param InstallationApplication|array $application
   * @return Installation
   */
  public function setApplication($application) {
    $this->application = Object::instantiateForSetter('\WonderPush\InstallationApplication', $application);
    return $this;
  }

  /**
   * @return InstallationDevice
   */
  public function getDevice() {
    return $this->device;
  }

  /**
   * @param InstallationDevice|array $device
   * @return Installation
   */
  public function setDevice($device) {
    $this->device = Object::instantiateForSetter('\WonderPush\InstallationDevice', $device);
    return $this;
  }

  /**
   * @return InstallationPreferences
   */
  public function getPreferences() {
    return $this->preferences;
  }

  /**
   * @param InstallationPreferences|array $preferences
   * @return Installation
   */
  public function setPreferences($preferences) {
    $this->preferences = Object::instantiateForSetter('\WonderPush\InstallationPreferences', $preferences);
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
   * @return Installation
   */
  public function setCustom($custom) {
    $this->custom = $custom;
    return $this;
  }

}

class InstallationPushToken extends Object {

  /** @var string */
  private $data;
  /** @var string[] */
  private $senderIds;
  /** @var string */
  private $p256dh;
  /** @var string */
  private $auth;
  /** @var string */
  private $applicationServerKey;
  /** @var boolean */
  private $userVisibleOnly;
  /** @var array */
  private $meta;

  public function __construct($data = null) {
    parent::__construct($data);
  }

  /**
   * @return string
   */
  public function getData() {
    return $this->data;
  }

  /**
   * @param array $data
   * @return InstallationPushToken
   */
  public function setData($data) {
    $this->data = $data;
    return $this;
  }

  /**
   * @return string[]
   */
  public function getSenderIds() {
    return $this->senderIds;
  }

  /**
   * @param string[] $senderIds
   * @return InstallationPushToken
   */
  public function setSenderIds($senderIds) {
    if (is_string($senderIds)) $senderIds = explode(',', $senderIds); // transform "foo" into ["foo"] as well as comma-separated values into an array
    $this->senderIds = $senderIds;
    return $this;
  }

  /**
   * @return string
   */
  public function getP256dh() {
    return $this->p256dh;
  }

  /**
   * @param string $p256dh
   * @return InstallationPushToken
   */
  public function setP256dh($p256dh) {
    $this->p256dh = $p256dh;
    return $this;
  }

  /**
   * @return string
   */
  public function getAuth() {
    return $this->auth;
  }

  /**
   * @param string $auth
   * @return InstallationPushToken
   */
  public function setAuth($auth) {
    $this->auth = $auth;
    return $this;
  }

  /**
   * @return string
   */
  public function getApplicationServerKey() {
    return $this->applicationServerKey;
  }

  /**
   * @param string $applicationServerKey
   * @return InstallationPushToken
   */
  public function setApplicationServerKey($applicationServerKey) {
    $this->applicationServerKey = $applicationServerKey;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getUserVisibleOnly() {
    return $this->userVisibleOnly;
  }

  /**
   * @param boolean $userVisibleOnly
   * @return InstallationPushToken
   */
  public function setUserVisibleOnly($userVisibleOnly) {
    $this->userVisibleOnly = $userVisibleOnly;
    return $this;
  }

  /**
   * @return array
   */
  public function getMeta() {
    return $this->meta;
  }

  /**
   * @param array $meta
   * @return InstallationPushToken
   */
  public function setMeta($meta) {
    $this->meta = $meta;
    return $this;
  }

}

class InstallationApplication extends Object {

  /** @var string */
  private $id;
  /** @var string */
  private $version;
  /** @var string */
  private $sdkVersion;
  /** @var string */
  private $domain;
  /** @var InstallationApplicationApple */
  private $apple;

  public function __construct($data = null) {
    parent::__construct($data);
  }

  /**
   * @return string
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @param string $id
   * @return InstallationApplication
   */
  public function setId($id) {
    $this->id = $id;
    return $this;
  }

  /**
   * @return string
   */
  public function getVersion() {
    return $this->version;
  }

  /**
   * @param string $version
   * @return InstallationApplication
   */
  public function setVersion($version) {
    $this->version = $version;
    return $this;
  }

  /**
   * @return string
   */
  public function getSdkVersion() {
    return $this->sdkVersion;
  }

  /**
   * @param string $sdkVersion
   * @return InstallationApplication
   */
  public function setSdkVersion($sdkVersion) {
    $this->sdkVersion = $sdkVersion;
    return $this;
  }

  /**
   * @return string
   */
  public function getDomain() {
    return $this->domain;
  }

  /**
   * @param string $domain
   * @return InstallationApplication
   */
  public function setDomain($domain) {
    $this->domain = $domain;
    return $this;
  }

  /**
   * @return InstallationApplicationApple
   */
  public function getApple() {
    return $this->apple;
  }

  /**
   * @param InstallationApplicationApple $apple
   * @return InstallationApplication
   */
  public function setApple($apple) {
    $this->apple = Object::instantiateForSetter('\WonderPush\InstallationApplicationApple', $apple);
    return $this;
  }

}

class InstallationApplicationApple extends Object {

  /** @var string */
  private $apsEnvironment;
  /** @var string */
  private $appId;
  /** @var string[] */
  private $backgroundModes;

  public function __construct($data = null) {
    parent::__construct($data);
  }

  /**
   * @return string
   */
  public function getApsEnvironment() {
    return $this->apsEnvironment;
  }

  /**
   * @param string $apsEnvironment
   * @return InstallationApplicationApple
   */
  public function setApsEnvironment($apsEnvironment) {
    $this->apsEnvironment = $apsEnvironment;
    return $this;
  }

  /**
   * @return string
   */
  public function getAppId() {
    return $this->appId;
  }

  /**
   * @param string $appId
   * @return InstallationApplicationApple
   */
  public function setAppId($appId) {
    $this->appId = $appId;
    return $this;
  }

  /**
   * @return string[]
   */
  public function getBackgroundModes() {
    return $this->backgroundModes;
  }

  /**
   * @param string[] $backgroundModes
   * @return InstallationApplicationApple
   */
  public function setBackgroundModes($backgroundModes) {
    $this->backgroundModes = $backgroundModes;
    return $this;
  }

}

class InstallationDevice extends Object {

  /** @var string */
  private $id;
  /** @var string */
  private $platform;
  /** @var string */
  private $osVersion;
  /** @var string */
  private $brand;
  /** @var string */
  private $model;
  /** @var string */
  private $name;
  /** @var int */
  private $screenWidth;
  /** @var int */
  private $screenHeight;
  /** @var int */
  private $screenDensity;
  /** @var InstallationDeviceCapabilities */
  private $capabilities;
  /** @var InstallationDeviceConfiguration */
  private $configuration;

  public function __construct($data = null) {
    parent::__construct($data);
  }

  /**
   * @return string
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @param string $id
   * @return InstallationDevice
   */
  public function setId($id) {
    $this->id = $id;
    return $this;
  }

  /**
   * @return string
   */
  public function getPlatform() {
    return $this->platform;
  }

  /**
   * @param string $platform
   * @return InstallationDevice
   */
  public function setPlatform($platform) {
    $this->platform = $platform;
    return $this;
  }

  /**
   * @return string
   */
  public function getOsVersion() {
    return $this->osVersion;
  }

  /**
   * @param string $osVersion
   * @return InstallationDevice
   */
  public function setOsVersion($osVersion) {
    $this->osVersion = $osVersion;
    return $this;
  }

  /**
   * @return string
   */
  public function getBrand() {
    return $this->brand;
  }

  /**
   * @param string $brand
   * @return InstallationDevice
   */
  public function setBrand($brand) {
    $this->brand = $brand;
    return $this;
  }

  /**
   * @return string
   */
  public function getModel() {
    return $this->model;
  }

  /**
   * @param string $model
   * @return InstallationDevice
   */
  public function setModel($model) {
    $this->model = $model;
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
   * @return InstallationDevice
   */
  public function setName($name) {
    $this->name = $name;
    return $this;
  }

  /**
   * @return int
   */
  public function getScreenWidth() {
    return $this->screenWidth;
  }

  /**
   * @param int $screenWidth
   * @return InstallationDevice
   */
  public function setScreenWidth($screenWidth) {
    $this->screenWidth = $screenWidth;
    return $this;
  }

  /**
   * @return int
   */
  public function getScreenHeight() {
    return $this->screenHeight;
  }

  /**
   * @param int $screenHeight
   * @return InstallationDevice
   */
  public function setScreenHeight($screenHeight) {
    $this->screenHeight = $screenHeight;
    return $this;
  }

  /**
   * @return int
   */
  public function getScreenDensity() {
    return $this->screenDensity;
  }

  /**
   * @param int $screenDensity
   * @return InstallationDevice
   */
  public function setScreenDensity($screenDensity) {
    $this->screenDensity = $screenDensity;
    return $this;
  }

  /**
   * @return InstallationDeviceCapabilities
   */
  public function getCapabilities() {
    return $this->capabilities;
  }

  /**
   * @param InstallationDeviceCapabilities|array $capabilities
   * @return InstallationDevice
   */
  public function setCapabilities($capabilities) {
    $this->capabilities = Object::instantiateForSetter('\WonderPush\InstallationDeviceCapabilities', $capabilities);
    return $this;
  }

  /**
   * @return InstallationDeviceConfiguration
   */
  public function getConfiguration() {
    return $this->configuration;
  }

  /**
   * @param InstallationDeviceConfiguration $configuration
   * @return InstallationDevice
   */
  public function setConfiguration($configuration) {
    $this->configuration = Object::instantiateForSetter('\WonderPush\InstallationDeviceConfiguration', $configuration);
    return $this;
  }

}

class InstallationDeviceCapabilities extends Object {

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

  public function __construct($data = null) {
    parent::__construct($data);
  }

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

class InstallationDeviceConfiguration extends Object {

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

  public function __construct($data = null) {
    parent::__construct($data);
  }

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

class InstallationPreferences extends Object {

  const SUBSCRIPTION_STATUS_OPTIN = 'optIn';
  const SUBSCRIPTION_STATUS_OPTOUT = 'optOut'; // soft opt-out: we have a push token (and don't want to loose it), but the user wished to disable push notifications

  /** @var string */
  private $subscriptionStatus;

  public function __construct($data = null) {
    parent::__construct($data);
  }

  /**
   * @return string
   */
  public function getSubscriptionStatus() {
    return $this->subscriptionStatus;
  }

  /**
   * @param array $subscriptionStatus
   * @return InstallationPreferences
   */
  public function setSubscriptionStatus($subscriptionStatus) {
    $this->subscriptionStatus = $subscriptionStatus;
    return $this;
  }

}
