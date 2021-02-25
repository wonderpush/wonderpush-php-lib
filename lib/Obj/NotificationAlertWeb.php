<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO part for `notification.alert.web`.
 * @see NotificationAlert
 * @codeCoverageIgnore
 */
class NotificationAlertWeb extends NotificationAlert {

  // title is already present in the platform-independent parent object
  /** @var string */
  private $dir;
  /** @var string */
  private $lang;
  /** @var string */
  private $body;
  /** @var string */
  private $tag;
  /** @var string */
  private $icon;
  /** @var string */
  private $badge;
  /** @var string */
  private $image;
  /** @var string */
  private $sound;
  /** @var integer[] */
  private $vibrate;
  /** @var integer */
  private $timestamp;
  /** @var boolean */
  private $renotify;
  /** @var boolean */
  private $silent;
  /** @var boolean */
  private $noscreen;
  /** @var boolean */
  private $requireInteraction;
  /** @var boolean */
  private $sticky;
  /** @var NotificationAlertWebButton[] */
  private $buttons; // actual name is `actions`, but it clashes with "on click background actions"

  /**
   * @return string
   */
  public function getDir() {
    return $this->dir;
  }

  /**
   * @param string $dir
   * @return $this
   */
  public function setDir($dir) {
    $this->dir = $dir;
    return $this;
  }

  /**
   * @return string
   */
  public function getLang() {
    return $this->lang;
  }

  /**
   * @param string $lang
   * @return $this
   */
  public function setLang($lang) {
    $this->lang = $lang;
    return $this;
  }

  /**
   * @return string
   */
  public function getBody() {
    return $this->body;
  }

  /**
   * @param string $body
   * @return $this
   */
  public function setBody($body) {
    $this->body = $body;
    return $this;
  }

  /**
   * @return string
   */
  public function getTag() {
    return $this->tag;
  }

  /**
   * @param string $tag
   * @return $this
   */
  public function setTag($tag) {
    $this->tag = $tag;
    return $this;
  }

  /**
   * @return string
   */
  public function getIcon() {
    return $this->icon;
  }

  /**
   * @param string $icon
   * @return $this
   */
  public function setIcon($icon) {
    $this->icon = $icon;
    return $this;
  }

  /**
   * @return string
   */
  public function getBadge() {
    return $this->badge;
  }

  /**
   * @param string $badge
   * @return $this
   */
  public function setBadge($badge) {
    $this->badge = $badge;
    return $this;
  }

  /**
   * @return string
   */
  public function getImage() {
    return $this->image;
  }

  /**
   * @param string $image
   * @return $this
   */
  public function setImage($image) {
    $this->image = $image;
    return $this;
  }

  /**
   * @return string
   */
  public function getSound() {
    return $this->sound;
  }

  /**
   * @param string $sound
   * @return $this
   */
  public function setSound($sound) {
    $this->sound = $sound;
    return $this;
  }

  /**
   * @return integer[]
   */
  public function getVibrate() {
    return $this->vibrate;
  }

  /**
   * @param integer[] $vibrate
   * @return $this
   */
  public function setVibrate($vibrate) {
    $this->vibrate = $vibrate;
    return $this;
  }

  /**
   * @return integer Timestamp in milliseconds
   */
  public function getTimestamp() {
    return $this->timestamp;
  }

  /**
   * @param integer $timestamp Timestamp in milliseconds
   * @return $this
   */
  public function setTimestamp($timestamp) {
    $this->timestamp = $timestamp;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getRenotify() {
    return $this->renotify;
  }

  /**
   * @param boolean $renotify
   * @return $this
   */
  public function setRenotify($renotify) {
    $this->renotify = $renotify;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getSilent() {
    return $this->silent;
  }

  /**
   * @param boolean $silent
   * @return $this
   */
  public function setSilent($silent) {
    $this->silent = $silent;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getNoscreen() {
    return $this->noscreen;
  }

  /**
   * @param boolean $noscreen
   * @return $this
   */
  public function setNoscreen($noscreen) {
    $this->noscreen = $noscreen;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getRequireInteraction() {
    return $this->requireInteraction;
  }

  /**
   * @param boolean $requireInteraction
   * @return $this
   */
  public function setRequireInteraction($requireInteraction) {
    $this->requireInteraction = $requireInteraction;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getSticky() {
    return $this->sticky;
  }

  /**
   * @param boolean $sticky
   * @return $this
   */
  public function setSticky($sticky) {
    $this->sticky = $sticky;
    return $this;
  }

  /**
   * @return NotificationAlertWebButton[]
   */
  public function getButtons() {
    return $this->buttons;
  }

  /**
   * @param NotificationAlertWebButton[] $buttons
   * @return $this
   */
  public function setButtons($buttons) {
    $this->buttons = BaseObject::instantiateForSetter('\WonderPush\Obj\NotificationAlertWebButton[]', $buttons);
    return $this;
  }

}
