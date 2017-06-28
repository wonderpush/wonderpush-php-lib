<?php

namespace WonderPush\Util;

class ArrayUtil {

  static public function intersectRecursive($a, $b) {
    if (is_array($a) && is_array($b) && (empty($a) || self::isAssociative($a)) && (empty($b) || self::isAssociative($b))) {
      $base = array();
      foreach ($a as $key => $value) {
        if (array_key_exists($key, $b)) {
          $base[$key] = self::intersectRecursive($a[$key], $b[$key]);
        }
      }
    } else {
      $base = $a;
    }
    return $base;
  }

  /**
   * (object means associative array)
   * base    | toBeMerged | result
   * --------+------------+-----------
   * present | absent     | base
   * absent  | present    | toBeMerged
   * any     | null       | remove or null
   * null    | any        | toBeMerged
   * object  | object     | deep merge
   * object  | array      | toBeMerged
   * array   | object     | toBeMerged
   * array   | array      | toBeMerged
   * array   | scalar     | toBeMerged
   * scalar  | array      | toBeMerged
   * object  | scalar     | toBeMerged
   * scalar  | object     | toBeMerged
   * scalar  | scalar     | toBeMerged
   * @param array $base
   * @param array $toBeMerged
   */
  static public function deepMerge($base, $toBeMerged, $nullFieldRemoves = false) {
    return self::deepMergeInplace($base, $toBeMerged, $nullFieldRemoves);
  }

  static public function deepMergeInplace(&$base, $toBeMerged, $nullFieldRemoves = false) {
    if (is_array($base) && is_array($toBeMerged) && (empty($base) || self::isAssociative($base)) && (empty($toBeMerged) || self::isAssociative($toBeMerged))) {
      foreach ($toBeMerged as $key => $value) {
        if (null === $value && true === $nullFieldRemoves) {
          unset($base[$key]);
        } else if (!isset($base[$key])) {
          $base[$key] = $value;
        } else {
          self::deepMergeInplace($base[$key], $value, $nullFieldRemoves);
        }
      }
    } else {
      $base = $toBeMerged;
    }
    return $base;
  }

  /**
   * Combine values of the two given arrays, then remove duplicates.
   * @param array $setA
   * @param array $setB
   * @return array
   */
  static public function setMerge($setA, $setB) {
    return array_keys(array_flip($setA) + array_flip($setB)); // use + instead of array_merge in case the flipped arrays are nonassociative
  }

  /**
   * Returns the recursive strict difference between two arrays.
   * The returned diff can be applied to transform $base into $new,
   * hence it contains a subset of values from $new.
   * The special value null is used when a key is removed.
   * Nonassociative arrays are treated as scalar values.
   * @param array $new
   * @param array $base
   * @return mixed|array
   */
  static public function diffStrictRecursive($new, $base, $removedValueMarked = null) {
    if ((!is_array($new) && !($new instanceof \stdClass))
        || (!is_array($base) && !($base instanceof \stdClass))
        || !self::isAssociative($new)
        || !self::isAssociative($base)) {
      return $new;
    }
    $rtn = array();

    if ($new  instanceof \stdClass) $new  = get_object_vars($new);
    if ($base instanceof \stdClass) $base = get_object_vars($base);

    $keys = self::setMerge(array_keys($new), array_keys($base));
    foreach ($keys as $key) {
      if (array_key_exists($key, $new)) {
        if (array_key_exists($key, $base)) {
          $valNew = $new[$key];
          $valBase = $base[$key];
          if ((!is_array($valNew) && !($valNew instanceof \stdClass))
              || (!is_array($valBase) && !($valBase instanceof \stdClass))
              || !self::isAssociative($valNew)
              || !self::isAssociative($valBase)) {
            if ($valNew !== $valBase) {
              $rtn[$key] = $valNew;
            }
          } else {
            $diff = self::diffStrictRecursive($valNew, $valBase, $removedValueMarked);
            if (!empty($diff)) {
              $rtn[$key] = $diff;
            }
          }
        } else {
          $rtn[$key] = $new[$key];
        }
      } else {
        $rtn[$key] = $removedValueMarked; // remove value
      }
    }

    return $rtn;
  }

