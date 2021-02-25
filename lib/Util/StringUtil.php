<?php

namespace WonderPush\Util;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * Utility class for string manipulation.
 */
class StringUtil {

  /**
   * Returns whether a given string is prefixed by another.
   * @param string $subject The string to be tested
   * @param string $prefix The prefix to be detected
   * @return boolean
   */
  public static function beginsWith($subject, $prefix) {
    if ($subject === '') {
      return $prefix === ''; // substr() returns FALSE if the start arguments equals the string length prior to PHP 7.0.0
    }
    /** @noinspection SubStrUsedAsStrPosInspection */
    return substr($subject, 0, strlen($prefix)) === $prefix;
  }

  /**
   * Returns whether a given string is suffixed by another.
   * @param string $subject The string to be tested
   * @param string $suffix The suffix to be detected
   * @return boolean
   */
  public static function endsWith($subject, $suffix) {
    if ($suffix === '') {
      return true;
    }
    return substr($subject, -strlen($suffix)) === $suffix;
  }

  /**
   * Returns whether a given string contains another.
   * @param string $haystack The string to be tested
   * @param string $needle The substring to be detected
   * @return boolean
   */
  public static function contains($haystack, $needle) {
    return strpos($haystack, $needle) !== false;
  }

  /**
   * Performs string replacement of placeholders using the given replacements.
   *
   * If the second argument is an array, occurrences of each `{key}` in the format string will be replaced.
   * Otherwise, instances of `{0}`, `{1}`, etc… in the format string will be replaced by the value of the following arguments.
   *
   * The following two calls are identical: `format("{0}-{1}-{2}", "2001", "12", "31")` and `format("{0}-{1}-{2}", array("2001", "12", "31"))`.
   *
   * @param string $format The format string with `{key}` occurrences to be replaced.
   * @param string[]|\stdClass|mixed... $args The values used for replacement. Can also be multiple separate parameters.
   * @return string
   */
  public static function format($format, $args) {
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
