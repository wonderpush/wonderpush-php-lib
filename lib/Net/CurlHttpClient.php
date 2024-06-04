<?php

namespace WonderPush\Net;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * An HTTP client using PHP's cURL extension
 */
class CurlHttpClient implements HttpClientInterface {

  /**
   * The fake HTTP header that will hold the output of `curl_errno()`.
   */
  const HEADER_CURL_ERRNO = 'curl_errno';

  /**
   * The fake HTTP header that will hold the output of `curl_error()`.
   */
  const HEADER_CURL_ERROR = 'curl_error';

  /**
   * Instance of the library for logging purposes.
   * @var \WonderPush\WonderPush
   */
  private $wp;

  /** @var array */
  private $options;
  /**
   * @param \WonderPush\WonderPush $wonderPush WonderPush instance whose credentials are to be used.
   */
  public function __construct(\WonderPush\WonderPush $wonderPush, $options = array()) {
    $this->wp = $wonderPush;
    $this->options = $options ?: array();
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
          $options = 0;
          if (defined('JSON_UNESCAPED_SLASHES')) {
            $options |= JSON_UNESCAPED_SLASHES;
          }
          if (defined('JSON_INVALID_UTF8_SUBSTITUTE')) {
            $options |= JSON_INVALID_UTF8_SUBSTITUTE;
          } else if (defined('JSON_PARTIAL_OUTPUT_ON_ERROR')) {
            $options |= JSON_PARTIAL_OUTPUT_ON_ERROR;
          }
          $body = json_encode($body, $options);
        }
        break;
    }

    // Incorporate query string into URL
    if (!empty($qsParams)) {
      $prevQs = \WonderPush\Util\UrlUtil::parseQueryString(parse_url($url, PHP_URL_QUERY));
      $qsParams = array_merge($prevQs, $qsParams);
      $url = \WonderPush\Util\UrlUtil::replaceQueryStringInUrl($url, $qsParams);
    }

    if (!isset($headers['User-Agent'])) {
      $curlVersion = curl_version();
      $headers['User-Agent'] = 'WonderPushApi/' . \WonderPush\WonderPush::API_VERSION
          . ' WonderPushPhpLib/' . \WonderPush\WonderPush::VERSION
          . ' curl/' . \WonderPush\Util\ArrayUtil::getIfSet($curlVersion, 'version', 'na')
          . ' ' . \WonderPush\Util\ArrayUtil::getIfSet($curlVersion, 'ssl_version', 'curlssl/na')
          ;
    }

    // Serialize headers for cURL
    if (empty($headers)) {
      $headers = null;
    } else {
      $headers = array_map(function($key, $value) {
        if (is_int($key)) {
          return $value;
        }
        return $key . ': ' . $value;
      }, array_keys($headers), $headers);
    }

    // Prepare other cURL options: Response headers reader
    $responseHeaders = array();
    $readHeaderCallback = function (/** @noinspection PhpUnusedParameterInspection */ $ch, $headerLine) use (&$responseHeaders) {
      if (\WonderPush\Util\StringUtil::contains($headerLine, ':')) {
        list($key, $value) = explode(':', trim($headerLine), 2);
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
    if (array_key_exists('ipv4', $this->options)
      && $this->options['ipv4']
      && defined('CURLOPT_IPRESOLVE')
      && defined('CURL_IPRESOLVE_V4')){
      curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    }
    if ($headers !== null) {
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }

    // Execute cURL request
    $rawResponse = curl_exec($ch);

    // Parse response
    $response = new Response();
    $response->setRequest($request);
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
