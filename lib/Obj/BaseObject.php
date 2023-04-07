<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * Base class for DTO objects.
 * @noinspection PhpUndefinedClassInspection
 */
class BaseObject implements \WonderPush\Util\JsonSerializable {

  public function __construct($data = null) {
    if ($data !== null) {
      $this->updateFieldsFromData($data);
    }
  }

  /**
   * Factory style constructor.
   * Compensates PHP 5.3's lack of (new Class())-> syntax support.
   * @param array $data
   * @return \static
   */
  public static function _new($data = null) {
    return new static($data);
  }

  public function clearAllFields() {
    try {
      $class = new \ReflectionClass($this);
    } catch (\ReflectionException $ex) {
      /** @noinspection ForgottenDebugOutputInspection */
      error_log('[' . __METHOD__ . "()] Unexpected reflection exception\n" . $ex->getTraceAsString());
      return;
    }
    $methods = $class->getMethods(\ReflectionMethod::IS_PUBLIC);
    foreach ($methods as $method) {
      /* @var $method \ReflectionMethod */
      if (!\WonderPush\Util\StringUtil::beginsWith($method->getName(), 'set')) {
        continue; // not a setter
      }
      try {
        $this->{$method->getName()}(null);
      } catch (\Exception $ex) {
        /** @noinspection ForgottenDebugOutputInspection */
        error_log('[' . __METHOD__ . '()] Exception caught while invoking ' . $method->getName() . "(null)\n" . $ex->getTraceAsString());
      }
    }
  }

  /**
   * Updates the fields present in $data.
   * @param array|\stdClass $data
   */
  protected function updateFieldsFromData($data) {
    if (!is_array($data) && !is_object($data)) {
      $ex = new \Exception();
      /** @noinspection ForgottenDebugOutputInspection */
      error_log('[' . __METHOD__ . '] Not an array or object: ' . json_encode($data) . "\n" . $ex->getTraceAsString());
    }
    foreach ($data as $key => $value) {
      $methodName = 'set' . ucfirst($key);
      if (method_exists($this, $methodName)) {
        if ($value === null) {
          $value = NullObject::getInstance();
        }
        $this->{$methodName}($value);
      }
    }
  }

  protected function buildDataFromField($value) {
    if ($value instanceof self) {
      return $value->buildDataFromFields();
    }
    if ($value instanceof \JsonSerializable) {
      return $value->jsonSerialize();
    }
    if (is_array($value)) {
      $newValues = array();
      foreach ($value as $k => $v) {
        $newValues[$k] = $this->buildDataFromField($v);
      }
      return $newValues;
    }
    return $value;
  }

  protected function buildDataFromFields() {
    $data = new \stdClass();

    try {
      $x = new \ReflectionClass(get_class($this));
    } catch (\ReflectionException $ex) {
      /** @noinspection ForgottenDebugOutputInspection */
      error_log('[' . __METHOD__ . "()] Unexpected reflection exception\n" . $ex->getTraceAsString());
      return null;
    }
    $methods = $x->getMethods(\ReflectionMethod::IS_PUBLIC);
    foreach ($methods as $method) {
      if (!$method->isStatic() && \WonderPush\Util\StringUtil::beginsWith($method->name, 'get')) {
        $field = substr($method->name, 3);
        $field[0] = strtolower($field[0]);
        $value = $method->invoke($this);
        if ($value !== null) {
          $data->{$field} = $this->buildDataFromField($value);
        }
      }
    }

    return $data;
  }

  protected static function instantiateForSetter($type, $data) {
    if (\WonderPush\Util\StringUtil::endsWith($type, '[]')) {
      $type = substr($type, 0, -2);
      return array_map(function($item) use ($type) {
        return BaseObject::instantiateForSetter($type, $item);
      }, $data);
    }
    if (is_array($data) || $data instanceof \stdClass) {
      return new $type($data);
    }
    return $data;
  }

  /**
   * Implements JsonSerializable
   * @return mixed
   */
  #[\ReturnTypeWillChange]
  public function jsonSerialize() {
    return $this->toData();
  }

  public function __toString() {
    if (defined('JSON_UNESCAPED_SLASHES')) {
      // @codingStandardsIgnoreLine
      return '<' . get_class($this) . '>' . json_encode($this, JSON_UNESCAPED_SLASHES);
    }
    return '<' . get_class($this) . '>' . json_encode($this);
  }

  /**
   * Returns an object representation of this instance.
   *
   * Note that empty() returns null for an object with no properties, unlike for an empty array.
   *
   * @return \stdClass
   */
  public function toData() {
    return $this->buildDataFromFields();
  }

  /**
   * Returns an array representation of this instance.
   *
   * Note that when serializing an empty instance to JSON you will get `[]` instead of `{}`.
   *
   * @return array
   */
  public function toArray() {
    return (array)$this->buildDataFromFields();
  }

  public function deepClone() {
    return unserialize(serialize($this));
  }

}
