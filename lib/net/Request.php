<?php

namespace WonderPush\Net;

/**
 * Represents an HTTP request.
 */
class Request extends \WonderPush\Object {

  const GET    = 'GET';
  const POST   = 'POST';
  const PUT    = 'PUT';
  const DELETE = 'DELETE';
  const PATCH  = 'PATCH';

  private $method;
  private $root;
  private $path;
  private $qsParams;
  private $params;
  private $headers;

  public function getMethod() {
    return $this->method;
  }

  public function setMethod($method) {
    $this->method = $method;
    return $this;
  }

  public function getRoot() {
    return $this->root;
  }

  public function setRoot($root) {
    $this->root = $root;
    return $this;
  }

  public function getPath() {
    return $this->path;
  }

  public function setPath($path) {
    $this->path = $path;
    return $this;
  }

  public function getQsParams() {
    return $this->qsParams;
  }

  public function setQsParams($qsParams) {
    $this->qsParams = $qsParams;
    return $this;
  }

  public function getParams() {
    return $this->params;
  }

  public function setParams($params) {
    $this->params = $params;
    return $this;
  }

  public function getHeaders() {
    return $this->headers;
  }

  public function setHeaders($headers) {
    $this->headers = $headers;
    return $this;
  }

}
