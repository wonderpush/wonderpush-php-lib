<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO for installations.
 *
 * See {@link https://www.wonderpush.com/docs/concepts/installation}
 * @codeCoverageIgnore
 */
class SegmentCollection extends Collection {

  /** @var Segment[] */
  private $data;

  /**
   * @return Segment[]
   */
  public function getData() {
    return $this->data;
  }

  /**
   * @param Segment[] $data
   * @return SegmentCollection
   */
  public function setData($data) {
    $this->data = BaseObject::instantiateForSetter('\WonderPush\Obj\Segment[]', $data);
    return $this;
  }

}
