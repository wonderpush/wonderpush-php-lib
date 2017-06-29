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
    return $this;
  }

  private function parseBody() {
    if ($this->isParsed) return;
    $this->parsedBody = json_decode($this->rawBody);
  }

  public function parsedBody() {
    $this->parseBody();
    return $this->parsedBody;
  }

}
