<?php
namespace WonderPush\Params;

class CollectionParams implements Params {

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

  /** @var mixed */
  public function toArray() {
    $result = array();
    if ($this->limit !== null) $result['limit'] = $this->limit;
    if ($this->offset !== null) $result['offset'] = $this->offset;
    return $result;
  }
}