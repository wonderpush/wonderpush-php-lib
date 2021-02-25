<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

class DeliveriesCreateResponse extends SuccessResponse {

  /** @var string */
  private $notificationId;

  /** @var string */
  private $campaignId;

  /**
   * @return string
   */
  public function getNotificationId() {
    return $this->notificationId;
  }

  /**
   * @param string $notificationId
   * @return DeliveriesCreateResponse
   */
  public function setNotificationId($notificationId) {
    $this->notificationId = $notificationId;
    return $this;
  }

  /**
   * @return string
   */
  public function getCampaignId() {
    return $this->campaignId;
  }

  /**
   * @param string $campaignId
   * @return DeliveriesCreateResponse
   */
  public function setCampaignId($campaignId) {
    $this->campaignId = $campaignId;
    return $this;
  }

}
