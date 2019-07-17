<?php

namespace WonderPush\Util;

class ArrayUtilTest extends \WonderPush\TestCase {

  public function testFlattenNonArrayValues() {
    $nonArrayReturnValue = array();
    $this->assertEquals($nonArrayReturnValue, ArrayUtil::flatten(null));
    /** @noinspection PhpParamsInspection */
    $this->assertEquals($nonArrayReturnValue, ArrayUtil::flatten(true));
    /** @noinspection PhpParamsInspection */
    $this->assertEquals($nonArrayReturnValue, ArrayUtil::flatten(false));
    /** @noinspection PhpParamsInspection */
    $this->assertEquals($nonArrayReturnValue, ArrayUtil::flatten(0));
    /** @noinspection PhpParamsInspection */
    $this->assertEquals($nonArrayReturnValue, ArrayUtil::flatten(3.14));
    /** @noinspection PhpParamsInspection */
    $this->assertEquals($nonArrayReturnValue, ArrayUtil::flatten(''));
    /** @noinspection PhpParamsInspection */
    $this->assertEquals($nonArrayReturnValue, ArrayUtil::flatten('foo'));
    /** @noinspection PhpParamsInspection */
    $this->assertEquals($nonArrayReturnValue, ArrayUtil::flatten(new \stdClass()));
  }

  public function testFlatten() {
    $this->assertEquals(array(       ), ArrayUtil::flatten(array(       )));
    $this->assertEquals(array(0      ), ArrayUtil::flatten(array(0      )));
    $this->assertEquals(array(3, 2, 1), ArrayUtil::flatten(array(3, 2, 1)));

    $this->assertEquals(array(       ), ArrayUtil::flatten(array(array(       ))));
    $this->assertEquals(array(0      ), ArrayUtil::flatten(array(array(0      ))));
    $this->assertEquals(array(3, 2, 1), ArrayUtil::flatten(array(array(3, 2, 1))));

    $this->assertEquals(array(       ), ArrayUtil::flatten(array(array(), array(       ), array())));
    $this->assertEquals(array(0      ), ArrayUtil::flatten(array(array(), array(0      ), array())));
    $this->assertEquals(array(3, 2, 1), ArrayUtil::flatten(array(array(), array(3, 2, 1), array())));

    // Test that flatten elements do not overwrite elements at occupied positions
    $this->assertEquals(array('00', '01', '1'), ArrayUtil::flatten(array(array('00', '01'), '1')));
    $this->assertEquals(array('0', '10', '11'), ArrayUtil::flatten(array('0', array('10', '11'))));
  }

  public function testFlattenAssoc() {
    $this->assertEquals(array('FOO'), ArrayUtil::flatten(array('foo' => 'FOO')));
    $this->assertEquals(array('FOO', 'BAR.FOO'), ArrayUtil::flatten(array('foo' => 'FOO', 'bar' => array('foo' => 'BAR.FOO'))));
  }

  public function testGetIfSetScalars() {
    $def = new \stdClass();
    foreach (array(null, 42, true) as $value) { // no string to avoid "String offset cast occurred"
      foreach (array(null, 42, true, 'foo', array(1,2,3)) as $key) {
        $this->assertNull(ArrayUtil::getIfSet($value, $key));
        $this->assertSame($def, ArrayUtil::getIfSet($value, $key, $def));
      }
    }
  }

  public function testGetIfSetArrays() {
    $def = new \stdClass();

    // null is converted to ''
    $this->assertSame($def, ArrayUtil::getIfSet(array(), null, $def));
    $this->assertSame($def, ArrayUtil::getIfSet(array(0), null, $def));
    $this->assertEquals('', ArrayUtil::getIfSet(array('' => ''), null, $def));
    $this->assertEquals('', ArrayUtil::getIfSet(array('' => ''), '', $def));

    $this->assertEquals('FOO', ArrayUtil::getIfSet(array('foo' => 'FOO'), 'foo', $def));
    $this->assertSame($def, ArrayUtil::getIfSet(array('foo' => 'FOO'), 'bar', $def));

    $this->assertSame($def, ArrayUtil::getIfSet(array('foo', 'bar'), -1, $def));
    $this->assertEquals('foo', ArrayUtil::getIfSet(array('foo', 'bar'), 0, $def));
    $this->assertEquals('bar', ArrayUtil::getIfSet(array('foo', 'bar'), 1, $def));
    $this->assertSame($def, ArrayUtil::getIfSet(array('foo', 'bar'), 2, $def));
  }

  public function testGetIfSetWithNullValues() {
    $def = new \stdClass();

    $this->assertSame($def, ArrayUtil::getIfSet(array('foo', null, 'bar'), 1, $def));
    $this->assertSame($def, ArrayUtil::getIfSet(array('foo' => 'FOO', 'null' => null, 'bar' => 'BAR'), 'null', $def));
  }

  public function testIsNotNull() {
    $this->assertFalse(ArrayUtil::is_not_null(null));
    $this->assertTrue(ArrayUtil::is_not_null('foo'));
    $this->assertTrue(ArrayUtil::is_not_null(0));
    $this->assertTrue(ArrayUtil::is_not_null(1));
    $this->assertTrue(ArrayUtil::is_not_null(true));
    $this->assertTrue(ArrayUtil::is_not_null(false));
    $this->assertTrue(ArrayUtil::is_not_null(array()));
    $this->assertTrue(ArrayUtil::is_not_null(new \stdClass()));
  }

  public function testFilterNulls() {
    // It does not renumber non-associative arrays
    $this->assertEquals(array(0 => false, 2 => 1), ArrayUtil::filterNulls(array(false, null, 1)));

    $this->assertEquals(array('foo' => 'FOO', 0), ArrayUtil::filterNulls(array('foo' => 'FOO', 'bar' => null, 0, null)));

    // It does not work recursively
    $this->assertEquals(array('foo' => array(null)), ArrayUtil::filterNulls(array('foo' => array(null))));
    $this->assertEquals(array('foo' => array(0, null, 2)), ArrayUtil::filterNulls(array('foo' => array(0, null, 2))));
    $this->assertEquals(array('foo' => array('foo' => null)), ArrayUtil::filterNulls(array('foo' => array('foo' => null))));
  }

}
