<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO for installations.
 *
 * See {@link https://www.wonderpush.com/docs/concepts/installation}
 * @codeCoverageIgnore
 */
class ApplicationCollection extends Collection {

  /** @var Application[] */
  private $data;

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
    $this->data = BaseObject::instantiateForSetter('\WonderPush\Obj\Application[]', $data);
    return $this;
  }

}
