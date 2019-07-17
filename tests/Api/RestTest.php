<?php

namespace WonderPush\Api;

class RestTest extends \WonderPush\TestCase {

  /** @var \WonderPush\WonderPush */
  protected $wp;

  protected function setUp() {
    $this->wp = \WonderPush\WonderPushTest::getWonderPush();
  }

  public function testGetFakeEndpoint() {
    $response = $this->wp->rest()->get('/fake-endpoint');
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
    $this->assertEquals('10000', $resp->error->code);
    $this->assertObjectHasAttribute('message', $resp->error);
    $this->assertInternalType('string', $resp->error->message);
  }

  public function testGet() {
    $response = $this->wp->rest()->get('/installations', array('limit' => 0));
    $this->assertInstanceOf('\WonderPush\Net\Response', $response);
    $resp = $response->parsedBody();
    $this->assertInternalType('object', $resp);
    $this->assertObjectHasAttribute('count', $resp);
    $this->assertInternalType('integer', $resp->count);
  }

  public function testSendNotification() {
    $response = $this->wp->rest()->post('/deliveries', array(
        'targetSegmentIds' => array('@NOBODY'),
        'notification' => \WonderPush\Obj\Notification::_new()
            ->setAlert(\WonderPush\Obj\NotificationAlert::_new()
                ->setText('Test PHP lib')
            )
        ,
    ));
    $this->assertGreaterThanOrEqual(200, $response->getStatusCode());
    $this->assertLessThan(300, $response->getStatusCode());
    $this->assertAttributeEquals(true, 'success', $response->parsedBody());
  }

}
