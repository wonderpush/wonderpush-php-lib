<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO for installations.
 *
 * See {@link https://www.wonderpush.com/docs/concepts/installation}
 * @codeCoverageIgnore
 */
class Application extends BaseObject {

  /** @var string */
  private $id;
  /** @var integer */
  private $creationDate;
  /** @var integer */
  private $updateDate;
  /** @var integer */
  private $trialEndDate;
  /** @var string */
  private $webKey;
  /** @var WebSdkInitOptions */
  private $webSdkInitOptions;
  /** @var object */
  private $urlParameters;
  /** @var string */
  private $status;
  /** @var integer */
  private $subscribers;
  /** @var array */
  private $pushDisabledPlatforms;
  /** @var boolean */
  private $wordPressSnippetDeactivated;
  /** @var ApplicationBrevoContactSync */
  private $brevoContactSync;

  /**
   * @return string
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @param string $id
   * @return Application
   */
  public function setId($id) {
    $this->id = $id;
    return $this;
  }

  /**
   * @return integer
   */
  public function getCreationDate() {
    return $this->creationDate;
  }

  /**
   * @param integer $creationDate
   * @return Application
   */
  public function setCreationDate($creationDate) {
    $this->creationDate = $creationDate;
    return $this;
  }

  /**
   * @return integer
   */
  public function getUpdateDate() {
    return $this->updateDate;
  }

  /**
   * @param integer $updateDate
   * @return Application
   */
  public function setUpdateDate($updateDate) {
    $this->updateDate = $updateDate;
    return $this;
  }

  /**
   * @return int
   */
  public function getTrialEndDate() {
      return $this->trialEndDate;
  }

  /**
   * @param int $trialEndDate
   * @return Application
   */
  public function setTrialEndDate($trialEndDate) {
    $this->trialEndDate = $trialEndDate;
    return $this;
  }

  /**
   * @return string
   */
  public function getWebKey() {
    return $this->webKey;
  }

  /**
   * @param string $webKey
   * @return Application
   */
  public function setWebKey($webKey) {
    $this->webKey = $webKey;
    return $this;
  }

  /**
   * @return WebSdkInitOptions
   */
  public function getWebSdkInitOptions() {
    return $this->webSdkInitOptions;
  }

  /**
   * @param WebSdkInitOptions $webSdkInitOptions
   */
  public function setWebSdkInitOptions($webSdkInitOptions) {
    $this->webSdkInitOptions = BaseObject::instantiateForSetter('\WonderPush\Obj\WebSdkInitOptions', $webSdkInitOptions);
    return $this;
  }

  /**
   * @return object
   */
  public function getUrlParameters()
  {
    return $this->urlParameters ?: (object)array();
  }

  /**
   * @param object $urlParameters
   * @return Application
   */
  public function setUrlParameters($urlParameters)
  {
    $this->urlParameters = (object)$urlParameters;
    return $this;
  }

  /**
   * @return string|null
   */
  public function getStatus()
  {
    return $this->status ?: null;
  }

  /**
   * @param string $status
   * @return Application
   */
  public function setStatus($status)
  {
    $this->status = $status;
    return $this;
  }

  /**
   * @return int
   */
  public function getSubscribers()
  {
    return $this->subscribers ?: 0;
  }

  /**
   * @param int $subscribers
   * @return Application
   */
  public function setSubscribers( $subscribers )
  {
    $this->subscribers = $subscribers;
    return $this;
  }

  /**
   * @return array
   */
  public function getPushDisabledPlatforms()
  {
    return $this->pushDisabledPlatforms;
  }

  /**
   * @param array $pushDisabledPlatforms
   * @return Application
   */
  public function setPushDisabledPlatforms($pushDisabledPlatforms)
  {
    $this->pushDisabledPlatforms = (array)$pushDisabledPlatforms;
    return $this;
  }

  public function getWordPressSnippetDeactivated()
  {
    return (bool)$this->wordPressSnippetDeactivated;
  }

  public function setWordPressSnippetDeactivated($wordPressSnippetDeactivated)
  {
    $this->wordPressSnippetDeactivated = (bool)$wordPressSnippetDeactivated;
    return $this;
  }


  /**
   * @return ApplicationBrevoContactSync
   */
  public function getBrevoContactSync()
  {
    return $this->brevoContactSync;
  }

  /**
   * @param ApplicationBrevoContactSync $brevoContactSync
   * @return Application
   */
  public function setBrevoContactSync($brevoContactSync)
  {
    $this->brevoContactSync = BaseObject::instantiateForSetter('\WonderPush\Obj\ApplicationBrevoContactSync', $brevoContactSync);
    return $this;
  }

}
