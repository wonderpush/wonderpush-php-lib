<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO part for `notification.alert`.
 * @see Notification
 * @codeCoverageIgnore
 */
class NotificationAlert extends BaseObject {

  /** @var string */
  protected $text;
  /** @var string */
  protected $title;
  /** @var string */
  protected $targetUrl;
  /** @var NotificationButtonAction[] */
  protected $actions; // at open
  /** @var NotificationButtonAction[] */
  protected $receiveActions; // at reception
  /** @var NotificationAlertIos */
  protected $ios;
  /** @var NotificationAlertAndroid */
  protected $android;
  /** @var NotificationAlertWeb */
  protected $web;

  /**
   * @return string
   */
  public function getText() {
    return $this->text;
  }

  /**
   * @param string $text
   * @return NotificationAlert
   */
  public function setText($text) {
    $this->text = $text;
    return $this;
  }

  /**
   * @return string
   */
  public function getTitle() {
    return $this->title;
  }

  /**
   * @param string $title
   * @return NotificationAlert
   */
  public function setTitle($title) {
    $this->title = $title;
    return $this;
  }

  /**
   * @return string
   */
  public function getTargetUrl() {
    return $this->targetUrl;
  }

  /**
   * @param string $targetUrl
   * @return NotificationAlert
   */
  public function setTargetUrl($targetUrl) {
    $this->targetUrl = $targetUrl;
    return $this;
  }

  /**
   * @return NotificationButtonAction[]
   */
  public function getActions() {
    return $this->actions;
  }

  /**
   * @param NotificationButtonAction[]|array[] $actions
   * @return NotificationAlert
   */
  public function setActions($actions) {
    $this->actions = BaseObject::instantiateForSetter('\WonderPush\Obj\NotificationButtonAction[]', $actions);
    return $this;
  }

  /**
   * @return NotificationButtonAction[]
   */
  public function getReceiveActions() {
    return $this->receiveActions;
  }

  /**
   * @param NotificationButtonAction[]|array[] $receiveActions
   * @return NotificationAlert
   */
  public function setReceiveActions($receiveActions) {
    $this->receiveActions = BaseObject::instantiateForSetter('\WonderPush\Obj\NotificationButtonAction[]', $receiveActions);
    return $this;
  }

  /**
   * @return NotificationAlertIos
   */
  public function getIos() {
    return $this->ios;
  }

  /**
   * @param NotificationAlertIos|array $ios
   * @return NotificationAlert
   */
  public function setIos($ios) {
    $this->ios = BaseObject::instantiateForSetter('\WonderPush\Obj\NotificationAlertIos', $ios);
    return $this;
  }

  /**
   * @return NotificationAlertAndroid
   */
  public function getAndroid() {
    return $this->android;
  }

  /**
   * @param NotificationAlertAndroid|array $android
   * @return NotificationAlert
   */
  public function setAndroid($android) {
    $this->android = BaseObject::instantiateForSetter('\WonderPush\Obj\NotificationAlertAndroid', $android);
    return $this;
  }

  /**
   * @return NotificationAlertWeb
   */
  public function getWeb() {
    return $this->web;
  }

  /**
   * @param NotificationAlertWeb|array $web
   * @return NotificationAlert
   */
  public function setWeb($web) {
    $this->web = BaseObject::instantiateForSetter('\WonderPush\Obj\NotificationAlertWeb', $web);
    return $this;
  }

}
