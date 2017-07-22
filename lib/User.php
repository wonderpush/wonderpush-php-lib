<?php

namespace WonderPush;

/**
 * DTO for users.
 *
 * See {@link https://www.wonderpush.com/docs/concepts/user}
 */
class User extends Object {

  const INVALID_USER_ID = '@INVALID';

  /** @var string */
  private $id;
  /** @var string */
  private $applicationId;
  /** @var long */
  private $creationDate;
  /** @var long */
  private $updateDate;
  /** @var array */
  private $custom;

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
   * @return long
   */
  public function getCreationDate() {
    return $this->creationDate;
  }

  /**
   * @param long $creationDate
   * @return User
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
