<?php

namespace WonderPush\RequestBuilders;

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

  public function execute() {
    return $this->wp->rest()->execute($this->request());
  }

}
