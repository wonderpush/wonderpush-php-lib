<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO for installation's events.
 *
 * See {@link https://www.wonderpush.com/docs/concepts/event}
 * @codeCoverageIgnore
 */
class Event extends BaseObject {

  /** @var string */
  protected $id;
  /** @var string */
  protected $applicationId;
  /** @var string */
  protected $installationId;
  /** @var string */
  protected $userId;
  /** @var string */
  protected $campaignId;
  /** @var string */
  protected $notificationId;
  /** @var string */
  protected $segmentId;
  /** @var string */
  protected $type;
  /** @var string */
  protected $collapsing;
  /** @var integer */
  protected $creationDate;
  /** @var integer */
  protected $actionDate;
  /** @var string */
  protected $geoid;
  /** @var GeoLocation */
  protected $location;
  /** @var array */
  protected $custom;
  /** @var integer */
  protected $openedTime;
  /** @var integer */
  protected $reactionTime;
  /** @var integer */
  protected $lastReceivedNotificationTime;

  // For @LOGIN events
  /** @var string */
  protected $linkedUserId;
  /** @var string */
  protected $linkedInstallationId;

  /**
   * @return string
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @param string $id
   * @return Event
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
   * @return Event
   */
  public function setApplicationId($applicationId) {
    $this->applicationId = $applicationId;
    return $this;
  }

  /**
   * @return string
   */
  public function getInstallationId() {
    return $this->installationId;
  }

  /**
   * @param string $installationId
   * @return Event
   */
  public function setInstallationId($installationId) {
    $this->installationId = $installationId;
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
   * @return Event
   */
  public function setUserId($userId) {
    $this->userId = $userId;
    return $this;
  }

  /**
   * @return string
   */
  public function getCampaignId() {
    return $this->campaignId;
  }

  /**
   * @param string campaignId
   * @return Event
   */
  public function setCampaignId($campaignId) {
    $this->campaignId = $campaignId;
    return $this;
  }

  /**
   * @return string
   */
  public function getNotificationId() {
    return $this->notificationId;
  }

  /**
   * @param string $notificationId
   * @return Event
   */
  public function setNotificationId($notificationId) {
    $this->notificationId = $notificationId;
    return $this;
  }

  /**
   * @return string
   */
  public function getSegmentId() {
    return $this->segmentId;
  }

  /**
   * @param string $segmentId
   * @return Event
   */
  public function setSegmentId($segmentId) {
    $this->segmentId = $segmentId;
    return $this;
  }

  /**
   * @return string
   */
  public function getType() {
    return $this->type;
  }

  /**
   * @param string $type
   * @return Event
   */
  public function setType($type) {
    $this->type = $type;
    return $this;
  }

  /**
   * @return string
   */
  public function getCollapsing() {
    return $this->collapsing;
  }

  /**
   * @param string $collapsing
   * @return Event
   */
  public function setCollapsing($collapsing) {
    $this->collapsing = $collapsing;
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
   * @return Event
   */
  public function setCreationDate($creationDate) {
    $this->creationDate = $creationDate;
    return $this;
  }

  /**
   * @return integer
   */
  public function getActionDate() {
    return $this->actionDate;
  }

  /**
   * @param integer $actionDate
   * @return Event
   */
  public function setActionDate($actionDate) {
    $this->actionDate = $actionDate;
    return $this;
  }

  /**
   * @return string
   */
  public function getGeoid() {
    return $this->geoid;
  }

  /**
   * @param string $geoid
   * @return Event
   */
  public function setGeoid($geoid) {
    $this->geoid = $geoid;
    return $this;
  }

  /**
   * @return GeoLocation
   */
  public function getLocation() {
    return $this->location;
  }

  /**
   * @param GeoLocation|array $location
   * @return Event
   */
  public function setLocation($location) {
    $this->location = BaseObject::instantiateForSetter('\WonderPush\Obj\GeoLocation', $location);
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
   * @return Event
   */
  public function setCustom($custom) {
    $this->custom = $custom;
    return $this;
  }

  /**
   * @return string
   */
  public function getLinkedUserId() {
    return $this->linkedUserId;
  }

  /**
   * @param string $linkedUserId
   * @return Event
   */
  public function setLinkedUserId($linkedUserId) {
    $this->linkedUserId = $linkedUserId;
    return $this;
  }

  /**
   * @return string
   */
  public function getLinkedInstallationId() {
    return $this->linkedInstallationId;
  }

  /**
   * @param string $linkedInstallationId
   * @return Event
   */
  public function setLinkedInstallationId($linkedInstallationId) {
    $this->linkedInstallationId = $linkedInstallationId;
    return $this;
  }

  /**
   * @return integer
   */
  public function getOpenedTime() {
    return $this->openedTime;
  }

  /**
   * @param integer $time
   * @return Event
   */
  public function setOpenedTime($time) {
    $this->openedTime = $time;
    return $this;
  }

  /**
   * @return integer
   */
  public function getReactionTime() {
    return $this->reactionTime;
  }

  /**
   * @param integer $time
   * @return Event
   */
  public function setReactionTime($time) {
    $this->reactionTime = $time;
    return $this;
  }

  /**
   * @return integer
   */
  public function getLastReceivedNotificationTime() {
    return $this->lastReceivedNotificationTime;
  }

  /**
   * @param integer $time
   * @return Event
   */
  public function setLastReceivedNotificationTime($time) {
    $this->lastReceivedNotificationTime = $time;
    return $this;
  }

}
