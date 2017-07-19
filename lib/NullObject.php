<?php

namespace WonderPush;

/**
 * Null marker for \WonderPush\Object fields.
 */
class NullObject extends Object {

  private static $_instance = null;

  /**
   * DO NOT CALL.
   * @throws \LogicException
   * @see \WonderPush\NullObject::getInstance()
   */
  public function __construct() {
    if (self::$_instance !== null) {
      throw new \LogicException('You should not instantiate \WonderPush\NullObject, use \WonderPush\NullObject::getInstance() instead.');
    }
    parent::__construct(null);
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
