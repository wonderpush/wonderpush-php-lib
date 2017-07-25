<?php

namespace WonderPush\ResponseParsers;

/**
 * `POST /deliveries` response parser.
 */
class DeliveriesCreate extends Base {

  /** @var boolean */
  private $success;
  /** @var string */
  private $campaignId;
  /** @var string */
  private $notificationId;

  /**
   * @return boolean
   */
  public function getSuccess() {
    return $this->success;
  }

  /**
   * @param boolean $success
   * @return $this
   */
  public function setSuccess($success) {
    $this->success = $success;
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
   * @return $this
   */
  public function setCampaignId($campaignId) {
    $this->campaignId = $campaignId;
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
   * @return $this
   */
  public function setNotificationId($notificationId) {
    $this->notificationId = $notificationId;
    return $this;
  }

}
