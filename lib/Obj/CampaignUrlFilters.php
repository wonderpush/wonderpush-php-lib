<?php
namespace WonderPush\Obj;

class CampaignUrlFilters extends BaseObject {
  /*blackList?: string[]; whiteList?: string[];*/
  /** @var string[] */
  private $blackList;
  /** @var string[] */
  private $whiteList;

  /**
   * @return string[]
   */
  public function getBlackList() {
    return $this->blackList;
  }

  /**
   * @param string[] $blackList
   * @return CampaignUrlFilters
   */
  public function setBlackList($blackList) {
    $this->blackList = $blackList;
    return $this;
  }

  /**
   * @return string[]
   */
  public function getWhiteList() {
    return $this->whiteList;
  }

  /**
   * @param string[] $whiteList
   * @return CampaignUrlFilters
   */
  public function setWhiteList($whiteList) {
    $this->whiteList = $whiteList;
    return $this;
  }

}