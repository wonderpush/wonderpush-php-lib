<?php

namespace WonderPush\Params;

class AllInstallationsParams extends CollectionParams {

  /** @var string[] */
  private $segmentIds;

  /** @var string */
  private $reachability;

  /**
   * @return string[]
   */
  public function getSegmentIds() {
    return $this->segmentIds;
  }

  /**
   * @return string
   */
  public function getReachability() {
    return $this->reachability;
  }

  /**
   * @param string $reachability  optIn, optOut or softOptOut
   * @return AllInstallationsParams
   */
  public function setReachability($reachability) {
    $this->reachability = $reachability;
    return $this;
  }

  /**
   * @param string|string[] $segmentIds A single id, an array of ids, or multiple id parameters.
   * @return $this
   */
  public function setSegmentIds($segmentIds) {
    $this->segmentIds = \WonderPush\Util\ArrayUtil::flatten(func_get_args());
    return $this;
  }

}
