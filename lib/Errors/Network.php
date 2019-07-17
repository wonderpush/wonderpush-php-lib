<?php

namespace WonderPush\Errors;

/**
 * Network related errors, and API error responses.
 */
class Network extends Base {

  /** @var Request */
  protected $request;

  /** @var Response */
  protected $response;

  public function __construct(\WonderPush\Net\Request $request, \WonderPush\Net\Response $response) {
    parent::__construct('Network');
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
