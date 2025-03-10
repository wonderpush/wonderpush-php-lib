<?php

namespace WonderPush\Api;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

use WonderPush\Obj\Campaign;
use WonderPush\Obj\CampaignCollection;
use WonderPush\Obj\CampaignSuccessResponse;
use WonderPush\Params\PatchCampaignParams;
use WonderPush\Params\CreateCampaignParams;

/**
 * Applications API.
 */
class Campaigns {

  /**
   * Instance of the library whose credentials are to be used.
   * @var \WonderPush\WonderPush
   */
  private $wp;

  public function __construct(\WonderPush\WonderPush $wp) {
    $this->wp = $wp;
  }

  /**
   * List campaigns.
   * @param array $params
   * @return CampaignCollection
   * @throws \WonderPush\Errors\Base
   */
  public function all($params = array()) {
    $response = $this->wp->rest()->get('/campaigns', $params);
    return $response->checkedResult('\WonderPush\Obj\CampaignCollection');
  }

  /**
   * @param $id Campaign ID
   * @param $params
   * @return Campaign
   * @throws \WonderPush\Errors\Base
   */
  public function get($id, $params = array()) {
    $response = $this->wp->rest()->get('/campaigns/'.urlencode($id), $params);
    return $response->checkedResult('\WonderPush\Obj\Campaign');
  }

  /**
   * Partially update an existing campaign
   * @param array|PatchCampaignParams $params
   * @return CampaignSuccessResponse
   * @throws \WonderPush\Errors\Base
   */
  public function patch($id, $params) {
    $response = $this->wp->rest()->patch('/campaigns/' . urlencode($id), is_array($params) ? $params : $params->toArray());
    return $response->checkedResult('\WonderPush\Obj\CampaignSuccessResponse');
  }

  /**
   * Create a campaign
   * @param CreateCampaignParams $params
   * @return CampaignSuccessResponse
   * @throws \WonderPush\Errors\Base
   */
  public function create($params) {
    $response = $this->wp->rest()->post('/campaigns', $params->toArray());
    return $response->checkedResult('\WonderPush\Obj\CampaignSuccessResponse');
  }

}
