<?php

namespace WonderPush\Net;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * Represents an HTTP response, with JSON parsing facility.
 */
class Response extends \WonderPush\Obj\BaseObject {

  /**
   * The request
   * @var Request
   */
  private $request;
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
   * JSON parsed body, or `null` on parsing errors.
   *
   * Uses objects instead of associative arrays to preserve `{}`/`[]` distinctions.
   *
   * @var object|null
   */
  private $parsedBody;

  /**
   * @var \WonderPush\Errors\Base
   */
  private $parseError;

  /**
   * @return Request
   */
  public function getRequest() {
    return $this->request;
  }

  /**
   * @param Request $request
   * @return Response
   */
  public function setRequest($request) {
    $this->request = $request;
    return $this;
  }

  /**
   * The HTTP Status code.
   * @return integer
   */
  public function getStatusCode() {
    return $this->statusCode;
  }

  /**
   * Set the HTTP Status code.
   * @param integer $statusCode
   * @return $this
   */
  public function setStatusCode($statusCode) {
    $this->statusCode = $statusCode;
    return $this;
  }

  /**
   * The HTTP headers.
   * @return string[]
   */
  public function getHeaders() {
    return $this->headers;
  }

  /**
   * Set the HTTP headers.
   * @param string[] $headers
   * @return $this
   */
  public function setHeaders($headers) {
    $this->headers = $headers;
    return $this;
  }

  /**
   * The raw HTTP body.
   * @return string
   */
  public function getRawBody() {
    return $this->rawBody;
  }

  /**
   * Set the raw HTTP body.
   * @param string $rawBody
   * @return $this
   */
  public function setRawBody($rawBody) {
    $this->rawBody = $rawBody;

    // Reset parsing info
    $this->isParsed = null;
    $this->parsedBody = null;
    $this->parseError = null;

    return $this;
  }

  /**
   * Parses the raw HTML body into JSON, and notes any parsing error.
   */
  private function parseBody() {
    if ($this->isParsed) {
      return;
    }

    // false body means no answer from server
    if ($this->rawBody === false) {
      $this->parsedBody = null;
      $this->parseError = new \WonderPush\Errors\Network($this->request, $this);
      $this->isParsed = true;
      return;
    }

    // Try json_decode
    $this->parsedBody = json_decode($this->rawBody, false);

    // Manage json parsing errors
    $jsonParseError = json_last_error();
    if (function_exists('json_last_error_msg')) {
      // @codingStandardsIgnoreLine
      $jsonParseErrorMsg = json_last_error_msg();
    } else {
      switch ($this->parseError) {
        case JSON_ERROR_NONE:
          // https://github.com/php/php-src/blob/6053987bc27e8dede37f437193a5cad448f99bce/ext/json/tests/007.phpt
          $jsonParseErrorMsg = 'No error';
          break;
        case JSON_ERROR_DEPTH:
          // https://github.com/php/php-src/blob/6053987bc27e8dede37f437193a5cad448f99bce/ext/json/tests/007.phpt
          $jsonParseErrorMsg = 'Maximum stack depth exceeded';
          break;
        case JSON_ERROR_STATE_MISMATCH:
          // https://github.com/php/php-src/blob/6053987bc27e8dede37f437193a5cad448f99bce/ext/json/tests/007.phpt
          $jsonParseErrorMsg = 'State mismatch (invalid or malformed JSON)';
          break;
        case JSON_ERROR_CTRL_CHAR:
          // https://github.com/php/php-src/blob/6053987bc27e8dede37f437193a5cad448f99bce/ext/json/tests/007.phpt
          $jsonParseErrorMsg = 'Control character error, possibly incorrectly encoded';
          break;
        case JSON_ERROR_SYNTAX:
          // https://github.com/php/php-src/blob/6053987bc27e8dede37f437193a5cad448f99bce/ext/json/tests/007.phpt
          $jsonParseErrorMsg = 'Syntax error';
          break;
        // @codingStandardsIgnoreLine
        case JSON_ERROR_UTF8:
          // https://github.com/php/php-src/blob/6053987bc27e8dede37f437193a5cad448f99bce/ext/json/tests/bug54058.phpt
          $jsonParseErrorMsg = 'Malformed UTF-8 characters, possibly incorrectly encoded';
          break;
        default:
          // On PHP 5.5.0 there were other codes, but fortunately, the json_last_error_msg() function exists
          // so we won't end up here.
          $jsonParseErrorMsg = 'Unknown error';
          break;
      }
    }
    if ($jsonParseError !== JSON_ERROR_NONE) {
      $this->parseError = new \WonderPush\Errors\Parsing($jsonParseError, $jsonParseErrorMsg . ' body:' . ($this->rawBody ?: '') . ' status:' . $this->statusCode . ' headers:' . ($this->headers ? json_encode($this->headers) : ''));
    }
    $this->isParsed = true;
  }

  /**
   * The error code encountered while parsing the body, if any.
   * @return \WonderPush\Errors\Base
   */
  public function parseError() {
    $this->parseBody();
    return $this->parseError;
  }

  /**
   * The parsed body, or a {@link \WonderPush\Errors\Parsing}.
   * @return mixed
   */
  public function parsedBody() {
    $this->parseBody();
    return $this->parsedBody;
  }

  /**
   * Returns an exception when there was an error making the call, or if the server returned an error response.
   * @return null|\WonderPush\Errors\Base
   */
  public function exception() {
    $this->parseBody();

    if ($this->parseError) {
      return $this->parseError;
    }

    $statusCode = $this->getStatusCode();
    $body = $this->parsedBody();

    $error = false; // false if no exception, true to return one, or an actual \Exception for chaining
    $errorMessage = null;
    $errorCode = null;

    if (isset($body->error) && is_object($body->error)) {

      $error = true;
      if (isset($body->error->message)) {
        $errorMessage = $body->error->message;
      }
      if (isset($body->error->code   )) {
        $errorCode    = $body->error->code;
      }
      //if (isset($body->error->status )) {
      //  $statusCode   = $body->error->status;
      //}

    }

    if ($statusCode < 200 || $statusCode >= 300) {
      $error = true;
      if ($errorMessage === null) {
        $errorMessage = 'Non 2xx status code';
      }
    }

    if ($error !== false) {
      if ($error instanceof \Exception) {
        return new \WonderPush\Errors\Server($this->request, $this, $errorMessage, $errorCode, $error);
      }
      return new \WonderPush\Errors\Server($this->request, $this, $errorMessage, $errorCode);
    }
    return null;
  }

  /**
   * Returns the result instantiated with provided $cls or throws when request had error.
   * @param $cls
   * @return mixed
   * @throws \WonderPush\Errors\Base
   */
  public function checkedResult($cls, $key = null) {
    $exception = $this->exception();
    if ($exception) {
      throw $exception;
    }
    $this->parseBody();
    $body = $this->parsedBody();
    return new $cls($key ? $body->{$key} : $body);
  }

}
