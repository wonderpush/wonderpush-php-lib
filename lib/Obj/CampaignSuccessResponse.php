<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

class CampaignSuccessResponse extends SuccessResponse {

  /** @var Campaign */
  private $campaign;

  /**
   * @return Campaign
   */
  public function getCampaign() {
    return $this->campaign;
  }

  /**
   * @param Campaign $campaign
   * @return CampaignSuccessResponse
   */
  public function setCampaign($campaign) {
    $this->campaign = BaseObject::instantiateForSetter('\WonderPush\Obj\Campaign', $campaign);
    return $this;
  }

}