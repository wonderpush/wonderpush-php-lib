<?php

namespace WonderPush\Api;

class DeliveriesTest extends \WonderPush\TestCase {

  /** @var \WonderPush\WonderPush */
  protected $wp;
  /** @var \WonderPush\Api\Deliveries */
  protected $api;

  protected function setUp() {
    $this->wp = \WonderPush\WonderPushTest::getWonderPush();
    $this->api = $this->wp->deliveries();
  }

  public function testSendNotification() {
    $response = $this->api->preparePostDeliveries()
        ->setTargetSegmentIds('@NOBODY')
        ->setNotification(\WonderPush\Obj\Notification::_new()
            ->setAlert(\WonderPush\Obj\NotificationAlert::_new()
                ->setText('Test PHP lib')
            ))
        ->execute();
    $this->assertGreaterThanOrEqual(200, $response->netResponse()->getStatusCode());
    $this->assertLessThan(300, $response->netResponse()->getStatusCode());
    $this->assertAttributeEquals(true, 'success', $response->netResponse()->parsedBody());
    $this->assertTrue($response->getSuccess());
    $this->assertNull($response->exception());
    $this->assertSame($response, $response->checked());
    $this->assertSame(\WonderPush\Obj\NullObject::getInstance(), $response->getCampaignId());
    $this->assertNotNull($response->getNotificationId());
  }

  public function testSendNotificationNoParameter() {
    $response = $this->api->preparePostDeliveries()
        ->execute();
    $this->assertEquals(400, $response->netResponse()->getStatusCode());
    $this->assertInstanceOf('\WonderPush\Errors\Net', $response->exception());
    $exception = null;
    try {
      $response->checked();
      $this->fail();
    } catch (\Exception $ex) {
      $exception = $ex;
    }
    $this->assertInstanceOf('\WonderPush\Errors\Net', $exception);
    /* @var $exception \WonderPush\Errors\Net */
    $this->assertEquals('10002', $exception->getCodeStr());
    $this->assertEquals(10002, $exception->getCode());
    $this->assertInternalType('string', $exception->getMessage());
    $this->assertNotEmpty($exception->getMessage());
    $this->assertNull($response->getSuccess());
    $this->assertNull($response->getCampaignId());
    $this->assertNull($response->getNotificationId());
  }

}
