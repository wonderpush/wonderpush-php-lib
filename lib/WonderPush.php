<?php

namespace WonderPush;

/**
 * **WonderPush library entry class.**
 */
class WonderPush implements \Psr\Log\LoggerAwareInterface {

  const API_BASE = 'https://api.wonderpush.com'; // DO NOT END WITH SLASH
  const API_VERSION = 'v1'; // "vX", NO SLASH
  const API_PREFIX = '/management'; // DO NOT END WITH SLASH

  const VERSION = '0.1.0';

  private $accessToken;
  private $applicationId;
  private $apiBase;

  /**
   * The logger to which the library will produce messages.
   * @var \Psr\Log\LoggerInterface
   */
  private static $globalLogger;

  /**
   * The logger to which the library will produce messages.
   * @var \Psr\Log\LoggerInterface
   */
  private $logger;

  /**
   * The HttpClient implementation to use.
   * @var Net\HttpClientInterface
   */
  private $httpClient;

  /**
   * Lazily initialized Rest API.
   * @var Api\Rest
   */
  private $rest;

  /**
   * Lazily initialized Deliveries endpoints.
   * @var Api\Deliveries
   */
  private $deliveries;

  public function __construct($accessToken, $applicationId = null) {
    $this->accessToken = $accessToken;
    $this->applicationId = $applicationId;
  }

  function getAccessToken() {
    return $this->accessToken;
  }

  function getApplicationId() {
    return $this->applicationId;
  }

  /**
   * The logger to which the library will produce messages, when used outside the scope of a WonderPush instance.
   * @return \Psr\Log\LoggerInterface
   */
  public static function getGlobalLogger() {
    return self::$globalLogger;
  }

  /**
   * @param \Psr\Log\LoggerInterface $logger
   *   The logger to which the library will produce messages, when used outside the scope of a WonderPush instance.
   */
  public static function setGlobalLogger(\Psr\Log\LoggerInterface $logger) {
    self::$globalLogger = $logger;
  }

  /**
   * The logger to which the library will produce messages.
   * @return \Psr\Log\LoggerInterface
   */
  public function getLogger() {
    return $this->logger ?: self::getGlobalLogger();
  }

  /**
   * @param \Psr\Log\LoggerInterface $logger
   *   The logger to which the library will produce messages.
   */
  public function setLogger(\Psr\Log\LoggerInterface $logger) {
    $this->logger = $logger;
  }

  public function getHttpClient() {
    if ($this->httpClient === null) {
      $this->httpClient = new Net\CurlHttpClient($this);
    }
    return $this->httpClient;
  }

  public function setHttpClient(Net\HttpClientInterface $httpClient) {
    $this->httpClient = $httpClient;
  }

  public function getApiBase() {
    return $this->apiBase ?: self::API_BASE;
  }

  public function setApiBase($apiBase) {
    $this->apiBase = $apiBase;
  }

  public function getApiRoot() {
    return $this->getApiBase() . '/' . self::API_VERSION . self::API_PREFIX;
  }

  /**
   * Rest API instance.
   * @return Api\Rest
   */
  public function rest() {
    if ($this->rest === null) {
      $this->rest = new Api\Rest($this);
    }
    return $this->rest;
  }

  /**
   * Deliveries endpoints.
   * @return Api\Deliveries
   */
  public function deliveries() {
    if ($this->deliveries === null) {
      $this->deliveries = new Api\Deliveries($this);
    }
    return $this->deliveries;
  }

}

WonderPush::setGlobalLogger(new Util\DefaultLogger());
