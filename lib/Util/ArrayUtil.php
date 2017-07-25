<?php

namespace WonderPush\Util;

/**
 * Utility class for array manipulation.
 */
class ArrayUtil {

  static public function flatten($a) {
    if(!is_array($a)) return array();
    $result = array();
    foreach($a as $key => $v){
      if(is_array($v)) $result = array_merge($result, self::flatten($v));
      else $result[$key] = $v;
    }
    return $result;
  }

  static public function getIfSet($a, $i, $notSet = NULL) {
    return isset($a[$i]) ? $a[$i] : $notSet;
  }

  static public function is_not_null($var) {
    return !is_null($var);
  }

  static public function filterNulls($array) {
    return array_filter($array, '\WonderPush\Util\ArrayUtil::is_not_null');
  }

}
