<?php

namespace WonderPush\Util;

/**
 * Utility class for string manipulation.
 */
class StringUtil {

  static public function beginsWith($subject, $sub) {
    return ( substr( $subject, 0, strlen( $sub ) ) == $sub );
  }

  static public function endsWith($haystack, $needle) {
    $length = strlen($needle);
    if ($length == 0) {
      return true;
    }

    return (substr($haystack, -$length) === $needle);
  }

  static public function contains($haystack, $needle) {
    return strpos($haystack, $needle) !== false;
  }

  /**
   * replace instances of {0} by the second arg, {1} by the third arg ...
   * If the second argument is an associative array, we will use the values
   * in the array to replace {key} 's occurences in the string $s
   * @param string $s
   * @param string[] $args
   */
  static public function format($s) {
    $vars = func_get_args();
    $search = $replace = array();

    if (is_array($vars[1])) {
      foreach($vars[1] as $key => $value) {
        $search[] = '{' . $key .'}';
        $replace[] = $value;
      }
    } else {
      $nb = func_num_args();
      for($i=1; $i<$nb;$i++)
      {
        $search[] = '{'.($i-1).'}';
        $replace[] = $vars[$i];
      }
    }

    return str_replace($search, $replace, $s);
  }

  static public function underscoreToUpperCamelCase($s) {
    return preg_replace_callback('/(?:^|_)(.?)/', function($matches){return strtoupper($matches[1]);}, $s);
  }

  static public function underscoreToLowerCamelCase($s) {
    return preg_replace_callback('/_(.?)/', function($matches){return strtoupper($matches[1]);}, $s);
  }

  static public function camelCaseToUnderscore($s) {
    return strtolower(preg_replace('/([^A-Z])([A-Z])/', "$1_$2", $s));
  }

}
