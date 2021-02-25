<?php

namespace WonderPush\Errors;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * Network related errors, and API error responses.
 */
class Server extends Base {

  /** @var \WonderPush\Net\Request */
  protected $request;

  /** @var \WonderPush\Net\Response */
  protected $response;

  public function __construct(\WonderPush\Net\Request $request, \WonderPush\Net\Response $response, $message = '', $code = '0', \Exception $previous = null) {
    parent::__construct($message, $code, $previous);
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
