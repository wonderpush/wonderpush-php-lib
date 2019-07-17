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
  /** @var string */
  private $webKey;

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

}
