<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO for installations.
 *
 * See {@link https://www.wonderpush.com/docs/concepts/installation}
 * @codeCoverageIgnore
 */
class InstallationCollection extends Collection {

  /** @var Installation[] */
  private $data;

  /**
   * @return Installation[]
   */
  public function getData() {
    return $this->data;
  }

  /**
   * @param Installation[] $data
   * @return InstallationCollection
   */
  public function setData($data) {
    $this->data = BaseObject::instantiateForSetter('\WonderPush\Obj\Installation[]', $data);
    return $this;
  }

}
