<?php

namespace WonderPush\Util;

class StringUtilTest extends \WonderPush\TestCase {

  public function testBeginsWith() {
    $this->assertTrue(StringUtil::beginsWith('', ''));
    $this->assertTrue(StringUtil::beginsWith('foo', ''));
    $this->assertFalse(StringUtil::beginsWith('foo', 'bar'));
    $this->assertFalse(StringUtil::beginsWith('', 'bar'));

    $this->assertFalse(StringUtil::beginsWith('foo', 'o'));
    $this->assertFalse(StringUtil::beginsWith('foo', 'oo'));
    $this->assertTrue(StringUtil::beginsWith('foo', 'f'));
    $this->assertTrue(StringUtil::beginsWith('foo', 'fo'));
    $this->assertTrue(StringUtil::beginsWith('foo', 'foo'));
    $this->assertFalse(StringUtil::beginsWith('foo', 'foob'));
    $this->assertFalse(StringUtil::beginsWith('foo', 'fooba'));
    $this->assertFalse(StringUtil::beginsWith('foo', 'foobar'));
  }

  public function testEndsWith() {
    $this->assertTrue(StringUtil::endsWith('', ''));
    $this->assertTrue(StringUtil::endsWith('foo', ''));
    $this->assertFalse(StringUtil::endsWith('foo', 'bar'));
    $this->assertFalse(StringUtil::endsWith('', 'bar'));

    $this->assertFalse(StringUtil::endsWith('foo', 'f'));
    $this->assertFalse(StringUtil::endsWith('foo', 'fo'));
    $this->assertTrue(StringUtil::endsWith('foo', 'foo'));
    $this->assertTrue(StringUtil::endsWith('foo', 'oo'));
    $this->assertTrue(StringUtil::endsWith('foo', 'o'));
    $this->assertFalse(StringUtil::endsWith('foo', 'foobar'));
    $this->assertFalse(StringUtil::endsWith('foo', 'oobar'));
    $this->assertFalse(StringUtil::endsWith('foo', 'obar'));
    $this->assertFalse(StringUtil::endsWith('foo', 'bar'));
    $this->assertFalse(StringUtil::endsWith('foo', 'ar'));
    $this->assertFalse(StringUtil::endsWith('foo', 'r'));
  }
  
  /**
   * @expectedException \PHPUnit_Framework_Error_Warning
   */
  public function testContainsEmptyNeedle() {
    StringUtil::contains('', '');
  }

  public function testContains() {
    $this->assertFalse(StringUtil::contains('', 'foo'));
    $this->assertTrue(StringUtil::contains('foo', 'f'));
    $this->assertTrue(StringUtil::contains('foo', 'o'));
    $this->assertTrue(StringUtil::contains('foo', 'oo'));
    $this->assertTrue(StringUtil::contains('foo', 'foo'));
    $this->assertFalse(StringUtil::contains('foo', 'foob'));
    $this->assertFalse(StringUtil::contains('foo', 'fooba'));
    $this->assertFalse(StringUtil::contains('foo', 'foobar'));
    $this->assertFalse(StringUtil::contains('foo', 'rfoo'));
    $this->assertFalse(StringUtil::contains('foo', 'arfoo'));
    $this->assertFalse(StringUtil::contains('foo', 'barfoo'));
  }

  public function testFormat() {
    $this->assertEquals('foobarbaz', StringUtil::format('foo{0}baz', 'bar'));
    $this->assertEquals('foobarbazqux', StringUtil::format('foo{0}baz{1}', 'bar', 'qux'));
    $this->assertEquals('foobarbazqux', StringUtil::format('foo{0}baz{1}',         array('bar', 'qux')));
    $this->assertEquals('foobarbazqux', StringUtil::format('foo{0}baz{1}', (object)array('bar', 'qux')));
    $this->assertEquals('foobarbazqux', StringUtil::format('foo{BAR}baz{QUX}',         array('BAR' => 'bar', 'QUX' => 'qux')));
    $this->assertEquals('foobarbazqux', StringUtil::format('foo{BAR}baz{QUX}', (object)array('BAR' => 'bar', 'QUX' => 'qux')));

    /** @noinspection PhpParamsInspection */
    $this->assertEquals('foobarbaz{1}', StringUtil::format('foo{0}baz{1}', 'bar'));
    $this->assertEquals('foobarbazqux{qux}', StringUtil::format('foo{BAR}baz{QUX}{qux}',         array('BAR' => 'bar', 'QUX' => 'qux')));
    $this->assertEquals('foobarbazqux{qux}', StringUtil::format('foo{BAR}baz{QUX}{qux}', (object)array('BAR' => 'bar', 'QUX' => 'qux')));

    // Ignores any further arguments if an array was given first
    $this->assertEquals('foobarbaz{QUX}', StringUtil::format('foo{BAR}baz{QUX}',         array('BAR' => 'bar'),         array('QUX' => 'qux')));
    $this->assertEquals('foobarbaz{QUX}', StringUtil::format('foo{BAR}baz{QUX}', (object)array('BAR' => 'bar'), (object)array('QUX' => 'qux')));
  }

}
