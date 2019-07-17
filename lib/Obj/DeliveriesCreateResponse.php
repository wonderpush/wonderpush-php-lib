<?php

namespace WonderPush\Obj;

class DeliveriesCreateResponse extends BaseObject {

  /** @var boolean */
  private $success;

  /** @var string */
  private $notificationId;

  /** @var string */
  private $campaignId;

  /**
   * @return bool
   */
  public function isSuccess() {
    return $this->success;
  }

  /**
   * @param bool $success
   * @return DeliveriesCreateResponse
   */
  public function setSuccess($success) {
    $this->success = $success;
    return $this;
  }

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
