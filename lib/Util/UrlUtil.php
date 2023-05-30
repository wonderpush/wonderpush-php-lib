<?php

namespace WonderPush\Util;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * Utility class for URL manipulation.
 */
class UrlUtil {

  /**
   * Parses a query string into an associative array.
   *
   * PHP syntax and duplicated arguments are not supported (`foo[bar]=`, `foo[]=`, etc.).
   *
   * @param string|null|string[] $queryString
   * @return string[] String parameter values by parameter name.
   * @throws \InvalidArgumentException
   */
  public static function parseQueryString($queryString) {
    if (is_array($queryString)) {
      return $queryString;
    }
    if ($queryString === '' || $queryString === null) {
      return array();
    }
    if (!is_string($queryString)) {
      throw new \InvalidArgumentException('Query string must be a string, null, or already parsed array');
    }
    return call_user_func_array('array_merge', array_map(function($queryPart) {
      $keyValue = explode('=', $queryPart, 2);
      return array(urldecode($keyValue[0]) => urldecode($keyValue[1]));
    }, explode('&', $queryString)));
  }

  /**
   * Returns a new URL with the desired query string in lieu of the original one, if any.
   * @param string $url The original URL to replace the query string from.
   * @param string|array $newQueryString The new query string to use.
   * @return string The modified URL with a new query string.
   */
  public static function replaceQueryStringInUrl($url, $newQueryString) {
    $hashPos = strpos($url, '#');
    if ($hashPos === false) {
      $fragment = null;
    } else {
      $fragment = substr($url, $hashPos + 1);
      $url = substr($url, 0, $hashPos);
    }
    $questionMarkPos = strpos($url, '?');
    if ($questionMarkPos !== false) {
      $url = substr($url, 0, $questionMarkPos);
    }
    $qs = $newQueryString;
    if (!is_string($qs) && $qs !== null) {
      if (defined('PHP_QUERY_RFC3986')) {
        // @codingStandardsIgnoreLine
        $qs = http_build_query($qs, '', '&', PHP_QUERY_RFC3986);
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
