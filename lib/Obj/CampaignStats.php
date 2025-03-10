<?php

namespace WonderPush\Obj;

class CampaignStats extends BaseObject {

  /** @var integer */
  private $lastTriggeredDate;
  /** @var integer */
  private $lastPushDate;
  /** @var integer */
  private $lastPushSize;
  /** @var CampaignStatsAllTime */
  private $allTime;

  /**
   * @return int
   */
  public function getLastTriggeredDate() {
    return $this->lastTriggeredDate;
  }

  /**
   * @param int $lastTriggeredDate
   * @return CampaignStats
   */
  public function setLastTriggeredDate($lastTriggeredDate) {
    $this->lastTriggeredDate = $lastTriggeredDate;
    return $this;
  }

  /**
   * @return int
   */
  public function getLastPushDate() {
    return $this->lastPushDate;
  }

  /**
   * @param int $lastPushDate
   * @return CampaignStats
   */
  public function setLastPushDate($lastPushDate) {
    $this->lastPushDate = $lastPushDate;
    return $this;
  }

  /**
   * @return int
   */
  public function getLastPushSize() {
    return $this->lastPushSize;
  }

  /**
   * @param int $lastPushSize
   * @return CampaignStats
   */
  public function setLastPushSize($lastPushSize) {
    $this->lastPushSize = $lastPushSize;
    return $this;
  }

  /**
   * @return CampaignStatsAllTime
   */
  public function getAllTime() {
    return $this->allTime;
  }

  /**
   * @param CampaignStatsAllTime $allTime
   * @return CampaignStats
   */
  public function setAllTime($allTime) {
    $this->allTime = BaseObject::instantiateForSetter('\WonderPush\Obj\CampaignStatsAllTime', $allTime);
    return $this;
  }

}

class CampaignStatsAllTime extends BaseObject {

  /** @var integer */
  private $opened;
  /** @var integer */
  private $received;

  /**
   * @return int
   */
  public function getOpened() {
    return $this->opened;
  }

  /**
   * @param int $opened
   * @return CampaignStatsAllTime
   */
  public function setOpened($opened) {
    $this->opened = $opened;
    return $this;
  }

  /**
   * @return int
   */
  public function getReceived() {
    return $this->received;
  }

  /**
   * @param int $received
   * @return CampaignStatsAllTime
   */
  public function setReceived($received) {
    $this->received = $received;
    return $this;
  }

}