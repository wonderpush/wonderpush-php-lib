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

  /**
   * Construct the corresponding request, without executing it.
   * @return \WonderPush\Net\Request
   */
  public abstract function request();

  /**
   * Return the class name of the corresponding \WonderPush\ResponseParsers\Base implementation.
   *
   * Defaults to the class name from the \WonderPush\RequestBuilders namespace,
   * transposed to the \WonderPush\ResponseParsers namespace.
   *
   * @return string
   */
  protected function responseParserClass() {
    $class = str_replace('WonderPush\RequestBuilders', 'WonderPush\ResponseParsers', get_class($this));
    if (class_exists($class)) {
      return $class;
    } else {
      return 'WonderPush\ResponseParsers\Base';
    }
  }

  /**
   * Executes the corresponding request and returns the parsed response.
   * @return \WonderPush\ResponseParsers\Base
   * @see \WonderPush\ResponseParsers\Base::checked()
   */
  public function execute() {
    $request = $this->request();
    $response = $this->wp->rest()->execute($request);
    $class = $this->responseParserClass();
    return new $class($this->wp, $this, $request, $response);
  }

}
