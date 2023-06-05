<?php

namespace WonderPush\Params;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

use WonderPush\Obj\BaseObject;

class FrequentFieldValuesParams extends BaseObject {

  /** @var int */
  private $limit;

  /** @var string[] */
  private $platforms;

  /** @var string */
  private $field;

  /** @var string */
  private $kind;

  /** @var string */
  private $viewId;

  /**
   * @return int
   */
  public function getLimit() {
    return $this->limit;
  }

  /**
   * @param int $limit
   * @return FrequentFieldValuesParams
   */
  public function setLimit($limit) {
    $this->limit = $limit;
    return $this;
  }

  /**
   * @return string[]
   */
  public function getPlatforms() {
    return $this->platforms;
  }

  /**
   * @param string[] $platforms
   * @return FrequentFieldValuesParams
   */
  public function setPlatforms($platforms) {
    $this->platforms = $platforms;
    return $this;
  }

  /**
   * @return string
   */
  public function getField() {
    return $this->field;
  }

  /**
   * @param string $field
   * @return FrequentFieldValuesParams
   */
  public function setField($field) {
    $this->field = $field;
    return $this;
  }

  /**
   * @return string
   */
  public function getKind() {
    return $this->kind;
  }

  /**
   * @param string $kind
   * @return FrequentFieldValuesParams
   */
  public function setKind($kind) {
    $this->kind = $kind;
    return $this;
  }

  /**
   * @return string
   */
  public function getViewId() {
    return $this->viewId;
  }

  /**
   * @param string $viewId
   * @return FrequentFieldValuesParams
   */
  public function setViewId($viewId) {
    $this->viewId = $viewId;
    return $this;
  }

}