  static public function trim($a) {
    $result = array();
    foreach ($a as $key => $item) {
      $result[$key] = is_array($item) ? self::trim($item) : ((is_string($item)) ? trim($item) : $item);
    }
    return $result;
  }

  static public function flatten($a) {
    if(!is_array($a)) return array();
    $result = array();
    foreach($a as $key => $v){
      if(is_array($v)) $result = array_merge($result, self::flatten($v));
      else $result[$key] = $v;
    }
    return $result;
  }

  /**
   * Walks the input array and collects values encountered at the desired depth.
   * If depth is 0, return the input value inside an array, for consistency.
   * @param mixed $array - Should be nested arrays upto `depth` levels. If `depth` is 0, can be any type.
   * @param integer $depth - The depth of the items to collect and return.
   * @param boolean $references - Whether to collect references to the items, or to copy them.
   * @return array
   */
  public static function collectAtDepth(&$array, $depth, $references = false) {
    $collectInto = array();
    self::collectAtDepthInto($array, $depth, $collectInto, $references);
    return $collectInto;
  }

  /**
   * Walks the input array and collects values encountered at the desired depth.
   * If depth is 0, return the input value inside an array, for consistency.
   * @param mixed $array - Should be nested arrays upto `depth` levels. If `depth` is 0, can be any type.
   * @param integer $depth - The depth of the items to collect and return.
   * @param array $collectInto - Array in which the collected items will be appended.
   * @param boolean $references - Whether to collect references to the items, or to copy them.
   * @return array
   */
  public static function collectAtDepthInto(&$array, $depth, &$collectInto, $references = false) {
    if ($depth === 1) { // reduce function calls
      if ($references) {
        foreach ($array as &$item) {
          $collectInto[] = &$item;
        }
      } else {
        foreach ($array as &$item) {
          $collectInto[] = $item;
        }
      }
    } else if ($depth >= 1) { // recursion
      foreach ($array as &$item) {
        // Do not check $item to be an array, in order to get Notice in the logs on bad input (too shallow at some places)
        self::collectAtDepthInto($item, $depth - 1, $collectInto, $references);
      }
    } else { // leaf case
      if ($references) {
        $collectInto[] = &$array;
      } else {
        $collectInto[] = $array;
      }
    }
  }

  /**
   * Return a copy of the array, where the first occurrence of the given value
   * is removed. The array preserves its non-associativeness.
   * @param array $a
   * @param mixed $e
   * @return array
   */
  static public function remove($a, $e) {
    self::removeInplace($a, $e);
    return $a;
  }

  /**
   * Remove the first occurrence of the given value.
   * The array preserves its non-associativeness.
   * @param array &$a
   * @param mixed $e
   */
  static public function removeInplace(&$a, $e) {
    $pos = array_search($e, $a);
    if($pos !== false) {
      if (self::isAssociative($a)) {
        unset($a[$pos]);
      } else {
        array_splice($a, $pos, 1);
      }
    }
  }

  /**
   * Return a copy of the array, where all occurrences of the given value
   * are removed. The array preserves its non-associativeness.
   * @param array $a
   * @param mixed $e
   * @return array
   */
  static public function removeAll($a, $e) {
    self::removeAllInplace($a, $e);
    return $a;
  }

  /**
   * Remove all occurrences of the given value.
   * The array preserves its non-associativeness.
   * @param array &$a
   * @param mixed $e
   */
  static public function removeAllInplace(&$a, $e) {
    if (self::isAssociative($a)) {
      foreach (array_keys($a) as $k) {
        if ($a[$k] === $e) {
          unset($a[$k]);
        }
      }
    } else {
      for ($cnt = count($a), $i = 0 ; $i < $cnt ; ++$i) {
        if ($a[$i] === $e) {
          array_splice($a, $i, 1);
          --$i;
          --$cnt;
        }
      }
    }
  }

  /**
   * Return a copy of the array, where the first occurrence of the given value
   * is replaced by the other given value.
   * @param array $a
   * @param mixed $e
   * @param mixed $v
   * @return array
   */
  static public function replace($a, $e, $v) {
    self::replaceInplace($a, $e, $v);
    return $a;
  }

  /**
   * Replaces the first occurrence of the given value by the other given value.
   * @param array &$a
   * @param mixed $e
   * @param mixed $v
   */
  static public function replaceInplace(&$a, $e, $v) {
    $pos = array_search($e, $a, $v);
    if($pos !== false) {
      $a[$pos] = $v;
    }
  }

