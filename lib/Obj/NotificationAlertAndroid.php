<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO part for `notification.alert.android`.
 * @see NotificationAlert
 * @codeCoverageIgnore
 */
class NotificationAlertAndroid extends NotificationAlert {

  /** @var string */
  protected $type;
  /** @var string */
  protected $channel;
  /** @var boolean */
  protected $html;
  ///** @var string */
  //protected $title; // already defined in the parent class
  ///** @var string */
  //protected $text; // already defined in the parent class
  /** @var string */
  protected $subText;
  /** @var string */
  protected $info;
  /** @var string */
  protected $ticker;
  /** @var string|NullObject|null */
  protected $tag;
  /** @var integer */
  protected $priority;
  /** @var boolean */
  protected $autoOpen;
  /** @var boolean */
  protected $autoDrop;
  /** @var string[] */
  protected $persons;
  /** @var string */
  protected $category;
  /** @var string */
  protected $color;
  /** @var string */
  protected $group;
  /** @var string */
  protected $sortKey;
  /** @var boolean */
  protected $localOnly;
  /** @var integer */
  protected $number;
  /** @var boolean */
  protected $onlyAlertOnce;
  /** @var integer - timestamp in ms */
  protected $when;
  /** @var boolean */
  protected $showWhen;
  /** @var boolean */
  protected $usesChronometer;
  /** @var string */
  protected $visibility;
  /** @var boolean|BaseObject {color: string, on: integer, off: integer} */
  protected $lights;
  /** @var boolean|integer[] */
  protected $vibrate;
  /** @var boolean|string */
  protected $sound;
  /** @var boolean */
  protected $ongoing;
  /** @var boolean|integer */
  protected $progress;
  /** @var string */
  protected $smallIcon;
  /** @var string */
  protected $largeIcon;
  /** @var NotificationAlertAndroidButton[] */
  protected $buttons;

  /** @var NotificationAlertAndroid */
  protected $foreground;

  /** @var string */ // types: bigText, bigPicture, inbox
  protected $bigTitle;
  /** @var string */ // types: bigText
  protected $bigText;
  /** @var string */ // types: bigText, bigPicture, inbox
  protected $summaryText;
  /** @var string */ // types: bigPicture
  protected $bigLargeIcon;
  /** @var string */ // types: bigPicture
  protected $bigPicture;
  /** @var string[] */ // types: inbox
  protected $lines;

  /**
   * @return string
   */
  public function getType() {
    return $this->type;
  }

  /**
   * @param string $type
   * @return $this
   */
  public function setType($type) {
    $this->type = $type;
    return $this;
  }

  /**
   * @return string
   */
  public function getChannel() {
    return $this->channel;
  }

