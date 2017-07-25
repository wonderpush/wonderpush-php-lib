<?php

namespace WonderPush\Util;

/**
 * Utility class for array manipulation.
 */
class ArrayUtil {

  public static function flatten($a) {
    $result = array();

    if (is_array($a)) {
      foreach($a as $v) {
        if (is_array($v)) {
          $result = array_merge($result, self::flatten($v));
        } else {
          $result[] = $v;
        }
      }
    }

    return $result;
  }

  public static function getIfSet($a, $i, $notSet = NULL) {
    return isset($a[$i]) ? $a[$i] : $notSet;
  }

  public static function is_not_null($var) {
    return !is_null($var);
  }

  public static function filterNulls($array) {
    return array_filter($array, '\WonderPush\Util\ArrayUtil::is_not_null');
  }

}
