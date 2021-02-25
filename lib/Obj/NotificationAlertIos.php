<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO part for `notification.alert.ios`.
 * @see NotificationAlert
 * @codeCoverageIgnore
 */
class NotificationAlertIos extends NotificationAlert {

  // title is already taken in the platform-independent parent object
  /** @var string */
  private $titleLocKey;
  /** @var string[] */
  private $titleLocArgs;
  /** @var string */
  private $body;
  /** @var string */
  private $locKey;
  /** @var string[] */
  private $locArgs;
  /** @var string */
  private $actionLocKey;
  /** @var string */
  private $launchImage;
  /** @var integer */
  private $badge;
  /** @var string */
  private $sound;
  /** @var string */
  private $category;
  /** @var integer */
  private $contentAvailable;
  /** @var integer */
  private $mutableContent;
  /** @var NotificationAlertIosForeground */
  private $foreground;
  /** @var NotificationAlertIosAttachment[] */
  private $attachments;

  /**
   * @return string
   */
  public function getTitleLocKey() {
    return $this->titleLocKey;
  }

  /**
   * @param string $titleLocKey
   * @return NotificationAlertIos
   */
  public function setTitleLocKey($titleLocKey) {
    $this->titleLocKey = $titleLocKey;
    return $this;
  }

  /**
   * @return string
   */
  public function getTitleLocArgs() {
    return $this->titleLocArgs;
  }

  /**
   * @param string $titleLocArgs
   * @return NotificationAlertIos
   */
  public function setTitleLocArgs($titleLocArgs) {
    $this->titleLocArgs = $titleLocArgs;
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
   * @return NotificationAlertIos
   */
  public function setBody($body) {
    $this->body = $body;
    return $this;
  }

  /**
   * @return string
   */
  public function getLocKey() {
    return $this->locKey;
  }

  /**
   * @param string $locKey
   * @return NotificationAlertIos
   */
  public function setLocKey($locKey) {
    $this->locKey = $locKey;
    return $this;
  }

  /**
   * @return string[]
   */
  public function getLocArgs() {
    return $this->locArgs;
  }

  /**
   * @param string[] $locArgs
   * @return NotificationAlertIos
   */
  public function setLocArgs($locArgs) {
    $this->locArgs = $locArgs;
    return $this;
  }

  /**
   * @return string
   */
  public function getActionLocKey() {
    return $this->actionLocKey;
  }

  /**
   * @param string $actionLocKey
   * @return NotificationAlertIos
   */
  public function setActionLocKey($actionLocKey) {
    $this->actionLocKey = $actionLocKey;
    return $this;
  }

  /**
   * @return string
   */
  public function getLaunchImage() {
    return $this->launchImage;
  }

  /**
   * @param string $launchImage
   * @return NotificationAlertIos
   */
  public function setLaunchImage($launchImage) {
    $this->launchImage = $launchImage;
    return $this;
  }

  /**
   * @return integer
   */
  public function getBadge() {
    return $this->badge;
  }

  /**
   * @param integer $badge
   * @return NotificationAlertIos
   */
  public function setBadge($badge) {
    $this->badge = $badge;
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
   * @return NotificationAlertIos
   */
  public function setSound($sound) {
    $this->sound = $sound;
    return $this;
  }

  /**
   * @return string
   */
  public function getCategory() {
    return $this->category;
  }

  /**
   * @param string $category
   * @return NotificationAlertIos
   */
  public function setCategory($category) {
    $this->category = $category;
    return $this;
  }

  /**
   * @return integer
   */
  public function getContentAvailable() {
    return $this->contentAvailable;
  }

  /**
   * @param integer $contentAvailable
   * @return NotificationAlertIos
   */
  public function setContentAvailable($contentAvailable) {
    $this->contentAvailable = $contentAvailable;
    return $this;
  }

  /**
   * @return integer
   */
  public function getMutableContent() {
    return $this->mutableContent;
  }

  /**
   * @param integer $mutableContent
   * @return NotificationAlertIos
   */
  public function setMutableContent($mutableContent) {
    $this->mutableContent = $mutableContent;
    return $this;
  }

  /**
   * @return NotificationAlertIosForeground
   */
  public function getForeground() {
    return $this->foreground;
  }

  /**
   * @param NotificationAlertIosForeground|array $foreground
   * @return NotificationAlertIos
   */
  public function setForeground($foreground) {
    $this->foreground = BaseObject::instantiateForSetter('\WonderPush\Obj\NotificationAlertIosForeground', $foreground);
    return $this;
  }

  /**
   * @return NotificationAlertIosAttachment[]
   */
  public function getAttachments() {
    return $this->attachments;
  }

  /**
   * @param NotificationAlertIosAttachment[]|array[] $attachments
   * @return NotificationAlertIos
   */
  public function setAttachments($attachments) {
    $this->attachments = BaseObject::instantiateForSetter('\WonderPush\Obj\NotificationAlertIosAttachment[]', $attachments);
    return $this;
  }

}
