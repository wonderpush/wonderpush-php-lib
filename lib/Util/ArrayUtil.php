<?php

namespace WonderPush\Util;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * Utility class for array manipulation.
 */
class ArrayUtil {

  /**
   * Flattens nested non-associative arrays, without preserving keys.
   *
   * Return `array()` if a non array argument has been given.
   *
   * @param array $nestedArrays The nested arrays to flatten.
   * @return array
   */
  public static function flatten($nestedArrays) {
    $result = array();

    if (is_array($nestedArrays)) {
      foreach($nestedArrays as $v) {
        if (is_array($v)) {
          $result = array_merge($result, self::flatten($v));
        } else {
          $result[] = $v;
        }
      }
    }

    return $result;
  }

  /**
   * Return a given array key if it `isset` or a default value.
   *
   * Note: Using `isset` implies that if the key is present according to `array_key_exists()`
   * but is associated to the value `null`, the default value will be returned instead (which defaults to `null`).
   *
   * @param array $array The array to look into
   * @param integer|string $key The desired key
   * @param mixed $notSet The default value to return if the key is missing or its associated value is `null`.
   * @return mixed
   */
  public static function getIfSet($array, $key, $notSet = null) {
    return isset($array[$key]) ? $array[$key] : $notSet;
  }

  /**
   * Utility function `!is_null()`.
   * @param mixed $var
   * @return boolean
   * @see filterNulls()
   */
  public static function is_not_null($var) {
    return $var !== null;
  }

  /**
   * Filter null values from an array.
   *
   * This differs from `array_filter($array)` without callback in that a strict comparison is used for `null`,
   * so `0`, `false`, `""`, `array()` and the like will not be filtered out.
   *
   * @param array $array
   * @return array
   */
  public static function filterNulls($array) {
    return array_filter($array, '\WonderPush\Util\ArrayUtil::is_not_null');
  }

}
