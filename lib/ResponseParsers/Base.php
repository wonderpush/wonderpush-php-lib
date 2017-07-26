<?php

namespace WonderPush\ResponseParsers;

/**
 * Base class for response parsers, representing a parsed response.
 *
 * Concrete subclasses parse {@link \WonderPush\Net\Response}s into DTO {@link \WonderPush\Obj\Object}s.
 *
 * This class also provide accessors for the original request builder, request and response.
 */
abstract class Base extends \WonderPush\Obj\Object {

  /**
   * Instance of the library whose credentials are to be used.
   * @var \WonderPush\WonderPush
   */
  protected $wp;

  /**
   * The request builder this response is built for.
   * @var \WonderPush\RequestBuilders\Base
   */
  protected $requestBuilder;

  /**
   * The network request this response is built for.
   * @var \WonderPush\Net\Request
   */
  protected $netRequest;

  /**
   * The network response this response is build for.
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
   * The request builder this response is built for.
   * @return \WonderPush\RequestBuilders\Base
   */
  public function requestBuilder() {
    return $this->requestBuilder;
  }

  /**
   * The network request this response is built for.
   * @return \WonderPush\Net\Request
   */
  public function netRequest() {
    return $this->netRequest;
  }

  /**
   * The network response this response is build for.
   * @return \WonderPush\Net\Response
   */
  public function netResponse() {
    return $this->netResponse;
  }

  /**
   * Parse the network response and fills the current object.
   *
   * The default implementation, which you should probably reuse,
   * fills the object fields using the fields from the response.
   */
  protected function parse() {
    $this->updateFieldsFromData($this->netResponse()->parsedBody());
  }

  /**
   * Returns an exception, if the response is an error.
   *
   * An error might be caused by the network, an error response, or in general, any "unsuccessful" response.
   *
   * @return \WonderPush\Errors\Net An exception or `null`
   * @see checked()
   */
  public function exception() {
    $statusCode = $this->netResponse()->getStatusCode();
    $body = $this->netResponse()->parsedBody();

    $error = false; // false if no exception, true to return one, or an actual \Exception for chaining
    $errorMessage = null;
    $errorCode = null;

    if ($body instanceof \Exception) { // essentially for handling \WonderPush\Errors\Json

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
   * Throws an exception if the response is an error, or returns `$this`.
   *
   * You can use this function for its sole effect of throwing, typically after calling {@link \WonderPush\RequestBuilders\Base::execute()}.
   *
   * @return $this
   * @throws \WonderPush\Errors\Net
   * @see exception()
   * @see \WonderPush\RequestBuilders\Base::execute()
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
