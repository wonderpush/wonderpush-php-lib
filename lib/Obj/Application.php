<?php

namespace WonderPush\Obj;

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
}
