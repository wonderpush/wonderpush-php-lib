<?php

namespace WonderPush\Errors;

use WonderPush\Net\CurlHttpClient;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * Network related errors, and API error responses.
 */
class Network extends Base {

  /** @var \WonderPush\Net\Request */
  protected $request;

  /** @var \WonderPush\Net\Response */
  protected $response;

  public function __construct(\WonderPush\Net\Request $request, \WonderPush\Net\Response $response) {
    $msg = 'Network';
    if ($response && $response->getHeaders()) {
      $headers = $response->getHeaders();
      $bits = array();
      $curlMessage = isset($headers[CurlHttpClient::HEADER_CURL_ERROR]) ? $headers[CurlHttpClient::HEADER_CURL_ERROR] : null;
      if ($curlMessage) $bits []= $curlMessage;
      $curlCode = isset($headers[CurlHttpClient::HEADER_CURL_ERRNO]) ? $headers[CurlHttpClient::HEADER_CURL_ERRNO] : null;
      if ($curlCode) $bits []= "(" . $curlCode . ")";
      if (sizeof($bits)) $msg = join(' ', $bits);
    }
    parent::__construct($msg);
    $this->request = $request;
    $this->response = $response;
  }

  /**
   * The network request that was performed.
   * @return \WonderPush\Net\Request
   */
  public function getRequest() {
    return $this->request;
  }

  /**
   * The network response that was received.
   * @return \WonderPush\Net\Response
   */
  public function getResponse() {
    return $this->response;
  }

}
