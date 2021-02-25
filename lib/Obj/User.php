<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO for users.
 *
 * See {@link https://www.wonderpush.com/docs/concepts/user}
 * @codeCoverageIgnore
 */
class User extends BaseObject {

  /** @var string */
  private $id;
  /** @var string */
  private $applicationId;
  /** @var integer */
  private $creationDate;
  /** @var integer */
  private $updateDate;
  /** @var array */
  private $custom;

  /**
   * @return string
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @param string $id
   * @return User
   */
  public function setId($id) {
    $this->id = $id;
    return $this;
  }

  /**
   * @return string
   */
  public function getApplicationId() {
    return $this->applicationId;
  }

  /**
   * @param string $applicationId
   * @return User
   */
  public function setApplicationId($applicationId) {
    $this->applicationId = $applicationId;
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
   * @return User
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
   * @return User
   */
  public function setUpdateDate($updateDate) {
    $this->updateDate = $updateDate;
    return $this;
  }

  /**
   * @return array
   */
  public function getCustom() {
    return $this->custom;
  }

  /**
   * @param array $custom
   * @return User
   */
  public function setCustom($custom) {
    $this->custom = $custom;
    return $this;
  }

}