  /**
   * Return a copy of the array, where all occurrences of the given value
   * are replaced by the other given value.
   * @param array $a
   * @param mixed $e
   * @param mixed $v
   * @return array
   */
  static public function replaceAll($a, $e, $v) {
    self::replaceAllInplace($a, $e, $v);
    return $a;
  }

  /**
   * Replace all occurrences of the given value by the other given value.
   * @param array &$a
   * @param mixed $e
   * @param mixed $v
   */
  static public function replaceAllInplace(&$a, $e, $v) {
    foreach ($a as &$i) {
      if ($i === $e) {
        $i = $v;
      }
    }
  }

  /**
   * Return a copy of the array, where all occurrences of the given value
   * are recursively replaced by the other given value.
   * @param array $a
   * @param mixed $e
   * @param mixed $v
   * @return array
   */
  static public function replaceAllRecursive($a, $e, $v) {
    self::replaceAllRecursiveInplace($a, $e, $v);
    return $a;
  }

  /**
   * Recursively replace all occurrences of the given value by the other given value.
   * @param array &$a
   * @param mixed $e
   * @param mixed $v
   */
  static public function replaceAllRecursiveInplace(&$a, $e, $v) {
    foreach ($a as &$i) {
      if ($i === $e) {
        $i = $v;
      } else if (is_array($i)) {
        self::replaceAllRecursiveInplace($i, $e, $v);
      }
    }
  }

  static public function getIfSet($a, $i, $notSet = NULL) {
    return isset($a[$i]) ? $a[$i] : $notSet;
  }

  /**
   * Copy a set of keys from a source array to a destination array
   * @param array $dest associative array
   * @param array $source associative array
   * @param array $keys indexed array
   */
  static public function copyIfSet(&$dest, $source, $keys) {
    foreach ($keys as $k) {
      if (isset($source[$k])) {
        $dest[$k] = $source[$k];
      }
    }
  }

  /**
   * Applies isset() on the first parameter, for every key given,
   * and returns true iif all keys exist in the array and the associated value
   * is not null.
   * Keys can be either be given as variadic arguments, as an array, or both.
   * @param array $array
   * @param unknown_type $key
   * @return boolean
   */
  static public function allKeysSet($array, $key /*...*/) {
    $keys = func_get_args();
    array_shift($keys);
    foreach ($keys as $key) {
      if (is_array($key)) {
        foreach ($key as $k) {
          if (!isset($k, $array))
            return false;
        }
      } else {
        if (!isset($key, $array))
          return false;
      }
    }
    return true;
  }

  /**
   * Applies array_key_exists() on the first parameter, for every key given,
   * and returns true iif all keys exist in the array.
   * Keys can be either be given as variadic arguments, as an array, or both.
   * @param array $array
   * @param unknown_type $key
   * @return boolean
   */
  static public function allKeysExist($array, $key /*...*/) {
    $keys = func_get_args();
    array_shift($keys);
    foreach ($keys as $key) {
      if (is_array($key)) {
        foreach ($key as $k) {
          if (!array_key_exists($k, $array))
            return false;
        }
      } else {
        if (!array_key_exists($key, $array))
          return false;
      }
    }
    return true;
  }

  /**
   * Returns all values in a column from an multidimension array.
   * @param array $a
   * @param mixed $col index or key to collect from each entry in $a
   */
  static public function pluck($a, $col) {
    $result = array();
    foreach($a as $e)
    {
      $result[] = $e[$col];
    }
    return $result;
  }

  static public function setData(&$data, $field, $source, $path) {
    $current = $source;
    foreach($path as $pathToken) {
      if (isset($current[$pathToken])) {
	$current = $current[$pathToken];
      } else {
	$current = NULL;
	break;
      }
    }

    if ($current) {
      $data[$field] = $current;
    }
  }

  /**
   * A non-associative array must have keys ranging from 0 to count($array)-1,
   * in this strict order.
   * @param array $array
   * @return boolean
   */
  static public function isAssociative(&$array) {
    if ($array instanceof \stdClass) return true;
    if (!is_array($array)) return false;
    $i = -1;
    foreach($array as $k=>$v) {
      if (++$i !== $k) return true;
    }
    return false;
  }

