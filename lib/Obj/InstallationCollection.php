<?php

namespace WonderPush\Obj;

/**
 * DTO for installations.
 *
 * See {@link https://www.wonderpush.com/docs/concepts/installation}
 * @codeCoverageIgnore
 */
class InstallationCollection extends Collection {
  /** @var Installation[] */
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
   * @param Installation[] $data
   * @return InstallationCollection
   */
  public function setData($data) {
    $this->data = Object::instantiateForSetter('\WonderPush\Obj\Installation[]', $data);
    return $this;
  }

}
