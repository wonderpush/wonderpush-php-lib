<?php

namespace WonderPush\Util;

class TimeValueTest extends \WonderPush\TestCase {

  public function testCompareTo() {
    $this->assertEquals(-1, TimeValue::Seconds( 1)->compareTo(TimeValue::Seconds( 2)));
    $this->assertEquals( 0, TimeValue::Seconds( 1)->compareTo(TimeValue::Seconds( 1)));
    $this->assertEquals(+1, TimeValue::Seconds( 2)->compareTo(TimeValue::Seconds( 1)));

    $this->assertEquals(-1, TimeValue::Seconds( 1)->compareTo(TimeValue::Minutes( 1)));
    $this->assertEquals( 0, TimeValue::Seconds(60)->compareTo(TimeValue::Minutes( 1)));
    $this->assertEquals( 0, TimeValue::Minutes( 1)->compareTo(TimeValue::Minutes( 1)));
    $this->assertEquals( 0, TimeValue::Minutes( 1)->compareTo(TimeValue::Seconds(60)));
    $this->assertEquals(+1, TimeValue::Minutes( 1)->compareTo(TimeValue::Seconds( 1)));
  }

  public function testToString() {
    $this->assertEquals('42ns', (string)new TimeValue(42, TimeUnit::NANOSECONDS));
    $this->assertEquals('42us', (string)new TimeValue(42, TimeUnit::MICROSECONDS));
    $this->assertEquals('42ms', (string)new TimeValue(42, TimeUnit::MILLISECONDS));
    $this->assertEquals('42s', (string)new TimeValue(42, TimeUnit::SECONDS));
    $this->assertEquals('42m', (string)new TimeValue(42, TimeUnit::MINUTES));
    $this->assertEquals('42h', (string)new TimeValue(42, TimeUnit::HOURS));
    $this->assertEquals('42d', (string)new TimeValue(42, TimeUnit::DAYS));
    $this->assertEquals('42w', (string)new TimeValue(42, TimeUnit::WEEKS));
    $this->assertEquals('-1s', (string)new TimeValue(-1, TimeUnit::SECONDS));
  }

  public function testParse() {
    $this->assertEquals(null, TimeValue::parse(null));
    $this->assertEquals(null, TimeValue::parse(''));
    $this->assertEquals(new TimeValue(0, TimeUnit::MILLISECONDS), TimeValue::parse('0'));
    $this->assertEquals(new TimeValue(0, TimeUnit::MILLISECONDS), TimeValue::parse('0.'));
    $this->assertEquals(new TimeValue(0, TimeUnit::MILLISECONDS), TimeValue::parse('.'));
    $this->assertEquals(new TimeValue(0, TimeUnit::MILLISECONDS), TimeValue::parse('.0'));

    $this->assertEquals(new TimeValue(42, TimeUnit::SECONDS), TimeValue::parse('42s'));
    $this->assertEquals(new TimeValue(42, TimeUnit::SECONDS), TimeValue::parse('42 s'));
    $this->assertEquals(new TimeValue(42, TimeUnit::SECONDS), TimeValue::parse('42seconds'));
    $this->assertEquals(new TimeValue(42, TimeUnit::SECONDS), TimeValue::parse('42 seconds'));
    $this->assertEquals(new TimeValue(42, TimeUnit::SECONDS), TimeValue::parse(' 42 seconds'));
    $this->assertEquals(new TimeValue(42, TimeUnit::SECONDS), TimeValue::parse('42 seconds '));
    $this->assertEquals(new TimeValue(42, TimeUnit::SECONDS), TimeValue::parse(' 42 seconds '));

    $this->assertEquals(new TimeValue(42, TimeUnit::NANOSECONDS), TimeValue::parse('42ns'));
    $this->assertEquals(new TimeValue(42, TimeUnit::MICROSECONDS), TimeValue::parse('42us'));
    $this->assertEquals(new TimeValue(42, TimeUnit::MILLISECONDS), TimeValue::parse('42ms'));
    $this->assertEquals(new TimeValue(42, TimeUnit::SECONDS), TimeValue::parse('42s'));
    $this->assertEquals(new TimeValue(42, TimeUnit::MINUTES), TimeValue::parse('42m'));
    $this->assertEquals(new TimeValue(42, TimeUnit::HOURS), TimeValue::parse('42h'));
    $this->assertEquals(new TimeValue(42, TimeUnit::DAYS), TimeValue::parse('42d'));
    $this->assertEquals(new TimeValue(42, TimeUnit::WEEKS), TimeValue::parse('42w'));

    $this->assertEquals(new TimeValue(+42, TimeUnit::SECONDS), TimeValue::parse('+42s'));
    $this->assertEquals(new TimeValue(-42, TimeUnit::SECONDS), TimeValue::parse('-42s'));
  }

