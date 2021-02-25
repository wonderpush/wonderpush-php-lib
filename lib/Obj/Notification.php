<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO for notifications.
 *
 * See {@link https://www.wonderpush.com/docs/concepts/notifications}
 * @codeCoverageIgnore
 */
class Notification extends BaseObject {

  /** @var string */
  private $id;
  /** @var string */
  private $applicationId;
  /** @var integer */
  private $creationDate;
  /** @var integer */
  private $updateDate;
  /** @var string */
  private $name;
  /** @var NotificationAlert */
  private $alert;
  /** @var NotificationInApp */
  private $inApp;
  /** @var NotificationPush */
  private $push;

  /**
   * @return string
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @param string $id
   * @return Notification
   */
  public function setId($id) {
    $this->id = $id;
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
   * @return Notification
   */
  public function setApplicationId($applicationId) {
    $this->applicationId = $applicationId;
    return $this;
  }

  /**
   * @return integer
   */
  public function getCreationDate() {
    return $this->creationDate;
  }

  /**
   * @param integer $creationDate
   * @return Notification
   */
  public function setCreationDate($creationDate) {
    $this->creationDate = $creationDate;
    return $this;
  }

  /**
   * @return integer
   */
  public function getUpdateDate() {
    return $this->updateDate;
  }

  /**
   * @param integer $updateDate
   * @return Notification
   */
  public function setUpdateDate($updateDate) {
    $this->updateDate = $updateDate;
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
   * @return Notification
   */
  public function setName($name) {
    $this->name = $name;
    return $this;
  }

  /**
   * @return NotificationAlert
   */
  public function getAlert() {
    return $this->alert;
  }

  /**
   * @param NotificationAlert|array $alert
   * @return Notification
   */
  public function setAlert($alert) {
    $this->alert = BaseObject::instantiateForSetter('\WonderPush\Obj\NotificationAlert', $alert);
    return $this;
  }

  /**
   * @return NotificationInApp
   */
  public function getInApp() {
    return $this->inApp;
  }

  /**
   * @param NotificationInApp|array $inApp
   * @return Notification
   */
  public function setInApp($inApp) {
    $this->inApp = BaseObject::instantiateForSetter('\WonderPush\Obj\NotificationInApp', $inApp);
    return $this;
  }

  /**
   * @return NotificationPush
   */
  public function getPush() {
    return $this->push;
  }

  /**
   * @param NotificationPush|array $push
   * @return Notification
   */
  public function setPush($push) {
    $this->push = BaseObject::instantiateForSetter('\WonderPush\Obj\NotificationPush', $push);
    return $this;
  }

}
