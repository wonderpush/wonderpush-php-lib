<?php

namespace WonderPush\Util;

/**
 * Utility class for string manipulation.
 */
class StringUtil {

  public static function beginsWith($subject, $sub) {
    return substr($subject, 0, strlen($sub)) === $sub;
  }

  public static function endsWith($haystack, $needle) {
    if ($needle === '') return true;
    return substr($haystack, -strlen($needle)) === $needle;
  }

  public static function contains($haystack, $needle) {
    return strpos($haystack, $needle) !== false;
  }

  /**
   * replace instances of {0} by the second arg, {1} by the third arg ...
   * If the second argument is an associative array, we will use the values
   * in the array to replace {key} 's occurences in the string $s
   * @param string $format
   * @param string[] $args
   */
  public static function format($format, $args) {
    $vars = func_get_args();
    $search = array();
    $replace = array();

    if (!is_array($args) && !is_object($args)) {
      $args = func_get_args();
      array_shift($args);
    }

    foreach($args as $key => $value) {
      $search[] = '{' . $key . '}';
      $replace[] = $value;
    }

    return str_replace($search, $replace, $format);
  }

}
