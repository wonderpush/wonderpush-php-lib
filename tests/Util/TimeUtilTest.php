<?php

namespace WonderPush\Util;

class TimeUtilTest extends \WonderPush\TestCase {

  public function testParseISO8601DateOptionalTime() {
    $this->assertNull(TimeUtil::parseISO8601DateOptionalTime(null));
    $this->assertNull(TimeUtil::parseISO8601DateOptionalTime(''));
    $this->assertNull(TimeUtil::parseISO8601DateOptionalTime('BAD VALUE'));

    $dt = TimeUtil::parseISO8601DateOptionalTime('1970');
    $this->assertEquals(0, $dt->getTimestamp());
    $dt = TimeUtil::parseISO8601DateOptionalTime('1970-01');
    $this->assertEquals(0, $dt->getTimestamp());
    $dt = TimeUtil::parseISO8601DateOptionalTime('1970-01-01');
    $this->assertEquals(0, $dt->getTimestamp());
    $dt = TimeUtil::parseISO8601DateOptionalTime('1970-01-01T00');
    $this->assertEquals(0, $dt->getTimestamp());
    $dt = TimeUtil::parseISO8601DateOptionalTime('1970-01-01T00:00');
    $this->assertEquals(0, $dt->getTimestamp());
    $dt = TimeUtil::parseISO8601DateOptionalTime('1970-01-01T00:00:00');
    $this->assertEquals(0, $dt->getTimestamp());
    $dt = TimeUtil::parseISO8601DateOptionalTime('1970-01-01T00:00:00.000');
    $this->assertEquals(0, $dt->getTimestamp());
    $dt = TimeUtil::parseISO8601DateOptionalTime('1970-01-01T00:00:00.000Z');
    $this->assertEquals(0, $dt->getTimestamp());
    $dt = TimeUtil::parseISO8601DateOptionalTime('1970-01-01T00:00:00.000+00');
    $this->assertEquals(0, $dt->getTimestamp());
    $dt = TimeUtil::parseISO8601DateOptionalTime('1970-01-01T00:00:00.000+00:00');
    $this->assertEquals(0, $dt->getTimestamp());
    $dt = TimeUtil::parseISO8601DateOptionalTime('1970-01-01T00:00:00.000+00:00:00');
    $this->assertEquals(0, $dt->getTimestamp());
    $dt = TimeUtil::parseISO8601DateOptionalTime('1970-01-01T00:00:00.000+00:00:00.000');
    $this->assertEquals(0, $dt->getTimestamp());
    $dt = TimeUtil::parseISO8601DateOptionalTime('1970-01-01T00:00:00.000+00:00:00.000Z');
    $this->assertNull($dt);

    $dt = TimeUtil::parseISO8601DateOptionalTime('1971');
    $this->assertEquals(365*24*60*60, $dt->getTimestamp());
    $dt = TimeUtil::parseISO8601DateOptionalTime('1970-02');
    $this->assertEquals(31*24*60*60, $dt->getTimestamp());
    $dt = TimeUtil::parseISO8601DateOptionalTime('1970-01-02');
    $this->assertEquals(24*60*60, $dt->getTimestamp());
    $dt = TimeUtil::parseISO8601DateOptionalTime('1970-01-01T01');
    $this->assertEquals(60*60, $dt->getTimestamp());
    $dt = TimeUtil::parseISO8601DateOptionalTime('1970-01-01T00:01');
    $this->assertEquals(60, $dt->getTimestamp());
    $dt = TimeUtil::parseISO8601DateOptionalTime('1970-01-01T00:00:01');
    $this->assertEquals(1, $dt->getTimestamp());
    $dt = TimeUtil::parseISO8601DateOptionalTime('1970-01-01T00:00:00.001');
    $this->assertEquals(0, $dt->getTimestamp());
    $dt = TimeUtil::parseISO8601DateOptionalTime('1970-01-01T00:00:00.001Z');
    $this->assertEquals(0, $dt->getTimestamp());
    $dt = TimeUtil::parseISO8601DateOptionalTime('1970-01-01T00:00:00.000+01');
    $this->assertEquals(-60*60, $dt->getTimestamp());
    $dt = TimeUtil::parseISO8601DateOptionalTime('1970-01-01T00:00:00.000+00:01');
    $this->assertEquals(-60, $dt->getTimestamp());
    // Offset seconds and milliseconds are not supported by the parser
    $dt = TimeUtil::parseISO8601DateOptionalTime('1970-01-01T00:00:00.000+00:00:59');
    $this->assertEquals(0, $dt->getTimestamp());
    $dt = TimeUtil::parseISO8601DateOptionalTime('1970-01-01T00:00:00.000+00:00:59.999');
    $this->assertEquals(0, $dt->getTimestamp());
  }

  public function testGetMillisecondTimestampFromDateTime() {
    /** @noinspection PhpUnhandledExceptionInspection */
    $dt = new \DateTime('', new \DateTimeZone('UTC'));
    $dt->setDate(1970, 1, 1);
    $dt->setTime(0, 0);
    $this->assertEquals(0, TimeUtil::getMillisecondTimestampFromDateTime($dt));

    /** @noinspection PhpUnhandledExceptionInspection */
    $dt = new \DateTime('', new \DateTimeZone('CET'));
    $dt->setDate(1970, 1, 1);
    $dt->setTime(0, 0);
    $this->assertEquals(-3600000, TimeUtil::getMillisecondTimestampFromDateTime($dt));

    /** @noinspection PhpUnhandledExceptionInspection */
    $dt = new \DateTime('', new \DateTimeZone('UTC'));
    $dt->setTimestamp(0);
    $this->assertEquals(0, TimeUtil::getMillisecondTimestampFromDateTime($dt));
    $dt->setTimestamp(0.1); // PHP does not support float timestamps
    $this->assertEquals(0, TimeUtil::getMillisecondTimestampFromDateTime($dt));
    // 1s becomes 1000ms
    $dt->setTimestamp(1);
    $this->assertEquals(1000, TimeUtil::getMillisecondTimestampFromDateTime($dt));
  }

}
