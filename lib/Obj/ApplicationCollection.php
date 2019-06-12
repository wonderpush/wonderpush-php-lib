<?php

namespace WonderPush\Obj;

/**
 * DTO for installations.
 *
 * See {@link https://www.wonderpush.com/docs/concepts/installation}
 * @codeCoverageIgnore
 */
class ApplicationCollection extends Collection {
  /** @var Application[] */
  private $data;

  public function __construct($data = null) {
    parent::__construct($data);
  }

  /**
   * @return Application[]
   */
  public function getData() {
    return $this->data;
  }

  /**
   * @param Application[] $data
   * @return ApplicationCollection
   */
  public function setData($data) {
    $this->data = array_map(function ($item) {
      return is_array($item) ? new Application($item) : $item;
    }, $data);
    return $this;
  }

}
