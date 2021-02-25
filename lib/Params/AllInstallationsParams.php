<?php

namespace WonderPush\Params;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

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
