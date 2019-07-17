<?php

namespace WonderPush\Util;

class TimeUnitTest extends \WonderPush\TestCase {

  public function testGetUnits() {
    TimeUnit::getUnits();
  }

  public function testGetUnitLabels() {
    $this->assertArrayHasKey(TimeUnit::SECONDS, TimeUnit::getUnitLabels());
    $this->assertGreaterThan(0, count(TimeUnit::getUnitLabels(TimeUnit::SECONDS)));
    $this->assertContainsOnly('string', TimeUnit::getUnitLabels(TimeUnit::SECONDS));
  }

  public function testGetLabelsToUnits() {
    $this->assertArrayHasKey('seconds', TimeUnit::getLabelsToUnits());
  }

  public function testLabelToUnit() {
    $this->assertEquals(TimeUnit::SECONDS, TimeUnit::labelToUnit('seconds'));
  }

  public function testConvert() {
    $this->assertEquals(1, TimeUnit::convert(1, TimeUnit::SECONDS, TimeUnit::SECONDS));

    $this->assertEquals(12, TimeUnit::convert(12 * 60 * 60, TimeUnit::SECONDS, TimeUnit::HOURS));
    $this->assertEquals(12, TimeUnit::convert(12 * 60 * 60 * 1000, TimeUnit::MILLISECONDS, TimeUnit::HOURS));

    $this->assertEquals(12 * 60 * 60, TimeUnit::convert(12, TimeUnit::HOURS, TimeUnit::SECONDS));
    $this->assertEquals(12 * 60 * 60 * 1000, TimeUnit::convert(12, TimeUnit::HOURS, TimeUnit::MILLISECONDS));

    $this->assertEquals(3140, TimeUnit::convert(3.14, TimeUnit::MICROSECONDS, TimeUnit::NANOSECONDS));
    $this->assertEquals(3.14, TimeUnit::convert(3140, TimeUnit::NANOSECONDS, TimeUnit::MICROSECONDS));

    $this->assertEquals(1, TimeUnit::convert(7, TimeUnit::DAYS, TimeUnit::WEEKS));
    $this->assertEquals(7, TimeUnit::convert(1, TimeUnit::WEEKS, TimeUnit::DAYS));
  }

}
