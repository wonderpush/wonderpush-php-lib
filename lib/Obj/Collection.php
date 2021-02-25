<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO for installations.
 *
 * See {@link https://www.wonderpush.com/docs/concepts/installation}
 * @codeCoverageIgnore
 */
abstract class Collection extends BaseObject {

  /** @var int */
  private $count;

  /** @var Pagination */
  private $pagination;

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
    $this->pagination = BaseObject::instantiateForSetter('\WonderPush\Obj\Pagination', $pagination);
    return $this;
  }

}
