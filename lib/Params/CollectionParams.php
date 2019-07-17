<?php

namespace WonderPush\Params;

use WonderPush\Obj\BaseObject;

class CollectionParams extends BaseObject {

  /** @var int */
  private $limit;

  /** @var int */
  private $offset;

  /**
   * CollectionParams constructor.
   * @param int $limit
   * @param int $offset
   */
  public function __construct($limit = null, $offset = null) {
    parent::__construct();
    $this->limit = $limit;
    $this->offset = $offset;
  }

  /**
   * @return int
   */
  public function getLimit() {
    return $this->limit;
  }

  /**
   * @param int $limit
   * @return CollectionParams
   */
  public function setLimit($limit) {
    $this->limit = $limit;
    return $this;
  }

  /**
   * @return int
   */
  public function getOffset() {
    return $this->offset;
  }

  /**
   * @param int $offset
   * @return CollectionParams
   */
  public function setOffset($offset) {
    $this->offset = $offset;
    return $this;
  }

}
