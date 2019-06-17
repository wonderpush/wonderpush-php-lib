<?php

namespace WonderPush\Obj;

/**
 * DTO for installations.
 *
 * See {@link https://www.wonderpush.com/docs/concepts/installation}
 * @codeCoverageIgnore
 */
class Application extends Object {

  /** @var string */
  private $id;
  /** @var long */
  private $creationDate;
  /** @var long */
  private $updateDate;
  /** @var string */
  private $webKey;

  public function __construct($data = null) {
    parent::__construct($data);
  }

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
   * @return long
   */
  public function getCreationDate() {
    return $this->creationDate;
  }

  /**
   * @param long $creationDate
   * @return Application
   */
  public function setCreationDate($creationDate) {
    $this->creationDate = $creationDate;
    return $this;
  }

  /**
   * @return long
   */
  public function getUpdateDate() {
    return $this->updateDate;
  }

  /**
   * @param long $updateDate
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
