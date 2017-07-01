<?php

namespace WonderPush\DAO;

class DeliveriesTest extends \WonderPush\TestCase {

  /** @var \WonderPush\WonderPush */
  protected $wp;
  /** @var \WonderPush\DAO\Deliveries */
  protected $dao;

  protected function setUp() {
    $this->wp = \WonderPush\WonderPushTest::getWonderPush();
    $this->dao = $this->wp->deliveries();
  }

  public function testSendNotification() {
    $response = $this->dao->preparePostDeliveries()
        ->setTargetSegmentIds('@NOBODY')
        ->setNotification(\WonderPush\Notification::_new()
            ->setAlert(\WonderPush\NotificationAlert::_new()
                ->setText('Test PHP lib')
            ))
        ->execute();
    $this->assertGreaterThanOrEqual(200, $response->getStatusCode());
    $this->assertLessThan(300, $response->getStatusCode());
    $this->assertAttributeEquals(true, 'success', $response->parsedBody());
  }

}
