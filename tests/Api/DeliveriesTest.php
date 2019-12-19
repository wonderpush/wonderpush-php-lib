<?php

namespace WonderPush\Api;

class DeliveriesTest extends \WonderPush\TestCase {

  /** @var \WonderPush\WonderPush */
  protected $wp;
  /** @var Deliveries */
  protected $api;

  protected function setUp() {
    $this->wp = \WonderPush\WonderPushTest::getWonderPush();
    $this->api = $this->wp->deliveries();
  }

  public function testSendNotification() {
    /** @noinspection PhpUnhandledExceptionInspection */
    $response = $this->api->create(
      \WonderPush\Params\DeliveriesCreateParams::_new()
        ->setTargetSegmentIds('@NOBODY')
        ->setNotification(\WonderPush\Obj\Notification::_new()
          ->setAlert(\WonderPush\Obj\NotificationAlert::_new()
            ->setText('Test PHP lib')
          ))
    );
    $this->assertTrue($response->isSuccess());
    $this->assertSame(\WonderPush\Obj\NullObject::getInstance(), $response->getCampaignId());
    $this->assertNotNull($response->getNotificationId());
  }

  public function testSendNotificationArrayParameters() {
    /** @noinspection PhpUnhandledExceptionInspection */
    $response = $this->api->create(
      \WonderPush\Params\DeliveriesCreateParams::_new()
        ->setTargetSegmentIds('@NOBODY')
        ->setNotification(array(
          'alert' => array(
            'text' => 'Test PHP lib',
          )))
    );
    $this->assertTrue($response->isSuccess());
    $this->assertSame(\WonderPush\Obj\NullObject::getInstance(), $response->getCampaignId());
    $this->assertNotNull($response->getNotificationId());
  }

  public function testSendNotificationNoParameter() {
    $exception = null;
    try {
      $this->api->create(array());
    } catch (\Exception $ex) {
      $exception = $ex;
    }
    $this->assertInstanceOf('\WonderPush\Errors\Server', $exception);
    /* @var $exception \WonderPush\Errors\Server */
    $this->assertInstanceOf('\WonderPush\Net\Request', $exception->getRequest());
    $this->assertInstanceOf('\WonderPush\Net\Response', $exception->getResponse());
    $this->assertEquals('10002', $exception->getCodeStr());
    $this->assertEquals(10002, $exception->getCode());
    $this->assertInternalType('string', $exception->getMessage());
    $this->assertNotEmpty($exception->getMessage());
  }

}
