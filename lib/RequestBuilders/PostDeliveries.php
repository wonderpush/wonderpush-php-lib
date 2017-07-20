<?php

namespace WonderPush\RequestBuilders;

class PostDeliveries extends Base {

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

  public function request() {
    return $this->wp->rest()->request(\WonderPush\Net\Request::POST, self::PATH, \WonderPush\Util\ArrayUtil::filterNulls(array(
        'viewId' => $this->viewId,
        'campaignId' => $this->campaignId,
        $this->targetType => $this->targetValues,
        'segmentParams' => $this->segmentParams,
        'notification' => $this->notification,
        'notificationOverride' => $this->notificationOverride,
        'notificationParams' => $this->notificationParams,
        'notificationId' => $this->notificationId,
    )));
  }

  /**
   * @return \WonderPush\ResponseParsers\PostDeliveries
   */
  public function execute() {
    return parent::execute();
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
   * @param string|string[] $segmentId A single id, an array of ids, or multiple id parameters.
   * @return $this
   */
  public function setTargetSegmentIds($segmentId) {
    ($segmentId); // unused
    $this->targetType = 'targetSegmentIds';
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
    ($userId); // unused
    $this->targetType = 'targetUserIds';
    $this->targetValues = \WonderPush\Util\ArrayUtil::flatten(func_get_args());
    return $this;
  }

  /**
   * @param string|string[] $installationId A single id, an array of ids, or multiple id parameters.
   * @return $this
   */
  public function setTargetInstallationIds($installationId) {
    ($installationId); // unused
    $this->targetType = 'targetInstallationIds';
    $this->targetValues = \WonderPush\Util\ArrayUtil::flatten(func_get_args());
    return $this;
  }

  /**
   * @param string|string[] $deviceIds A single id, an array of ids, or multiple id parameters.
   * @return $this
   */
  public function setTargetDeviceIds($deviceIds) {
    ($deviceIds); // unused
    $this->targetType = 'targetDeviceIds';
    $this->targetValues = \WonderPush\Util\ArrayUtil::flatten(func_get_args());
    return $this;
  }

  /**
   * @param string|string[] $pushTokens A single token, an array of tokens, or multiple token parameters.
   * @return $this
   */
  public function setTargetPushTokens($pushTokens) {
    ($pushTokens); // unused
    $this->targetType = 'targetPushTokens';
    $this->targetValues = \WonderPush\Util\ArrayUtil::flatten(func_get_args());
    return $this;
  }

  /**
   * @param string|string[] $accessTokens A single token, an array of tokens, or multiple token parameters.
   * @return $this
   */
  public function setTargetAccessTokens($accessTokens) {
    ($accessTokens); // unused
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
   * @param \WonderPush\Notification|array $notification
   * @return $this
   */
  public function setNotification($notification) {
    $this->notification = $notification;
    return $this;
  }

  /**
   * @param \WonderPush\Notification|array $notificationOverride
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

}
