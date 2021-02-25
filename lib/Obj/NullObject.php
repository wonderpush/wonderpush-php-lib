<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * Null marker for {@link \WonderPush\Obj\BaseObject} fields.
 *
 * The singleton instance of this class marks JSON `null` fields, as opposed to fields that are not set - which are represented by PHP's `null` value.
 *
 * For instance when deserializing the following JSON object `{"foo": "bar", "baz": null}` into a {@link \WonderPush\Obj\BaseObject},
 * calling `getBar()` would return `NullObject::getInstance()`, because the field is set to the JSON null value,
 * but calling `getQux()` would return `null`, because the field is not set.
 */
class NullObject extends BaseObject {

  private static $_instance;

  /**
   * DO NOT CALL.
   * @throws \LogicException
   * @see \WonderPush\Obj\NullObject::getInstance()
   */
  public function __construct() {
    if (self::$_instance !== null) {
      throw new \LogicException('You should not instantiate \WonderPush\Obj\NullObject, use \WonderPush\Obj\NullObject::getInstance() instead.');
    }
    parent::__construct();
  }

  public static function getInstance() {
    if (self::$_instance === null) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }

  protected function buildDataFromFields() {
    return null;
  }

}

NullObject::getInstance(); // ensure creation and that calling the constructor throws
