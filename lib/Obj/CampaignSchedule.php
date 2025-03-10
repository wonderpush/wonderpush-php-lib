<?php

namespace WonderPush\Obj;

class CampaignSchedule extends BaseObject {
  /** @var string */
  private $type;
  /** @var bool */
  private $bestMoment;
  /** @var string */
  private $localDateTimeISOString;
  /** @var int */
  private $lastTriggeredDate;
  /** @var int */
  private $startDate;
  /** @var int */
  private $endDate;
  /** @var int */
  private $date;
  /** @var string */
  private $period;
  /** @var string */
  private $delay;
  /** @var CampaignSchedulePressure */
  private $pressure;
  /** @var string */
  private $eventType;
  /** @var object */
  private $eventCriteria;
  /** @var string[] */
  private $cancelEventTypes;
  /** @var CampaignScheduleUrlCriterion[] */
  private $urlCriteria;
  /** @var CampaignScheduleUrlCriterion[] */
  private $cancelUrlCriteria;

  /**
   * @return string
   */
  public function getType() {
    return $this->type;
  }

  /**
   * @param string $type
   * @return CampaignSchedule
   */
  public function setType($type) {
    $this->type = $type;
    return $this;
  }

  /**
   * @return bool
   */
  public function isBestMoment() {
    return $this->bestMoment;
  }

  /**
   * @param bool $bestMoment
   * @return CampaignSchedule
   */
  public function setBestMoment($bestMoment) {
    $this->bestMoment = $bestMoment;
    return $this;
  }

  /**
   * @return string
   */
  public function getLocalDateTimeISOString() {
    return $this->localDateTimeISOString;
  }

  /**
   * @param string $localDateTimeISOString
   * @return CampaignSchedule
   */
  public function setLocalDateTimeISOString($localDateTimeISOString) {
    $this->localDateTimeISOString = $localDateTimeISOString;
    return $this;
  }

  /**
   * @return int
   */
  public function getLastTriggeredDate() {
    return $this->lastTriggeredDate;
  }

  /**
   * @param int $lastTriggeredDate
   * @return CampaignSchedule
   */
  public function setLastTriggeredDate($lastTriggeredDate) {
    $this->lastTriggeredDate = $lastTriggeredDate;
    return $this;
  }

  /**
   * @return int
   */
  public function getStartDate() {
    return $this->startDate;
  }

  /**
   * @param int $startDate
   * @return CampaignSchedule
   */
  public function setStartDate($startDate) {
    $this->startDate = $startDate;
    return $this;
  }

  /**
   * @return int
   */
  public function getEndDate() {
    return $this->endDate;
  }

  /**
   * @param int $endDate
   * @return CampaignSchedule
   */
  public function setEndDate($endDate) {
    $this->endDate = $endDate;
    return $this;
  }

  /**
   * @return int
   */
  public function getDate() {
    return $this->date;
  }

  /**
   * @param int $date
   * @return CampaignSchedule
   */
  public function setDate($date) {
    $this->date = $date;
    return $this;
  }

  /**
   * @return string
   */
  public function getPeriod() {
    return $this->period;
  }

  /**
   * @param string $period
   * @return CampaignSchedule
   */
  public function setPeriod($period) {
    $this->period = $period;
    return $this;
  }

  /**
   * @return string
   */
  public function getDelay() {
    return $this->delay;
  }

  /**
   * @param string $delay
   * @return CampaignSchedule
   */
  public function setDelay($delay) {
    $this->delay = $delay;
    return $this;
  }

  /**
   * @return CampaignSchedulePressure
   */
  public function getPressure() {
    return $this->pressure;
  }

  /**
   * @param CampaignSchedulePressure $pressure
   * @return CampaignSchedule
   */
  public function setPressure($pressure) {
    $this->pressure = BaseObject::instantiateForSetter('\WonderPush\Obj\CampaignSchedulePressure', $pressure);
    return $this;
  }

  /**
   * @return string
   */
  public function getEventType() {
    return $this->eventType;
  }

  /**
   * @param string $eventType
   * @return CampaignSchedule
   */
  public function setEventType($eventType) {
    $this->eventType = $eventType;
    return $this;
  }

  /**
   * @return object
   */
  public function getEventCriteria() {
    return $this->eventCriteria;
  }

  /**
   * @param array $eventCriteria
   * @return CampaignSchedule
   */
  public function setEventCriteria($eventCriteria) {
    $this->eventCriteria = (object)$eventCriteria;
    return $this;
  }

  /**
   * @return string[]
   */
  public function getCancelEventTypes() {
    return $this->cancelEventTypes;
  }

  /**
   * @param string[] $cancelEventTypes
   * @return CampaignSchedule
   */
  public function setCancelEventTypes($cancelEventTypes) {
    $this->cancelEventTypes = $cancelEventTypes;
    return $this;
  }

  /**
   * @return CampaignScheduleUrlCriterion[]
   */
  public function getUrlCriteria() {
    return $this->urlCriteria;
  }

  /**
   * @param CampaignScheduleUrlCriterion[] $urlCriteria
   * @return CampaignSchedule
   */
  public function setUrlCriteria($urlCriteria) {
    $this->urlCriteria = BaseObject::instantiateForSetter('\WonderPush\Obj\CampaignScheduleUrlCriterion[]', $urlCriteria);
    return $this;
  }

  /**
   * @return CampaignScheduleUrlCriterion[]
   */
  public function getCancelUrlCriteria() {
    return $this->cancelUrlCriteria;
  }

  /**
   * @param CampaignScheduleUrlCriterion[] $cancelUrlCriteria
   * @return CampaignSchedule
   */
  public function setCancelUrlCriteria($cancelUrlCriteria) {
    $this->cancelUrlCriteria = BaseObject::instantiateForSetter('\WonderPush\Obj\CampaignScheduleUrlCriterion[]', $cancelUrlCriteria);
    return $this;
  }

}