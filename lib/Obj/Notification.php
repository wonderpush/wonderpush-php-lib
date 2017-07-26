<?php

namespace WonderPush\Obj;

/**
 * DTO for notifications.
 *
 * See {@link https://www.wonderpush.com/docs/concepts/notifications}
 */
class Notification extends Object {

  /** @var string */
  private $id;
  /** @var string */
  private $applicationId;
  /** @var long */
  private $creationDate;
  /** @var long */
  private $updateDate;
  /** @var string */
  private $name;
  /** @var NotificationAlert */
  private $alert;
  /** @var NotificationInApp */
  private $inApp;
  /** @var NotificationPush */
  private $push;

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
   * @return long
   */
  public function getCreationDate() {
    return $this->creationDate;
  }

  /**
   * @param long $creationDate
   * @return Notification
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
   * @return Notification
   */
  public function setUpdateDate($updateDate) {
    $this->updateDate = $updateDate;
    return $this;
  }

  /**
   * @return $string
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
    $this->alert = Object::instantiateForSetter('\WonderPush\Obj\NotificationAlert', $alert);
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
    $this->inApp = Object::instantiateForSetter('\WonderPush\Obj\NotificationInApp', $inApp);
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
    $this->push = Object::instantiateForSetter('\WonderPush\Obj\NotificationPush', $push);
    return $this;
  }

}
