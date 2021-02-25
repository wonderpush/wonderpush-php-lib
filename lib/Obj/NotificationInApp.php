<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO part for `notification.inApp`.
 * @see Notification
 * @codeCoverageIgnore
 */
class NotificationInApp extends BaseObject {

  const TYPE_TEXT = 'text';
  const TYPE_HTML = 'html';
  const TYPE_URL = 'url';
  const TYPE_MAP = 'map';

  public static function listTypes() {
    return array(
        self::TYPE_TEXT,
        self::TYPE_HTML,
        self::TYPE_URL,
        self::TYPE_MAP,
    );
  }

  /** @var string A NotificationType constant */
  private $type;
  /** @var string */
  private $title;
  /** @var string */
  private $message;
  /** @var NotificationInAppMap */
  private $map;
  /** @var string */
  private $url;
  /** @var NotificationInAppButton[] */
  private $buttons;

  /**
   * @return string A NotificationType constant
   */
  public function getType() {
    return $this->type;
  }

  /**
   * @param string $type A NotificationType constant
   * @return NotificationInApp
   */
  public function setType($type) {
    $this->type = $type;
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
   * @return NotificationInApp
   */
  public function setTitle($title) {
    $this->title = $title;
    return $this;
  }

  /**
   * @return string
   */
  public function getMessage() {
    return $this->message;
  }

  /**
   * @param string $message
   * @return NotificationInApp
   */
  public function setMessage($message) {
    $this->message = $message;
    return $this;
  }

  /**
   * @return NotificationInAppMap
   */
  public function getMap() {
    return $this->map;
  }

  /**
   * @param NotificationInAppMap|array $map
   * @return NotificationInApp
   */
  public function setMap($map) {
    $this->map = BaseObject::instantiateForSetter('\WonderPush\Obj\NotificationInAppMap', $map);
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
   * @return NotificationInApp
   */
  public function setUrl($url) {
    $this->url = $url;
    return $this;
  }

  /**
   * @return NotificationInAppButton[]
   */
  public function getButtons() {
    return $this->buttons;
  }

  /**
   * @param NotificationInAppButton[]|array[] $buttons
   * @return NotificationInApp
   */
  public function setButtons($buttons) {
    $this->buttons = BaseObject::instantiateForSetter('\WonderPush\Obj\NotificationInAppButton[]', $buttons);
    return $this;
  }

}