  /**
   * @param string $channel
   * @return $this
   */
  public function setChannel($channel) {
    $this->channel = $channel;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getHtml() {
    return $this->html;
  }

  /**
   * @param boolean $html
   * @return $this
   */
  public function setHtml($html) {
    $this->html = $html;
    return $this;
  }

  /**
   * @return string
   */
  public function getSubText() {
    return $this->subText;
  }

  /**
   * @param string $subText
   * @return $this
   */
  public function setSubText($subText) {
    $this->subText = $subText;
    return $this;
  }

  /**
   * @return string
   */
  public function getInfo() {
    return $this->info;
  }

  /**
   * @param string $info
   * @return $this
   */
  public function setInfo($info) {
    $this->info = $info;
    return $this;
  }

  /**
   * @return string
   */
  public function getTicker() {
    return $this->ticker;
  }

  /**
   * @param string $ticker
   * @return $this
   */
  public function setTicker($ticker) {
    $this->ticker = $ticker;
    return $this;
  }

  /**
   * @return string|NullObject|null
   */
  public function getTag() {
    return $this->tag;
  }

  /**
   * @param string|NullObject|null $tag
   * @return $this
   */
  public function setTag($tag) {
    $this->tag = $tag;
    return $this;
  }

  /**
   * @return integer
   */
  public function getPriority() {
    return $this->priority;
  }

  /**
   * @param integer $priority
   * @return $this
   */
  public function setPriority($priority) {
    $this->priority = $priority;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getAutoOpen() {
    return $this->autoOpen;
  }

  /**
   * @param boolean $autoOpen
   * @return $this
   */
  public function setAutoOpen($autoOpen) {
    $this->autoOpen = $autoOpen;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getAutoDrop() {
    return $this->autoDrop;
  }

  /**
   * @param boolean $autoDrop
   * @return $this
   */
  public function setAutoDrop($autoDrop) {
    $this->autoDrop = $autoDrop;
    return $this;
  }

  /**
   * @return string[]
   */
  public function getPersons() {
    return $this->persons;
  }

  /**
   * @param string[] $persons
   * @return $this
   */
  public function setPersons($persons) {
    $this->persons = $persons;
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
   * @return $this
   */
  public function setCategory($category) {
    $this->category = $category;
    return $this;
  }

  /**
   * @return string
   */
  public function getColor() {
    return $this->color;
  }

  /**
   * @param string $color
   * @return $this
   */
  public function setColor($color) {
    $this->color = $color;
    return $this;
  }

  /**
   * @return string
   */
  public function getGroup() {
    return $this->group;
  }

  /**
   * @param string $group
   * @return $this
   */
  public function setGroup($group) {
    $this->group = $group;
    return $this;
  }

  /**
   * @return string
   */
  public function getSortKey() {
    return $this->sortKey;
  }

  /**
   * @param string $sortKey
   * @return $this
   */
  public function setSortKey($sortKey) {
    $this->sortKey = $sortKey;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getLocalOnly() {
    return $this->localOnly;
  }

  /**
   * @param boolean $localOnly
   * @return $this
   */
  public function setLocalOnly($localOnly) {
    $this->localOnly = $localOnly;
    return $this;
  }

  /**
   * @return integer
   */
  public function getNumber() {
    return $this->number;
  }

  /**
   * @param integer $number
   * @return $this
   */
  public function setNumber($number) {
    $this->number = $number;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getOnlyAlertOnce() {
    return $this->onlyAlertOnce;
  }

  /**
   * @param boolean $onlyAlertOnce
   * @return $this
   */
  public function setOnlyAlertOnce($onlyAlertOnce) {
    $this->onlyAlertOnce = $onlyAlertOnce;
    return $this;
  }

  /**
   * @return integer Timestamp in milliseconds
   */
  public function getWhen() {
    return $this->when;
  }

  /**
   * @param integer $when Timestamp in milliseconds
   * @return $this
   */
  public function setWhen($when) {
    $this->when = $when;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getShowWhen() {
    return $this->showWhen;
  }

  /**
   * @param boolean $showWhen
   * @return $this
   */
  public function setShowWhen($showWhen) {
    $this->showWhen = $showWhen;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getUsesChronometer() {
    return $this->usesChronometer;
  }

  /**
   * @param boolean $usesChronometer
   * @return $this
   */
  public function setUsesChronometer($usesChronometer) {
    $this->usesChronometer = $usesChronometer;
    return $this;
  }

  /**
   * @return string
   */
  public function getVisibility() {
    return $this->visibility;
  }

  /**
   * @param string $visibility
   * @return $this
   */
  public function setVisibility($visibility) {
    $this->visibility = $visibility;
    return $this;
  }

  /**
   * @return boolean|array `{color: string, on: integer, off: integer}`
   */
  public function getLights() {
    return $this->lights;
  }

  /**
   *
   * @param boolean|array $lights `{color: string, on: integer, off: integer}`
   * @return $this
   */
  public function setLights($lights) {
    $this->lights = $lights;
    return $this;
  }

  /**
   * @return boolean|integer[]
   */
  public function getVibrate() {
    return $this->vibrate;
  }

  /**
   * @param boolean|integer[] $vibrate
   * @return $this
   */
  public function setVibrate($vibrate) {
    $this->vibrate = $vibrate;
    return $this;
  }

  /**
   * @return boolean|string
   */
  public function getSound() {
    return $this->sound;
  }

  /**
   * @param boolean|string $sound
   * @return $this
   */
  public function setSound($sound) {
    $this->sound = $sound;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getOngoing() {
    return $this->ongoing;
  }

  /**
   * @param boolean $ongoing
   * @return $this
   */
  public function setOngoing($ongoing) {
    $this->ongoing = $ongoing;
    return $this;
  }

  /**
   * @return boolean|integer
   */
  public function getProgress() {
    return $this->progress;
  }

  /**
   * @param boolean|integer $progress
   * @return $this
   */
  public function setProgress($progress) {
    $this->progress = $progress;
    return $this;
  }

  /**
   * @return string
   */
  public function getSmallIcon() {
    return $this->smallIcon;
  }

  /**
   * @param string $smallIcon
   * @return $this
   */
  public function setSmallIcon($smallIcon) {
    $this->smallIcon = $smallIcon;
    return $this;
  }

  /**
   * @return string
   */
  public function getLargeIcon() {
    return $this->largeIcon;
  }

  /**
   * @param string $largeIcon
   * @return $this
   */
  public function setLargeIcon($largeIcon) {
    $this->largeIcon = $largeIcon;
    return $this;
  }

  /**
   * @return NotificationAlertAndroidButton[]
   */
  public function getButtons() {
    return $this->buttons;
  }

  /**
   * @param NotificationAlertAndroidButton[] $buttons
   * @return $this
   */
  public function setButtons($buttons) {
    $this->buttons = BaseObject::instantiateForSetter('\WonderPush\Obj\NotificationAlertAndroidButton[]', $buttons);
    return $this;
  }

  /**
   * @return NotificationAlertAndroid
   */
  public function getForeground() {
    return $this->foreground;
  }

  /**
   * @param NotificationAlertAndroid $foreground
   * @return NotificationAlertAndroid
   */
  public function setForeground($foreground) {
    $this->foreground = BaseObject::instantiateForSetter('\WonderPush\Obj\NotificationAlertAndroid', $foreground);
    if ($this->foreground instanceof self) {
      $this->foreground->setForeground(null);
    }
    return $this;
  }

  /**
   * Valid for types: `bigText`, `bigPicture`, `inbox`.
   * @return string
   */
  public function getBigTitle() {
    return $this->bigTitle;
  }

  /**
   * Valid for types: `bigText`, `bigPicture`, `inbox`.
   * @param string $bigTitle
   * @return $this
   */
  public function setBigTitle($bigTitle) {
    $this->bigTitle = $bigTitle;
    return $this;
  }

  /**
   * Valid for types: `bigText`.
   * @return string
   */
  public function getBigText() {
    return $this->bigText;
  }

  /**
   * Valid for types: `bigText`.
   * @param string $bigText
   * @return $this
   */
  public function setBigText($bigText) {
    $this->bigText = $bigText;
    return $this;
  }

  /**
   * Valid for types: `bigText`, `bigPicture`, `inbox`.
   * @return string
   */
  public function getSummaryText() {
    return $this->summaryText;
  }

  /**
   * Valid for types: `bigText`, `bigPicture`, `inbox`.
   * @param string $summaryText
   * @return $this
   */
  public function setSummaryText($summaryText) {
    $this->summaryText = $summaryText;
    return $this;
  }

  /**
   * Valid for types: `bigPicture`.
   * @return string
   */
  public function getBigLargeIcon() {
    return $this->bigLargeIcon;
  }

  /**
   * Valid for types: `bigPicture`.
   * @param string $bigLargeIcon
   * @return $this
   */
  public function setBigLargeIcon($bigLargeIcon) {
    $this->bigLargeIcon = $bigLargeIcon;
    return $this;
  }

  /**
   * Valid for types: `bigPicture`.
   * @return string
   */
  public function getBigPicture() {
    return $this->bigPicture;
  }

  /**
   * Valid for types: `bigPicture`.
   * @param string $bigPicture
   * @return $this
   */
  public function setBigPicture($bigPicture) {
    $this->bigPicture = $bigPicture;
    return $this;
  }

  /**
   * Valid for types: `inbox`.
   * @return string[]
   */
  public function getLines() {
    return $this->lines;
  }

  /**
   * Valid for types: `inbox`.
   * @param string[] $lines
   * @return $this
   */
  public function setLines($lines) {
    $this->lines = $lines;
    return $this;
  }

}
