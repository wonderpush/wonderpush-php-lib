<?php

namespace WonderPush\Params;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

use WonderPush\Obj\BaseObject;

class DeliveriesCreateParams extends BaseObject {

  /**
   * The endpoint of this API.
   */
  const PATH = '/deliveries';

  private $viewId;
  private $campaignId;
  private $targetType;
  private $targetValues;
  private $segmentParams;
  private $notification;
  private $notificationOverride;
  private $notificationParams;
  private $notificationId;
  private $deliveryDate;
  private $deliveryTime;
  /** @var bool */
  private $inheritUrlParameters;
  /** @var array|null */
  private $filterWebDomains;
  private $deliverySource;

  /**
   * @return string|null
   */
  public function getDeliveryTime() {
    return $this->deliveryTime;
  }

  /**
   * @param string $deliveryTime
   * @return DeliveriesCreateParams
   */
  public function setDeliveryTime($deliveryTime) {
    $this->deliveryTime = $deliveryTime;
    return $this;
  }

  /**
   * @return string|null
   */
  public function getDeliveryDate() {
    return $this->deliveryDate;
  }

  /**
   * @param string $deliveryDate
   * @return DeliveriesCreateParams
   */
  public function setDeliveryDate($deliveryDate) {
    $this->deliveryDate = $deliveryDate;
    return $this;
  }

  protected function buildDataFromFields() {
    return (object) \WonderPush\Util\ArrayUtil::filterNulls(array(
      'viewId' => $this->viewId,
      'campaignId' => $this->campaignId,
      $this->targetType => $this->targetValues,
      'segmentParams' => $this->segmentParams,
      // With PHP 5.3.x, json_encode strips protected and private properties
      // Transforming to array to avoid this
      'notification' => $this->notification ? (is_array($this->notification) ? $this->notification : (object)$this->notification->toArray()) : null,
      'notificationOverride' => $this->notificationOverride ? (is_array($this->notificationOverride) ? $this->notificationOverride : (object)$this->notificationOverride->toArray()) : null,
      'notificationParams' => $this->notificationParams,
      'notificationId' => $this->notificationId,
      'deliveryDate' => $this->deliveryDate ? $this->deliveryDate : null,
      'deliveryTime' => $this->deliveryTime ? $this->deliveryTime : null,
      'inheritUrlParameters' => (bool)$this->inheritUrlParameters,
      'filterWebDomains' => $this->filterWebDomains,
      'deliverySource' => $this->deliverySource,
    ));
  }

