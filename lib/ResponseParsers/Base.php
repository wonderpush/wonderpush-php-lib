<?php

namespace WonderPush\ResponseParsers;

/**
 * Base class for response parsers, representing a parsed response.
 *
 * Concrete subclasses parse {@link \WonderPush\Net\Response}s into DTO {@link \WonderPush\Object}s.
 *
 * This class also provide accessors for the original request builder, request and response.
 */
abstract class Base extends \WonderPush\Object {

  /**
   * Instance of the library whose credentials are to be used.
   * @var \WonderPush\WonderPush
   */
  protected $wp;

  /**
   * @var \WonderPush\RequestBuilders\Base
   */
  protected $requestBuilder;

  /**
   * @var \WonderPush\Net\Request
   */
  protected $netRequest;

  /**
   * @var \WonderPush\Net\Response
   */
  protected $netResponse;

  public function __construct(\WonderPush\WonderPush $wp, \WonderPush\RequestBuilders\Base $requestBuilder, \WonderPush\Net\Request $netRequest, \WonderPush\Net\Response $netResponse) {
    $this->wp = $wp;
    $this->requestBuilder = $requestBuilder;
    $this->netRequest = $netRequest;
    $this->netResponse = $netResponse;
    $this->parse();
  }

  /**
   * @return \WonderPush\RequestBuilders\Base
   */
  public function requestBuilder() {
    return $this->requestBuilder;
  }

  /**
   * @return \WonderPush\Net\Request
   */
  public function netRequest() {
    return $this->netRequest;
  }

  /**
   * @return \WonderPush\Net\Response
   */
  public function netResponse() {
    return $this->netResponse;
  }

  protected function parse() {
    $this->updateFieldsFromData($this->netResponse()->parsedBody());
  }

  /**
   * @return \WonderPush\Errors\Net An exception or {@code null}
   */
  public function exception() {
    $statusCode = $this->netResponse()->getStatusCode();
    $body = $this->netResponse()->parsedBody();

    $error = false; // false if no exception, true to return one, or an actual \Exception for chaining
    $errorMessage = null;
    $errorCode = null;

    if ($body instanceof \Exception) { // essentially for handling \WonderPush\Errors\JsonError

      $error = $body;
      $errorCode = $body->getCode();
      $errorMessage = $body->getMessage();

    } else if (isset($body->error) && is_object($body->error)) {

      $error = true;
      if (isset($body->error->message)) $errorMessage = $body->error->message;
      if (isset($body->error->code   )) $errorCode    = $body->error->code;
      //if (isset($body->error->status )) $statusCode   = $body->error->status;

    }

    if ($statusCode < 200 || $statusCode >= 300) {
      $error = true;
      if ($errorMessage === null) {
        $errorMessage = 'Non 2xx status code';
      }
    }

    if ($error !== false) {
      return new \WonderPush\Errors\Net($this->netRequest(), $this->netResponse(), $errorMessage, $errorCode, $error instanceof \Throwable ? $error : null);
    }
    return null;
  }

  /**
   * @return $this
   * @throws \WonderPush\Errors/NetError
   */
  public function checked() {
    $exception = $this->exception();
    if ($exception !== null) {
      throw $exception;
    } else {
      return $this;
    }
  }

}
