<?php

namespace WonderPush\Obj;

class Campaign extends BaseObject {
  const CAMPAIGN_BUILDER_BREVO_WORDPRESS_PLUGIN = 'brevoWordPressPlugin';
  /** @var string */
  private $id;
  /** @var string */
  private $applicationId;
  /** @var integer */
  private $creationDate;
  /** @var string */
  private $name;
  /** @var string[] */
  private $notificationIds;
  /** @var string[] */
  private $channels;
  /** @var string */
  private $viewId;
  /** @var string */
  private $deliverySpeed;
  /** @var CampaignSchedule */
  private $scheduling;
  /** @var CampaignCapping */
  private $capping;
  /** @var string */
  private $segmentId;
  /** @var string */
  private $state;
  /** @var integer */
  private $updateDate;
  /** @var integer */
  private $editionDate;
  /** @var CampaignStats */
  private $stats;
  /** @var Notification[] */
  private $notifications;
  /** @var Segment */
  private $segment;
  /** @var CampaignUrlFilters */
  private $urlFilters;
  /** @var string */
  private $editorStaffId;
  /** @var string */
  private $inheritUrlParameters;
  /** @var string */
  private $campaignBuilder;

  /**
   * @return string
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @param string $id
   * @return Campaign
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
   * @return Campaign
   */
  public function setApplicationId($applicationId) {
    $this->applicationId = $applicationId;
    return $this;
  }

  /**
   * @return int
   */
  public function getCreationDate() {
    return $this->creationDate;
  }

  /**
   * @param int $creationDate
   * @return Campaign
   */
  public function setCreationDate($creationDate) {
    $this->creationDate = $creationDate;
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
   * @return Campaign
   */
  public function setName($name) {
    $this->name = $name;
    return $this;
  }

  /**
   * @return string[]
   */
  public function getNotificationIds() {
    return $this->notificationIds;
  }

  /**
   * @param string[] $notificationIds
   * @return Campaign
   */
  public function setNotificationIds($notificationIds) {
    $this->notificationIds = $notificationIds;
    return $this;
  }

  /**
   * @return string[]
   */
  public function getChannels() {
    return $this->channels;
  }

  /**
   * @param string[] $channels
   * @return Campaign
   */
  public function setChannels($channels) {
    $this->channels = $channels;
    return $this;
  }

  /**
   * @return string
   */
  public function getViewId() {
    return $this->viewId;
  }

  /**
   * @param string $viewId
   * @return Campaign
   */
  public function setViewId($viewId) {
    $this->viewId = $viewId;
    return $this;
  }

  /**
   * @return string
   */
  public function getDeliverySpeed() {
    return $this->deliverySpeed;
  }

  /**
   * @param string $deliverySpeed
   * @return Campaign
   */
  public function setDeliverySpeed($deliverySpeed) {
    $this->deliverySpeed = $deliverySpeed;
    return $this;
  }

  /**
   * @return CampaignSchedule
   */
  public function getScheduling() {
    return $this->scheduling;
  }

  /**
   * @param CampaignSchedule $scheduling
   * @return Campaign
   */
  public function setScheduling($scheduling) {
    $this->scheduling = BaseObject::instantiateForSetter('\WonderPush\Obj\CampaignSchedule', $scheduling);
    return $this;
  }

  /**
   * @return CampaignCapping
   */
  public function getCapping() {
    return $this->capping;
  }

  /**
   * @param CampaignCapping $capping
   * @return Campaign
   */
  public function setCapping($capping) {
    $this->capping = BaseObject::instantiateForSetter('\WonderPush\Obj\CampaignCapping', $capping);
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
   * @return Campaign
   */
  public function setSegmentId($segmentId) {
    $this->segmentId = $segmentId;
    return $this;
  }

  /**
   * @return string
   */
  public function getState() {
    return $this->state;
  }

  /**
   * @param string $state
   * @return Campaign
   */
  public function setState($state) {
    $this->state = $state;
    return $this;
  }

  /**
   * @return int
   */
  public function getUpdateDate() {
    return $this->updateDate;
  }

  /**
   * @param int $updateDate
   * @return Campaign
   */
  public function setUpdateDate($updateDate) {
    $this->updateDate = $updateDate;
    return $this;
  }

  /**
   * @return int
   */
  public function getEditionDate() {
    return $this->editionDate;
  }

  /**
   * @param int $editionDate
   * @return Campaign
   */
  public function setEditionDate($editionDate) {
    $this->editionDate = $editionDate;
    return $this;
  }

  /**
   * @return CampaignStats
   */
  public function getStats() {
    return $this->stats;
  }

  /**
   * @param CampaignStats $stats
   * @return Campaign
   */
  public function setStats($stats) {
    $this->stats = BaseObject::instantiateForSetter('\WonderPush\Obj\CampaignStats', $stats);
    return $this;
  }

  /**
   * @return Notification[]
   */
  public function getNotifications() {
    return $this->notifications;
  }

  /**
   * @param Notification[] $notifications
   * @return Campaign
   */
  public function setNotifications($notifications) {
    $this->notifications = BaseObject::instantiateForSetter('\WonderPush\Obj\Notification[]', $notifications);
    return $this;
  }

  /**
   * @return Segment
   */
  public function getSegment() {
    return $this->segment;
  }

  /**
   * @param Segment $segment
   * @return Campaign
   */
  public function setSegment($segment) {
    $this->segment = BaseObject::instantiateForSetter('\WonderPush\Obj\Segment', $segment);
    return $this;
  }

  /**
   * @return CampaignUrlFilters
   */
  public function getUrlFilters() {
    return $this->urlFilters;
  }

  /**
   * @param CampaignUrlFilters $urlFilters
   * @return Campaign
   */
  public function setUrlFilters($urlFilters) {
    $this->urlFilters = BaseObject::instantiateForSetter('\WonderPush\Obj\CampaignUrlFilters', $urlFilters);
    return $this;
  }

  /**
   * @return string
   */
  public function getEditorStaffId() {
    return $this->editorStaffId;
  }

  /**
   * @param string $editorStaffId
   * @return Campaign
   */
  public function setEditorStaffId($editorStaffId) {
    $this->editorStaffId = $editorStaffId;
    return $this;
  }

  /**
   * @return string
   */
  public function getInheritUrlParameters() {
    return $this->inheritUrlParameters;
  }

  /**
   * @param string $inheritUrlParameters
   * @return Campaign
   */
  public function setInheritUrlParameters($inheritUrlParameters) {
    $this->inheritUrlParameters = $inheritUrlParameters;
    return $this;
  }

  /**
   * @return string
   */
  public function getCampaignBuilder() {
    return $this->campaignBuilder;
  }

  /**
   * @param string $inheritUrlParameters
   * @return Campaign
   */
  public function setCampaignBuilder($campaignBuilder) {
    $this->campaignBuilder = $campaignBuilder;
    return $this;
  }

}