  public function testNanoseconds() {
    $this->assertEquals(new TimeValue(42, TimeUnit::NANOSECONDS), TimeValue::Nanoseconds(42));
  }

  public function testMicroseconds() {
    $this->assertEquals(new TimeValue(42, TimeUnit::MICROSECONDS), TimeValue::Microseconds(42));
  }

  public function testMilliseconds() {
    $this->assertEquals(new TimeValue(42, TimeUnit::MILLISECONDS), TimeValue::Milliseconds(42));
  }

  public function testSeconds() {
    $this->assertEquals(new TimeValue(42, TimeUnit::SECONDS), TimeValue::Seconds(42));
  }

  public function testMinutes() {
    $this->assertEquals(new TimeValue(42, TimeUnit::MINUTES), TimeValue::Minutes(42));
  }

  public function testHours() {
    $this->assertEquals(new TimeValue(42, TimeUnit::HOURS), TimeValue::Hours(42));
  }

  public function testDays() {
    $this->assertEquals(new TimeValue(42, TimeUnit::DAYS), TimeValue::Days(42));
  }

  public function testWeeks() {
    $this->assertEquals(new TimeValue(42, TimeUnit::WEEKS), TimeValue::Weeks(42));
  }

  public function testTo() {
    $tv = new TimeValue(42, TimeUnit::NANOSECONDS);
    $this->assertEquals(0.000042, $tv->to(TimeUnit::MILLISECONDS));
    $tv = new TimeValue(42, TimeUnit::MILLISECONDS);
    $this->assertEquals(42000000, $tv->to(TimeUnit::NANOSECONDS));
  }

  public function testConvert() {
    $tv = new TimeValue(42, TimeUnit::NANOSECONDS);
    $this->assertEquals(new TimeValue(0.000042, TimeUnit::MILLISECONDS), $tv->convert(TimeUnit::MILLISECONDS));
    $tv = new TimeValue(42, TimeUnit::MILLISECONDS);
    $this->assertEquals(new TimeValue(42000000, TimeUnit::NANOSECONDS), $tv->convert(TimeUnit::NANOSECONDS));
  }

  public function testToNanoseconds() {
    $tv = new TimeValue(1, TimeUnit::WEEKS);
    $this->assertEquals(7 * 24 * 60 * 60 * 1000 * 1000 * 1000, $tv->toNanoseconds());
  }

  public function testToMicroseconds() {
    $tv = new TimeValue(1, TimeUnit::WEEKS);
    $this->assertEquals(7 * 24 * 60 * 60 * 1000 * 1000, $tv->toMicroseconds());
  }

  public function testToMilliseconds() {
    $tv = new TimeValue(1, TimeUnit::WEEKS);
    $this->assertEquals(7 * 24 * 60 * 60 * 1000, $tv->toMilliseconds());
  }

  public function testToSeconds() {
    $tv = new TimeValue(1, TimeUnit::WEEKS);
    $this->assertEquals(7 * 24 * 60 * 60, $tv->toSeconds());
  }

  public function testToMinutes() {
    $tv = new TimeValue(1, TimeUnit::WEEKS);
    $this->assertEquals(7 * 24 * 60, $tv->toMinutes());
  }

  public function testToHours() {
    $tv = new TimeValue(1, TimeUnit::WEEKS);
    $this->assertEquals(7 * 24, $tv->toHours());
  }

  public function testToDays() {
    $tv = new TimeValue(1, TimeUnit::WEEKS);
    $this->assertEquals(7, $tv->toDays());
  }

  public function testToWeeks() {
    $tv = new TimeValue(1, TimeUnit::WEEKS);
    $this->assertEquals(1, $tv->toWeeks());
  }

}
