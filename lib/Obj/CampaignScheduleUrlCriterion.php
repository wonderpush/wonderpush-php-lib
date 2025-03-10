<?php

namespace WonderPush\Obj;

class CampaignScheduleUrlCriterion extends BaseObject {
  private $operator;
  /** @var bool */
  private $negate;
  /** @var string */
  private $value;

  /**
   * @return string
   */
  public function getOperator() {
    return $this->operator;
  }

  /**
   * @param string $operator
   * @return CampaignScheduleUrlCriterion
   */
  public function setOperator($operator) {
    $this->operator = $operator;
    return $this;
  }

  /**
   * @return bool
   */
  public function isNegate() {
    return $this->negate;
  }

  /**
   * @param bool $negate
   * @return CampaignScheduleUrlCriterion
   */
  public function setNegate($negate) {
    $this->negate = $negate;
    return $this;
  }

  /**
   * @return string
   */
  public function getValue() {
    return $this->value;
  }

  /**
   * @param string $value
   * @return CampaignScheduleUrlCriterion
   */
  public function setValue($value) {
    $this->value = $value;
    return $this;
  }

}