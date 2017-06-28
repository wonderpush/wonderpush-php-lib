<?php

namespace WonderPush;

/**
 * WonderPush main class
 */
class WonderPush implements \Psr\Log\LoggerAwareInterface {

  const API_BASE = 'https://api.wonderpush.com';
  const API_VERSION = 'v1';
  const VERSION = '0.1.0';

  private $accessToken;
  private $applicationId;

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

  public function __construct($accessToken, $applicationId) {
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

}

WonderPush::setGlobalLogger(new Util\DefaultLogger());
