<?php

namespace WonderPush\Net;

/**
 * Represents an HTTP response, with JSON parsing facility.
 */
class Response extends \WonderPush\Object {

  /**
   * HTTP Status code.
   * @var integer
   */
  private $statusCode;

  /**
   * HTTP headers.
   * @var string[]
   */
  private $headers;

  /**
   * Raw HTTP body.
   * @var string
   */
  private $rawBody;

  /**
   * Whether parsing has already taken place.
   * @var boolean
   */
  private $isParsed;

  /**
   * JSON parsed body, or {@code null} on parsing errors.
   * Uses objects instead of associative arrays to preserve {}/[] distinctions.
   * @var object|null
   */
  private $parsedBody;

  /**
   * The output of json_last_error();
   * @var int
   */
  private $parseError;

  /**
   * The output of json_last_error_msg();
   * @var int
   */
  private $parseErrorMsg;

  public function getStatusCode() {
    return $this->statusCode;
  }

  public function setStatusCode($statusCode) {
    $this->statusCode = $statusCode;
    return $this;
  }

  public function getHeaders() {
    return $this->headers;
  }

  public function setHeaders($headers) {
    $this->headers = $headers;
    return $this;
  }

  public function getRawBody() {
    return $this->rawBody;
  }

  public function setRawBody($rawBody) {
    $this->rawBody = $rawBody;

    // Reset parsing info
    $this->isParsed = null;
    $this->parsedBody = null;
    $this->parseError = null;
    $this->parseErrorMsg = null;

    return $this;
  }

  private function parseBody() {
    if ($this->isParsed) return;
    $this->parsedBody = json_decode($this->rawBody);
    $this->parseError = json_last_error();
    $this->parseErrorMsg = json_last_error_msg();
    if ($this->parseError !== JSON_ERROR_NONE) {
      $this->parsedBody = new \WonderPush\Errors\Json($this->parseErrorMsg, $this->parseError);
    }
    $this->isParsed = true;
  }

  /**
   * @return int One of json_last_error() returned constants. JSON_ERROR_NONE if there were no error.
   */
  public function parseError() {
    $this->parseBody();
    return $this->parseError;
  }

  /**
   * @return string The output of json_last_error_msg().
   */
  public function parseErrorMsg() {
    $this->parseBody();
    return $this->parseErrorMsg;
  }

  /**
   * The parsed body, or a JsonError.
   * @return mixed|\WonderPush\Errors\Json
   */
  public function parsedBody() {
    $this->parseBody();
    return $this->parsedBody;
  }

}
