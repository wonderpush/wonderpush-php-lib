<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO part for `installation.preferences`.
 * @see Installation
 * @codeCoverageIgnore
 */
class InstallationPreferences extends BaseObject {

  const SUBSCRIPTION_STATUS_OPTIN = 'optIn';
  const SUBSCRIPTION_STATUS_OPTOUT = 'optOut'; // soft opt-out: we have a push token (and don't want to loose it), but the user wished to disable push notifications

  /** @var string */
  private $subscriptionStatus;

  /**
   * @return string
   */
  public function getSubscriptionStatus() {
    return $this->subscriptionStatus;
  }

  /**
   * @param array $subscriptionStatus
   * @return InstallationPreferences
   */
  public function setSubscriptionStatus($subscriptionStatus) {
    $this->subscriptionStatus = $subscriptionStatus;
    return $this;
  }

}
