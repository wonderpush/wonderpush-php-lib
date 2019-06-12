<?php

namespace WonderPush\Obj;

/**
 * DTO for installations.
 *
 * See {@link https://www.wonderpush.com/docs/concepts/installation}
 * @codeCoverageIgnore
 */
abstract class Collection extends Object {
  /** @var int */
  private $count;

  /** @var Pagination */
  private $pagination;

  public function __construct($data = null) {
    parent::__construct($data);
  }

  /**
   * @return int
   */
  public function getCount() {
    return $this->count;
  }

  /**
   * @param int $count
   * @return Collection
   */
  public function setCount($count) {
    $this->count = $count;
    return $this;
  }

  /**
   * @return array
   */
  abstract public function getData();

  /**
   * @param array $data
   * @return Collection
   */
  abstract public function setData($data);

  /**
   * @return Pagination
   */
  public function getPagination() {
    return $this->pagination;
  }

  /**
   * @param Pagination $pagination
   * @return Collection
   */
  public function setPagination($pagination) {
    $this->pagination = Object::instantiateForSetter('\WonderPush\Obj\Pagination', $pagination);
    return $this;
  }

}
