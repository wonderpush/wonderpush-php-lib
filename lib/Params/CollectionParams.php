<?php

namespace WonderPush\Params;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

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
