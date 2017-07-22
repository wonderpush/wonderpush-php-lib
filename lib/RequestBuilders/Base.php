<?php

namespace WonderPush\RequestBuilders;

/**
 * Base class for request builders.
 */
abstract class Base {

  /**
   * Instance of the library whose credentials are to be used.
   * @var \WonderPush\WonderPush
   */
  protected $wp;

  public function __construct(\WonderPush\WonderPush $wp) {
    $this->wp = $wp;
  }

  public abstract function request();

  protected function responseParserClass() {
    $class = str_replace('WonderPush\RequestBuilders', 'WonderPush\ResponseParsers', get_class($this));
    if (class_exists($class)) {
      return $class;
    } else {
      return 'WonderPush\ResponseParsers\Base';
    }
  }

  /**
   * @return \WonderPush\ResponseParsers\Base
   */
  public function execute() {
    $request = $this->request();
    $response = $this->wp->rest()->execute($request);
    $class = $this->responseParserClass();
    return new $class($this->wp, $this, $request, $response);
  }

}
