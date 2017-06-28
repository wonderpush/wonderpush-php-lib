<?php

namespace WonderPush;

class RestTest extends TestCase {

  protected $wp;

  protected function setUp() {
    $this->wp = WonderPushTest::getWonderPush();
  }

  public function testGetFakeEndpoint() {
    $response = $this->wp->getRest()->get('/fake-endpoint');
    $this->assertInstanceOf('\WonderPush\Net\Response', $response);
    $resp = $response->parsedBody();
    $this->assertInternalType('object', $resp);
    $this->assertObjectHasAttribute('error', $resp);
    $this->assertInternalType('object', $resp->error);
    $this->assertObjectHasAttribute('status', $resp->error);
    $this->assertInternalType('integer', $resp->error->status);
    $this->assertEquals(404, $resp->error->status);
    $this->assertObjectHasAttribute('code', $resp->error);
    $this->assertInternalType('string', $resp->error->code);
    $this->assertEquals("10000", $resp->error->code);
    $this->assertObjectHasAttribute('message', $resp->error);
    $this->assertInternalType('string', $resp->error->message);
  }

  public function testGet() {
    $response = $this->wp->getRest()->get('/installations', array('limit' => 0));
    $this->assertInstanceOf('\WonderPush\Net\Response', $response);
    $resp = $response->parsedBody();
    $this->assertInternalType('object', $resp);
    $this->assertObjectHasAttribute('count', $resp);
    $this->assertInternalType('integer', $resp->count);
  }

}
