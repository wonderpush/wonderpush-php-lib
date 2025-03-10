<?php

namespace WonderPush\Obj;

class CampaignSchedulePressure extends BaseObject {

  /** @var string */
  private $category;
  /** @var int */
  private $regulationTime;
  /** @var int */
  private $priority;

  /**
   * @return string
   */
  public function getCategory() {
    return $this->category;
  }

  /**
   * @param string $category
   * @return CampaignSchedulePressure
   */
  public function setCategory($category) {
    $this->category = $category;
    return $this;
  }

  /**
   * @return int
   */
  public function getRegulationTime() {
    return $this->regulationTime;
  }

  /**
   * @param int $regulationTime
   * @return CampaignSchedulePressure
   */
  public function setRegulationTime($regulationTime) {
    $this->regulationTime = $regulationTime;
    return $this;
  }

  /**
   * @return int
   */
  public function getPriority() {
    return $this->priority;
  }

  /**
   * @param int $priority
   * @return CampaignSchedulePressure
   */
  public function setPriority($priority) {
    $this->priority = $priority;
    return $this;
  }

}