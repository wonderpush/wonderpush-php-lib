<?php

namespace WonderPush\Params;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

use WonderPush\Obj\BaseObject;
use WonderPush\Obj\Notification;
use WonderPush\Obj\Campaign;

class CreateCampaignParams extends PatchCampaignParams {
  /** @var string */
  private $channel;
  /** @var string */
  private $viewId;

  /**
   * @return string
   */
  public function getChannel() {
    return $this->channel;
  }

  /**
   * @param string $channel
   * @return CreateCampaignParams
   */
  public function setChannel($channel) {
    $this->channel = $channel;
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
   * @return CreateCampaignParams
   */
  public function setViewId($viewId) {
    $this->viewId = $viewId;
    return $this;
  }

}