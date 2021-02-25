<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO part base for notification button action reusability.
 * @see NotificationButton
 * @codeCoverageIgnore
 */
class NotificationButtonAction extends BaseObject {

  const TYPE_CLOSE = 'close';
  const TYPE_METHOD = 'method';
  const TYPE_TRACKEVENT = 'trackEvent';
  const TYPE_UPDATE_INSTALLATION = 'updateInstallation';
  const TYPE_RESYNC_INSTALLATION = 'resyncInstallation';
  const TYPE__DUMP_STATE = '_dumpState';
  const TYPE__OVERRIDE_SET_LOGGING = '_overrideSetLogging';
  const TYPE__OVERRIDE_NOTIFICATION_RECEIPT = '_overrideNotificationReceipt';
  const TYPE_LINK = 'link';
  const TYPE_RATING = 'rating';
  const TYPE_MAP_OPEN = 'mapOpen';

  public static function listTypes() {
    return array(
        self::TYPE_CLOSE,
        self::TYPE_METHOD,
        self::TYPE_TRACKEVENT,
        self::TYPE_UPDATE_INSTALLATION,
        self::TYPE_LINK,
        self::TYPE_RATING,
        self::TYPE_MAP_OPEN,
    );
  }

  /** @var string A TYPE_* constant */
  protected $type;
  /** @var string */
  protected $method; // for TYPE_METHOD
  /** @var string */
  protected $methodArg; // for TYPE_METHOD
  /** @var string */
  protected $url; // for TYPE_LINK
  /** @var NotificationButtonActionEvent */
  protected $event; // for TYPE_TRACKEVENT
  /** @var array */
  protected $custom; // for TYPE_UPDATE_INSTALLATION (deprecated in favor of $installation)
  /** @var Installation */
  protected $installation; // for TYPE_UPDATE_INSTALLATION and TYPE_RESYNC_INSTALLATION
  /** @var boolean */
  protected $appliedServerSide; // for TYPE_UPDATE_INSTALLATION
  /** @var boolean */
  protected $reset; // for TYPE_RESYNC_INSTALLATION
  /** @var boolean */
  protected $force; // for TYPE_RESYNC_INSTALLATION, TYPE__OVERRIDE_SET_LOGGING and TYPE__OVERRIDE_NOTIFICATION_RECEIPT

  /**
   * @return string A TYPE_* constant
   */
  public function getType() {
    return $this->type;
  }

  /**
   * @param string $type A TYPE_* constant
   * @return NotificationButtonAction
   */
  public function setType($type) {
    $this->type = $type;
    return $this;
  }

  /**
   * @return string
   */
  public function getMethod() {
    return $this->method;
  }

  /**
   * @param string $method
   * @return NotificationButtonAction
   */
  public function setMethod($method) {
    $this->method = $method;
    return $this;
  }

  /**
   * @return string
   */
  public function getMethodArg() {
    return $this->methodArg;
  }

  /**
   * @param string $methodArg
   * @return NotificationButtonAction
   */
  public function setMethodArg($methodArg) {
    $this->methodArg = $methodArg;
    return $this;
  }

  /**
   * @return string
   */
  public function getUrl() {
    return $this->url;
  }

  /**
   * @param string $url
   * @return NotificationButtonAction
   */
  public function setUrl($url) {
    $this->url = $url;
    return $this;
  }

  /**
   * @return NotificationButtonActionEvent
   */
  public function getEvent() {
    return $this->event;
  }

  /**
   * @param NotificationButtonActionEvent|array $event
   * @return NotificationButtonAction
   */
  public function setEvent($event) {
    $this->event = BaseObject::instantiateForSetter('\WonderPush\Obj\NotificationButtonActionEvent', $event);
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
   * @return NotificationButtonAction
   */
  public function setCustom($custom) {
    $this->custom = $custom;
    return $this;
  }

  /**
   * @return Installation
   */
  public function getInstallation() {
    return $this->installation;
  }

  /**
   * @param Installation|array $installation
   * @return NotificationButtonAction
   */
  public function setInstallation($installation) {
    $this->installation = BaseObject::instantiateForSetter('\WonderPush\Obj\Installation', $installation);
    return $this;
  }

  /**
   * @return boolean
   */
  public function getAppliedServerSide() {
    return $this->appliedServerSide;
  }

  /**
   * @param boolean $appliedServerSide
   * @return NotificationButtonAction
   */
  public function setAppliedServerSide($appliedServerSide) {
    $this->appliedServerSide = $appliedServerSide;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getReset() {
    return $this->reset;
  }

  /**
   * @param boolean $reset
   * @return NotificationButtonAction
   */
  public function setReset($reset) {
    $this->reset = $reset;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getForce() {
    return $this->force;
  }

  /**
   * @param boolean $force
   * @return NotificationButtonAction
   */
  public function setForce($force) {
    $this->force = $force;
    return $this;
  }

}
