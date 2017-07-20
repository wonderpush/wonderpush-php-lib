<?php

namespace WonderPush\Errors;

class Net extends Base {

  /** @var Request */
  protected $request;

  /** @var Response */
  protected $response;

  public function __construct(Request $request, Response $response, $message = "", $code = 0, \Exception $previous = null) {
    parent::__construct($message, $code, $previous);
    $this->request = $request;
    $this->response = $response;
  }

}
