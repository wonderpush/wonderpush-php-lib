<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

class ValueOccurrence extends BaseObject {

  /** @var int */
  private $occurrences;

  /** @var string */
  private $value;

  /**
   * @return int
   */
  public function getOccurrences() {
    return $this->occurrences;
  }

  /**
   * @param int $occurrences
   * @return ValueOccurrence
   */
  public function setOccurrences($occurrences) {
    $this->occurrences = $occurrences;
    return $this;
  }

  /**
   * @return string
   */
  public function getValue() {
    return $this->value;
  }

  /**
   * @param string $value
   * @return ValueOccurrence
   */
  public function setValue($value) {
    $this->value = $value;
    return $this;
  }

}

/**
 * DTO for frequent field values.
 * @codeCoverageIgnore
 */
class FrequentFieldValues extends BaseObject {

  /** @var ValueOccurrence[] */
  private $data;

  /** @var int */
  private $cardinality;

  /**
   * @return ValueOccurrence[]
   */
  public function getData() {
    return $this->data;
  }

  /**
   * @param ValueOccurrence[] $data
   * @return FrequentFieldValues
   */
  public function setData($data) {
    $this->data = BaseObject::instantiateForSetter('\WonderPush\Obj\ValueOccurrence[]', $data);
    return $this;
  }

  /**
   * @return int
   */
  public function getCardinality() {
    return $this->cardinality;
  }

  /**
   * @param int $cardinality
   * @return FrequentFieldValues
   */
  public function setCardinality($cardinality) {
    $this->cardinality = $cardinality;
    return $this;
  }

}
