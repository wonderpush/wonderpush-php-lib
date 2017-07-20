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
    if (function_exists('json_last_error_msg')) {
      $this->parseErrorMsg = json_last_error_msg();
    } else {
      switch ($this->parseError) {
        case JSON_ERROR_NONE:
          // https://github.com/php/php-src/blob/6053987bc27e8dede37f437193a5cad448f99bce/ext/json/tests/007.phpt
          $this->parseErrorMsg = 'No error';
          break;
        case JSON_ERROR_DEPTH:
          // https://github.com/php/php-src/blob/6053987bc27e8dede37f437193a5cad448f99bce/ext/json/tests/007.phpt
          $this->parseErrorMsg = 'Maximum stack depth exceeded';
          break;
        case JSON_ERROR_STATE_MISMATCH:
          // https://github.com/php/php-src/blob/6053987bc27e8dede37f437193a5cad448f99bce/ext/json/tests/007.phpt
          $this->parseErrorMsg = 'State mismatch (invalid or malformed JSON)';
          break;
        case JSON_ERROR_CTRL_CHAR:
          // https://github.com/php/php-src/blob/6053987bc27e8dede37f437193a5cad448f99bce/ext/json/tests/007.phpt
          $this->parseErrorMsg = 'Control character error, possibly incorrectly encoded';
          break;
        case JSON_ERROR_SYNTAX:
          // https://github.com/php/php-src/blob/6053987bc27e8dede37f437193a5cad448f99bce/ext/json/tests/007.phpt
          $this->parseErrorMsg = 'Syntax error';
          break;
        case JSON_ERROR_UTF8:
          // https://github.com/php/php-src/blob/6053987bc27e8dede37f437193a5cad448f99bce/ext/json/tests/bug54058.phpt
          $this->parseErrorMsg = 'Malformed UTF-8 characters, possibly incorrectly encoded';
          break;
        default:
          // On PHP 5.5.0 there were other codes, but fortunately, the json_last_error_msg() function exists
          // so we won't end up here.
          $this->parseErrorMsg = 'Unknown error';
          break;
      }
    }
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
