<?php

namespace WonderPush\Util;

/**
 * Utility class for URL manipulation.
 */
class UrlUtil {

  public static function parseQueryString($queryString) {
    if (is_array($queryString)) {
      return $queryString;
    }
    if ($queryString === '' || $queryString === null) {
      return array();
    }
    if (!is_string($queryString)) {
      throw new \InvalidArgumentException();
    }
    return call_user_func_array('array_merge', array_map(function($queryPart) {
      $keyValue = explode('=', $queryPart, 2);
      return array(urldecode($keyValue[0]) => urldecode($keyValue[1]));
    }, explode('&', $queryString)));
  }

  public static function replaceQueryStringInUrl($url, $newQueryString) {
    $hashPos = strpos($url, '#');
    if ($hashPos === false) {
      $fragment = null;
    } else {
      $fragment = substr($url, $hashPos + 1);
      $url = substr($url, 0, $hashPos);
    }
    $questionMarkPos = strpos($url, '?');
    if ($questionMarkPos === false) {
      $qs = null;
    } else {
      $qs = substr($url, $questionMarkPos + 1);
      $url = substr($url, 0, $questionMarkPos);
    }
    //$qs = self::parseQueryString($qs);
    // We could easily permit merging here
    $qs = $newQueryString;
    if (!is_string($qs) && $qs !== null) {
      if (defined('PHP_QUERY_RFC3986')) {
        $qs = http_build_query($qs, null, '&', PHP_QUERY_RFC3986);
      } else {
        $qs = http_build_query($qs);
      }
    }
    if (!empty($qs)) {
      $url .= '?' . $qs;
    }
    if ($fragment !== null) {
      $url .= '#' . $fragment;
    }
    return $url;
  }

}