  static public function is_not_null($var) {
    return !is_null($var);
  }

  static public function filterNulls($array) {
    return array_filter($array, '\WonderPush\Util\ArrayUtil::is_not_null');
  }

  /**
   * Sorts associative arrays recursively, leaving nonassociative arrays as is.
   * Sorted or not, all arrays values are likewise recursively sorted.
   * @param array $array
   */
  static public function recursiveSortAssociativeInPlace(&$array) {
    if (!is_array($array)) return; // called recursively on every array values by array_walk(): don't affect non arrays
    asort($array);
    array_walk($array, '\WonderPush\Util\ArrayUtil::recursiveSortAssociativeInPlace');
  }

  static public function hash($array, $algo = 'sha1', $recursiveSortAssociativeArrays = true) {
    if (true === $recursiveSortAssociativeArrays) {
      ArrayUtil::recursiveSortAssociativeInPlace($array);
    }
    if (null === $algo) {
      $algo = 'sha1';
    }
    return hash($algo, json_encode($array));
    // If the array quite is big, use a reference, be careful with sorting,
    // and use hash_init(), hash_update(), array_walk(), and hash_final().
  }

  /**
   * Returns array that is sub part of input array matching path
   * @param array $array
   * @param string $path something like "foo" or "foo.bar.baz"
   * @return sub part array that match $path
   */
  static public function keepPath($array, $path) {
    $filtered = array();
    $current = &$array;
    $filteredCurrent = &$filtered;

    $pathTokens = explode('.', $path);
    $lastToken = array_pop($pathTokens);
    foreach ($pathTokens as $pathToken) {
      if (isset($current[$pathToken])) {
        $filteredCurrent[$pathToken] = array();
        $filteredCurrent = &$filteredCurrent[$pathToken];
        $current = &$current[$pathToken];
      } else {
        return null;
      }
    }
    if (isset($current[$lastToken])) {
      $filteredCurrent[$lastToken] = $current[$lastToken];
    } else {
      return null;
    }

    return $filtered;
  }

  /**
   * Returns array that is sub part of input array matching given paths
   * @param array $array
   * @param string[] $paths each value is something like "foo" or "foo.bar.baz"
   * @return sub part array that match $paths
   */
  static public function keepPaths($array, $paths) {
    $filtered = array();

    foreach ($paths as $path) {
      $kept = self::keepPath($array, $path);
      if ($kept !== null) {
        $filtered = array_merge_recursive($filtered, $kept);
      }
    }

    return $filtered;
  }

  /**
   * @param array $array
   * @param string[] $path
   * @return mixed
   */
  public static function getAtDottedPath(&$array, $path) {
    if (empty($path)) {
      $pathSegments = array();
    } else {
      $pathSegments = explode('.', $path);
    }
    return self::getAtPath($array, $pathSegments);
  }

  /**
   * @param array $array
   * @param string[] $path
   * @return mixed
   */
  public static function getAtPath(&$array, $path) {
    if ($path === null) {
      $path = array();
    } else if (!is_array($path)) {
      $path = array_filter(array($path));
    }
    foreach ($path as $key) {
      if (is_array($array) && array_key_exists($key, $array)) {
        $array =& $array[$key];
      } else {
        unset($array); // break reference
        $array = null;
      }
    }
    return $array;
  }

  /**
   * Sets a value inside a recursive array.
   * @param array $array - Array to alter
   * @param string $path - Dot separated path.to.key
   * @param mixed $value - Desired value
   */
  public static function setAtDottedPath(&$array, $path, $value) {
    if (empty($path)) {
      $pathSegments = array();
    } else {
      $pathSegments = explode('.', $path);
    }
    self::setAtPath($array, $pathSegments, $value);
  }

  /**
   * Sets a value inside a recursive array.
   * @param array $array - Array to alter
   * @param string[] $path - Path to key
   * @param mixed $value - Desired value
   */
  public static function setAtPath(&$array, $path, $value) {
    foreach ($path as $key) {
      if (!isset($array[$key]) || !is_array($array[$key])) {
        $array[$key] = array();
      }
      $array =& $array[$key];
    }
    $array = $value;
  }

}
