<?php

namespace WonderPush;

class WonderPushTest extends TestCase {

  public function testInstantiation() {
    $sdk = new WonderPush();
    $this->assertInstanceOf('WonderPush\WonderPush', $sdk);
  }

}
