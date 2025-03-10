<?php

namespace WonderPush\Params;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

use WonderPush\Obj\BaseObject;
use WonderPush\Obj\Notification;
use WonderPush\Obj\Campaign;

class PatchCampaignParams extends BaseObject {
  /** @var Campaign */
  private $campaign;
  /** @var Notification[] */
  private $notifications;
  /** @var mixed */
  private $query;

  /**
   * @return Campaign
   */
  public function getCampaign() {
    return $this->campaign;
  }

  /**
   * @param Campaign $campaign
   * @return PatchCampaignParams
   */
  public function setCampaign($campaign) {
    $this->campaign = BaseObject::instantiateForSetter('\WonderPush\Obj\Campaign', $campaign);
    return $this;
  }

  /**
   * @return Notification[]
   */
  public function getNotifications() {
    return $this->notifications;
  }

  /**
   * @param Notification[] $notifications
   * @return PatchCampaignParams
   */
  public function setNotifications($notifications) {
    $this->notifications = BaseObject::instantiateForSetter('\WonderPush\Obj\Notification[]', $notifications);
    return $this;
  }

  /**
   * @return mixed
   */
  public function getQuery() {
    return $this->query;
  }

  /**
   * @param mixed $query
   * @return PatchCampaignParams
   */
  public function setQuery($query) {
    $this->query = $query;
    return $this;
  }

}