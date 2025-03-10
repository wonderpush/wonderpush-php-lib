<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO for campaigns.
 *
 * @codeCoverageIgnore
 */
class CampaignCollection extends Collection {

  /** @var Campaign[] */
  private $data;

  /**
   * @return Campaign[]
   */
  public function getData() {
    return $this->data;
  }

  /**
   * @param Campaign[] $data
   * @return CampaignCollection
   */
  public function setData($data) {
    $this->data = BaseObject::instantiateForSetter('\WonderPush\Obj\Campaign[]', $data);
    return $this;
  }

}
