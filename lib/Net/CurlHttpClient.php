<?php

namespace WonderPush\Net;

/**
 * An HTTP client using PHP's cURL extension
 */
class CurlHttpClient implements HttpClientInterface {

  const HEADER_CURL_ERRNO = 'curl_errno';
  const HEADER_CURL_ERROR = 'curl_error';

  /**
   * Instance of the library for logging purposes.
   * @var \WonderPush\WonderPush
   */
  private $wp;

  /**
   * @param \WonderPush\WonderPush $wonderPush WonderPush instance whose credentials are to be used.
   */
  public function __construct(\WonderPush\WonderPush $wonderPush) {
    $this->wp = $wonderPush;
  }

  public function execute(Request $request) {
    // Construct absolute URL
    $root = $request->getRoot() ?: $this->wp->getApiRoot();
    $path = $request->getPath();
    if (!\WonderPush\Util\StringUtil::beginsWith($path, '/')) {
      $path = '/' . $path;
    }
    $url = $root . $path;

    $qsParams = $request->getQsParams();
    $headers = $request->getHeaders();
    $body = null;

    // Construct $qsParams and $body, and honors $request->getParams() too
    switch ($request->getMethod()) {
      case Request::GET:
      case Request::DELETE:
        $qsParams = array_merge($qsParams, $request->getParams());
        break;
      case Request::PUT:
      case Request::POST:
      case Request::PATCH:
        $body = $request->getParams();
        if (empty($body)) {
          $body = null;
        } else {
          $headers['Content-Type'] = 'application/json';
          if (defined('JSON_UNESCAPED_SLASHES')) {
            $body = json_encode($body, JSON_UNESCAPED_SLASHES);
          } else {
            $body = json_encode($body);
          }
        }
        break;
    }

    // Incorporate query string into URL
    if (!empty($qsParams)) {
      if (defined('PHP_QUERY_RFC3986')) {
        $qs = http_build_query($qsParams, null, '&', PHP_QUERY_RFC3986);
      } else {
        $qs = http_build_query($qsParams);
      }
      $prevQs = \WonderPush\Util\UrlUtil::parseQueryString(parse_url($url, PHP_URL_QUERY));
      $qsParams = array_merge($prevQs, $qsParams);
      $url = \WonderPush\Util\UrlUtil::replaceQueryStringInUrl($url, $qsParams);
    }

    // Serialize headers for cURL
    if (empty($headers)) {
      $headers = null;
    } else {
      $headers = array_map(function($key, $value) {
        if (is_int($key)) {
          return $value;
        } else {
          return $key . ': ' . $value;
        }
      }, array_keys($headers), $headers);
    }

    // Prepare other cURL options: Response headers reader
    $responseHeaders = array();
    $readHeaderCallback = function ($ch, $headerLine) use (&$responseHeaders) {
      if (strpos($headerLine, ":") !== false) {
        list($key, $value) = explode(":", trim($headerLine), 2);
        $responseHeaders[trim($key)] = trim($value);
      } // else, we're reading the HTTP status line
      return strlen($headerLine);
    };

    // Configure cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $request->getMethod());
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADERFUNCTION, $readHeaderCallback);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    if ($headers !== null) curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Execute cURL request
    $rawResponse = curl_exec($ch);

    // Parse response
    $response = new Response();
    $response->setRawBody($rawResponse);

    if (curl_errno($ch)) {

      $response->setStatusCode(0);
      $response->setHeaders(array(
          self::HEADER_CURL_ERRNO => curl_errno($ch),
          self::HEADER_CURL_ERROR => curl_error($ch),
      ));

    } else {

      $response->setStatusCode(curl_getinfo($ch, CURLINFO_HTTP_CODE));
      $response->setHeaders($responseHeaders);

    }

    // Cleanup
    curl_close($ch);

    return $response;
  }

}
