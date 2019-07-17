<?php

namespace WonderPush\Obj;

class Pagination extends BaseObject {

  /** @var string */
  private $previous;

  /** @var string */
  private $next;

  /**
   * @return string
   */
  public function getPrevious() {
    return $this->previous;
  }

  /**
   * @param string $previous
   * @return Pagination
   */
  public function setPrevious($previous) {
    $this->previous = $previous;
    return $this;
  }

  /**
   * @return string
   */
  public function getNext() {
    return $this->next;
  }

  /**
   * @param string $next
   * @return Pagination
   */
  public function setNext($next) {
    $this->next = $next;
    return $this;
  }
}