  /**
   * @param string $viewId
   * @return $this
   */
  public function setViewId($viewId) {
    $this->viewId = $viewId;
    return $this;
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
   * @param string|string[] $targetTag A single tag, an array of tags, or multiple tag parameters.
   * @return $this
   */
  public function setTargetTags($targetTag) {
    $this->targetType = 'targetTags';
    $this->targetValues = \WonderPush\Util\ArrayUtil::flatten(func_get_args());
    return $this;
  }

  /**
   * @param string|string[] $segmentId A single id, an array of ids, or multiple id parameters.
   * @return $this
   */
  public function setTargetSegmentIds($segmentId) {
    $this->targetType = 'targetSegmentIds';
    $this->targetValues = \WonderPush\Util\ArrayUtil::flatten(func_get_args());
    return $this;
  }

  /**
   * @param int|int[] $segmentId A single id, an array of ids, or multiple id parameters.
   * @return $this
   */
  public function setTargetBrevoSegmentIds($segmentId) {
    $this->targetType = 'targetBrevoSegmentIds';
    $this->targetValues = \WonderPush\Util\ArrayUtil::flatten(func_get_args());
    return $this;
  }

  /**
   * @param int|int[] $listId A single id, an array of ids, or multiple id parameters.
   * @return $this
   */
  public function setTargetBrevoListIds($segmentId) {
    $this->targetType = 'targetBrevoListIds';
    $this->targetValues = \WonderPush\Util\ArrayUtil::flatten(func_get_args());
    return $this;
  }

  /**
   * @param array $segment A segment definition
   * @return $this
   */
  public function setTargetSegmentBody($segment) {
    $this->targetType = 'targetSegmentBody';
    $this->targetValues = $segment;
    return $this;
  }

  /**
   * @param string|string[] $userId A single id, an array of ids, or multiple id parameters.
   * @return $this
   */
  public function setTargetUserIds($userId) {
    $this->targetType = 'targetUserIds';
    $this->targetValues = \WonderPush\Util\ArrayUtil::flatten(func_get_args());
    return $this;
  }

  /**
   * @param string|string[] $installationId A single id, an array of ids, or multiple id parameters.
   * @return $this
   */
  public function setTargetInstallationIds($installationId) {
    $this->targetType = 'targetInstallationIds';
    $this->targetValues = \WonderPush\Util\ArrayUtil::flatten(func_get_args());
    return $this;
  }

  /**
   * @param string|string[] $deviceIds A single id, an array of ids, or multiple id parameters.
   * @return $this
   */
  public function setTargetDeviceIds($deviceIds) {
    $this->targetType = 'targetDeviceIds';
    $this->targetValues = \WonderPush\Util\ArrayUtil::flatten(func_get_args());
    return $this;
  }

  /**
   * @param string|string[] $pushTokens A single token, an array of tokens, or multiple token parameters.
   * @return $this
   */
  public function setTargetPushTokens($pushTokens) {
    $this->targetType = 'targetPushTokens';
    $this->targetValues = \WonderPush\Util\ArrayUtil::flatten(func_get_args());
    return $this;
  }

  /**
   * @param string|string[] $accessTokens A single token, an array of tokens, or multiple token parameters.
   * @return $this
   */
  public function setTargetAccessTokens($accessTokens) {
    $this->targetType = 'targetAccessTokens';
    $this->targetValues = \WonderPush\Util\ArrayUtil::flatten(func_get_args());
    return $this;
  }

  /**
   * @param array $segmentParams Segment parameters, or an array of those, one per targeted segment, in the same order.
   * @return $this
   */
  public function setSegmentParams($segmentParams) {
    $this->segmentParams = $segmentParams;
    return $this;
  }

  /**
   * @param string $notificationId
   * @return $this
   */
  public function setNotificationId($notificationId) {
    $this->notificationId = $notificationId;
    return $this;
  }

  /**
   * @param \WonderPush\Obj\Notification|array $notification
   * @return $this
   */
  public function setNotification($notification) {
    $this->notification = $notification;
    return $this;
  }

  /**
   * @param \WonderPush\Obj\Notification|array $notificationOverride
   * @return $this
   */
  public function setNotificationOverride($notificationOverride) {
    $this->notificationOverride = $notificationOverride;
    return $this;
  }

  /**
   * @param array $notificationParams Notification parameters.
   * @return $this
   */
  public function setNotificationParams($notificationParams) {
    $this->notificationParams = $notificationParams;
    return $this;
  }

  /**
   * @return bool
   */
  public function getInheritUrlParameters() {
    return $this->inheritUrlParameters;
  }

  /**
   * @param bool $inheritUrlParameters
   * @return DeliveriesCreateParams
   */
  public function setInheritUrlParameters($inheritUrlParameters) {
    $this->inheritUrlParameters = $inheritUrlParameters;
    return $this;
  }

  /**
   * @return string[]|null Returns the domains as a PHP array, or null if not set
   */
  public function getFilterWebDomains() {
    return is_array($this->filterWebDomains) ? $this->filterWebDomains : null;
  }

  /**
   * @param string[]|null $domains
   * @return DeliveriesCreateParams
   */
  public function setFilterWebDomains($domains) {
    $this->filterWebDomains = is_array($domains) && count($domains) > 0 ? $domains : null;
    return $this;
  }

  /**
   * @return string|null Returns the domains as a PHP array, or null if not set
   */
  public function getDeliverySource() {
    return $this->deliverySource;
  }

  /**
   * @param string null $deliverySource
   * @return DeliveriesCreateParams
   */
  public function setDeliverySource($deliverySource) {
    $this->deliverySource = $deliverySource ?: null;
    return $this;
  }
}
