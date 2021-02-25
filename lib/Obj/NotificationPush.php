<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO part for `notification.push`.
 * @see Notification
 * @codeCoverageIgnore
 */
class NotificationPush extends BaseObject {

  const PRIORITY_NORMAL = 'normal';
  const PRIORITY_HIGH   = 'high';

  /** @var array **/
  protected $custom;
  /** @var array **/
  protected $payload;
  /** @var integer */
  protected $expirationDate;
  /** @var integer */
  protected $expirationTime;
  /** @var string */
  protected $priority;
  /** @var NotificationPushAndroid */
  protected $android;
  /** @var NotificationPushIos */
  protected $ios;
  /** @var NotificationPushWeb */
  protected $web;

  /**
   * @return array
   */
  public function getCustom() {
    return $this->custom;
  }

  /**
   * @param array $custom
   * @return NotificationPush
   */
  public function setCustom($custom) {
    $this->custom = $custom;
    return $this;
  }

  /**
   * @return array
   */
  public function getPayload() {
    return $this->payload;
  }

  /**
   * @param array $payload
   * @return NotificationPush
   */
  public function setPayload($payload) {
    $this->payload = $payload;
    return $this;
  }

  /**
   * @return integer
   */
  public function getExpirationDate() {
    return $this->expirationDate;
  }

  /**
   * @param integer|string|\DateTime $expirationDate
   * @return NotificationPush
   */
  public function setExpirationDate($expirationDate) {
    if ($expirationDate === null) {
      $this->expirationDate = null;
    } else if (is_int($expirationDate)) {
      $this->expirationDate = $expirationDate;
    } else if (is_string($expirationDate)) {
      $this->expirationDate = \WonderPush\Util\TimeUtil::getMillisecondTimestampFromDateTime(
          \WonderPush\Util\TimeUtil::parseISO8601DateOptionalTime($expirationDate)
      );
    } else if ($expirationDate instanceof \DateTime) {
      $this->expirationDate = \WonderPush\Util\TimeUtil::getMillisecondTimestampFromDateTime($expirationDate);
    } else {
      $this->expirationDate = null;
    }
    return $this;
  }

  /**
   * @return integer
   */
  public function getExpirationTime() {
    return $this->expirationTime;
  }

  /**
   * @param integer|string $expirationTime
   * @return NotificationPush
   */
  public function setExpirationTime($expirationTime) {
    $this->expirationTime = \WonderPush\Util\TimeValue::parse($expirationTime);
    if ($this->expirationTime instanceof \WonderPush\Util\TimeValue) {
      $this->expirationTime = $this->expirationTime->toMilliseconds();
    }
    return $this;
  }

  /**
   * @return string
   */
  public function getPriority() {
    return $this->priority;
  }

  /**
   * @param string $priority
   * @return NotificationPush
   */
  public function setPriority($priority) {
    $this->priority = $priority;
    return $this;
  }

  /**
   * @return NotificationPushAndroid
   */
  public function getAndroid() {
    return $this->android;
  }

  /**
   * @param NotificationPushAndroid|array $android
   * @return NotificationPush
   */
  public function setAndroid($android) {
    $this->android = BaseObject::instantiateForSetter('\WonderPush\Obj\NotificationPushAndroid', $android);
    return $this;
  }

  /**
   * @return NotificationPushIos
   */
  public function getIos() {
    return $this->ios;
  }

  /**
   * @param NotificationPushIos|array $ios
   * @return NotificationPush
   */
  public function setIos($ios) {
    $this->ios = BaseObject::instantiateForSetter('\WonderPush\Obj\NotificationPushIos', $ios);
    return $this;
  }

  /**
   * @return NotificationPushWeb
   */
  public function getWeb() {
    return $this->web;
  }

  /**
   * @param NotificationPushWeb|array $web
   * @return NotificationPush
   */
  public function setWeb($web) {
    $this->web = BaseObject::instantiateForSetter('\WonderPush\Obj\NotificationPushWeb', $web);
    return $this;
  }

}
