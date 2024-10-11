<?php

namespace WonderPush\Api;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * Permits placing arbitrary calls against the WonderPush Management API.
 *
 * You should probably use helper classes and methods instead of using this directly.
 */
class Rest {

  /**
   * Instance of the library whose credentials are to be used.
   * @var \WonderPush\WonderPush
   */
  private $wp;

  public function __construct(\WonderPush\WonderPush $wp) {
    $this->wp = $wp;
  }

  /**
   * Constructs a request.
   * @param string $method
   * @param string $path
   * @param array $params
   * @return \WonderPush\Net\Request
   */
  public function request($method, $path, $params = array()) {
    $rtn = new \WonderPush\Net\Request();
    $rtn->setMethod($method);
    $rtn->setRoot($this->wp->getApiRoot());
    if (!\WonderPush\Util\StringUtil::beginsWith($path, '/')) {
      $path = '/' . $path;
    }
    $rtn->setPath($path);
    $rtn->setParams($params);
    $rtn->setQsParam('applicationId', $this->wp->getApplicationId()); // filtered if null
    if ($this->wp->getCredentials()) {
      $this->wp->getCredentials()->authenticate($rtn);
    }
    return $rtn;
  }

  /**
   * Performs a GET call.
   * @param string $path
   * @param array $params
   * @return \WonderPush\Net\Response
   */
  public function get($path, $params = array()) {
    return $this->execute($this->requestForGet($path, $params));
  }

  /**
   * Constructs a GET request.
   * @param string $path
   * @param array $params
   * @return \WonderPush\Net\Request
   */
  public function requestForGet($path, $params = array()) {
    return $this->request(\WonderPush\Net\Request::GET, $path, $params);
  }

  /**
   * Performs a POST call.
   * @param string $path
   * @param array $params
   * @return \WonderPush\Net\Response
   */
  public function post($path, $params = array()) {
    return $this->execute($this->requestForPost($path, $params));
  }

  /**
   * Constructs a POST request.
   * @param string $path
   * @param array $params
   * @return \WonderPush\Net\Request
   */
  public function requestForPost($path, $params = array()) {
    return $this->request(\WonderPush\Net\Request::POST, $path, $params);
  }

  /**
   * Performs a PUT call.
   * @param string $path
   * @param array $params
   * @return \WonderPush\Net\Response
   */
  public function put($path, $params = array()) {
    return $this->execute($this->requestForPut($path, $params));
  }

  /**
   * Constructs a PUT request.
   * @param string $path
   * @param array $params
   * @return \WonderPush\Net\Request
   */
  public function requestForPut($path, $params = array()) {
    return $this->request(\WonderPush\Net\Request::PUT, $path, $params);
  }

  /**
   * Performs a PATCH call.
   * @param string $path
   * @param array $params
   * @return \WonderPush\Net\Response
   */
  public function patch($path, $params = array()) {
    return $this->execute($this->requestForPatch($path, $params));
  }

  /**
   * Constructs a PATCH request.
   * @param string $path
   * @param array $params
   * @return \WonderPush\Net\Request
   */
  public function requestForPatch($path, $params = array()) {
    return $this->request(\WonderPush\Net\Request::PATCH, $path, $params);
  }

  /**
   * Performs a DELETE call.
   * @param string $path
   * @param array $params
   * @return \WonderPush\Net\Response
   */
  public function delete($path, $params = array()) {
    return $this->execute($this->requestForDelete($path, $params));
  }

  /**
   * Constructs a DELETE request.
   * @param string $path
   * @param array $params
   * @return \WonderPush\Net\Request
   */
  public function requestForDelete($path, $params = array()) {
    return $this->request(\WonderPush\Net\Request::DELETE, $path, $params);
  }

  /**
   * Executes a request and returns its response.
   * @param \WonderPush\Net\Request $request
   * @return \WonderPush\Net\Response
   */
  public function execute(\WonderPush\Net\Request $request) {
    return $this->wp->getHttpClient()->execute($request);
  }

}
