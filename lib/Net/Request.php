<?php

namespace WonderPush\Net;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * Represents an HTTP request.
 */
class Request extends \WonderPush\Obj\BaseObject {

  /**
   * HTTP GET method.
   */
  const GET    = 'GET';

  /**
   * HTTP POST method.
   */
  const POST   = 'POST';

  /**
   * HTTP PUT method.
   */
  const PUT    = 'PUT';

  /**
   * HTTP DELETE method.
   */
  const DELETE = 'DELETE';

  /**
   * HTTP PATCH method.
   */
  const PATCH  = 'PATCH';

  /**
   * HTTP method.
   * @var string One of the constants of this class.
   */
  private $method;

  /**
   * Scheme, host, port and potential path prefix of the request.
   *
   * Should not end with a slash.
   *
   * @var string
   */
  private $root;

  /**
   * HTTP path.
   *
   * Should start with a slash.
   *
   * @var string
   */
  private $path;

  /**
   * Query string parameters.
   *
   * These parameters will not be promoted to body parameters.
   *
   * @var mixed[]
   */
  private $qsParams;

  /**
   * Body parameters.
   *
   * These parameters may be promoted to query string parameters, depending on the HTTP method used.
   *
   * @var mixed[]
   */
  private $params;

  /**
   * An associative array of 'paramName' => ['tmp_name' => '/full/path','name' => 'filename.png', 'type' => 'image/png'].
   * @var mixed
   */
  private $files = array();

  /**
   * HTTP headers.
   * @var mixed[]
   */
  private $headers;

  /**
   * The HTTP method.
   * @return string One of the constants of this class.
   */
  public function getMethod() {
    return $this->method;
  }

  /**
   * Set the HTTP method.
   * @param string $method One of the constants of this class.
   * @return self
   */
  public function setMethod($method) {
    $this->method = $method;
    return $this;
  }

  /**
   * The scheme, host, port and potential path prefix of the request.
   *
   * Should not end with a slash.
   *
   * @return string
   */
  public function getRoot() {
    return $this->root;
  }

  /**
   * Set the scheme, host, port and potential path prefix of the request.
   *
   * Should not end with a slash.
   *
   * @param string $root
   * @return $this
   */
  public function setRoot($root) {
    $this->root = $root;
    return $this;
  }

  /**
   * The HTTP path.
   *
   * Should start with a slash.
   *
   * @return string
   */
  public function getPath() {
    return $this->path;
  }

  /**
   * Set the HTTP path.
   *
   * Should start with a slash.
   *
   * @param string $path
   * @return $this
   */
  public function setPath($path) {
    $this->path = $path;
    return $this;
  }

  /**
   * The query string parameters.
   *
   * These parameters will not be promoted to body parameters.
   *
   * @return mixed[]
   */
  public function getQsParams() {
    return $this->qsParams;
  }

  /**
   * Set the query string parameters.
   *
   * These parameters will not be promoted to body parameters.
   *
   * @param mixed[] $qsParams
   * @return $this
   */
  public function setQsParams($qsParams) {
    $this->qsParams = $qsParams;
    return $this;
  }

  /**
   * @param $key
   * @param $value
   * @return $this
   */
  public function setQsParam($key, $value) {
    if ($key === null) return $this;
    if (!$this->qsParams) {
      $this->qsParams = array();
    }
    if ($value === null) {
      unset($this->qsParams[$key]);
    } else {
      $this->qsParams[$key] = $value;
    }
    return $this;
  }

  public function addFile($paramName, $filename, $path, $type) {
    $this->files[$paramName] = array(
      'name' => $filename,
      'tmp_name' => $path,
      'type' => $type,
    );
    return $this;
  }

  public function removeFile($paramName) {
    unset($this->files[$paramName]);
    return $this;
  }

  public function getFiles() {
    return $this->files;
  }

  /**
   * The body parameters.
   *
   * These parameters may be promoted to query string parameters, depending on the HTTP method used.
   *
   * @return mixed[]
   */
  public function getParams() {
    return $this->params;
  }

  /**
   * Set the body parameters.
   *
   * These parameters may be promoted to query string parameters, depending on the HTTP method used.
   *
   * @param mixed[] $params
   * @return $this
   */
  public function setParams($params) {
    $this->params = $params;
    return $this;
  }

  /**
   * The HTTP headers.
   * @return mixed[]
   */
  public function getHeaders() {
    return $this->headers;
  }

  /**
   * Set the HTTP headers.
   * @param mixed[] $headers
   * @return $this
   */
  public function setHeaders($headers) {
    $this->headers = $headers;
    return $this;
  }

  /**
   * @param $key
   * @param $value
   * @return $this
   */
  public function setHeader($key, $value) {
    if ($key === null) return $this;
    if (!$this->headers) {
      $this->headers = array();
    }
    if ($value === null) {
      unset($this->headers[$key]);
    } else {
      $this->headers[$key] = $value;
    }
    return $this;
  }
}
