<?php

namespace WonderPush\Util;

class ArrayUtilTest extends \WonderPush\TestCase {

  public function testIsAssociative() {
    $v = null;
    $this->assertFalse(ArrayUtil::isAssociative($v));

    $v = 1;
    $this->assertFalse(ArrayUtil::isAssociative($v));

    $v = "foo";
    $this->assertFalse(ArrayUtil::isAssociative($v));

    $v = array();
    $this->assertFalse(ArrayUtil::isAssociative($v));

    $v = array(1, 2, 3);
    $this->assertFalse(ArrayUtil::isAssociative($v));

    $v = array(1, 2, 3);
    array_splice($v, 1, 1); // array_splice shifts the keys to preserve non-associativeness
    $this->assertFalse(ArrayUtil::isAssociative($v));

    $v = array(0 => 1, 1 => 2, 2 => 3); // right key sequence -> non-associative
    $this->assertFalse(ArrayUtil::isAssociative($v));

    $v = array(0 => 1, 1 => 2, 2 => 3);
    unset($v[1]); // holes => associative
    $this->assertTrue(ArrayUtil::isAssociative($v));

    $v = array(0 => 1, 1 => 2, 2 => 3);
    unset($v[2]); // unsetting the last key preserved non-associativeness
    $this->assertFalse(ArrayUtil::isAssociative($v));

    $v = array(0 => 1,         2 => 3); // holes => associative
    $this->assertTrue(ArrayUtil::isAssociative($v));

    $v = array(1 => 1, 0 => 2); // wrong order => associative
    $this->assertTrue(ArrayUtil::isAssociative($v));

    $v = array("foo" => "bar");
    $this->assertTrue(ArrayUtil::isAssociative($v));

    $v = array(0 => 1, "foo" => "bar");
    $this->assertTrue(ArrayUtil::isAssociative($v));
  }

  public function testIntersectRecursive() {
    // Returns the value from the first argument
    $left = array('a' => 'left', 'b' => 'left');
    $right = array('b' => 'right', 'c' => 'right');
    $this->assertEquals(array('b' => 'left'), ArrayUtil::intersectRecursive($left, $right));
    $this->assertEquals(array('b' => 'right'), ArrayUtil::intersectRecursive($right, $left));
    // Works on boolean as well
    $left['b'] = true;
    $right['b'] = false;
    $this->assertEquals(array('b' => true), ArrayUtil::intersectRecursive($left, $right));
    $this->assertEquals(array('b' => false), ArrayUtil::intersectRecursive($right, $left));
    // Works on null
    $left['b'] = false;
    $right['b'] = null;
    $this->assertEquals(array('b' => false), ArrayUtil::intersectRecursive($left, $right));
    $this->assertEquals(array('b' => null), ArrayUtil::intersectRecursive($right, $left));
    // Works on null on the other side
    $left['b'] = null;
    $right['b'] = false;
    $this->assertEquals(array('b' => null), ArrayUtil::intersectRecursive($left, $right));
    $this->assertEquals(array('b' => false), ArrayUtil::intersectRecursive($right, $left));
    // Treats non-associative arrays as mere values
    $left['b'] = array(0,1,2);
    $right['b'] = array(0,1);
    $this->assertEquals(array('b' => array(0,1,2)), ArrayUtil::intersectRecursive($left, $right));
    $this->assertEquals(array('b' => array(0,1)), ArrayUtil::intersectRecursive($right, $left));
    // Treats empty array as a mere value
    $left['b'] = array(0,1,2);
    $right['b'] = array();
    $this->assertEquals(array('b' => array(0,1,2)), ArrayUtil::intersectRecursive($left, $right));
    $this->assertEquals(array('b' => array()), ArrayUtil::intersectRecursive($right, $left));
    // Treats empty array the same, regardless the side it appears on
    $left['b'] = array();
    $right['b'] = array(0,1);
    $this->assertEquals(array('b' => array()), ArrayUtil::intersectRecursive($left, $right));
    $this->assertEquals(array('b' => array(0,1)), ArrayUtil::intersectRecursive($right, $left));
    // Works with deeper nesting
    $left['b'] = 'left';
    $right['b'] = 'right';
    $left['d'] = $left;
    $right['d'] = $right;
    $this->assertEquals(array('b' => 'left', 'd' => array('b' => 'left')), ArrayUtil::intersectRecursive($left, $right));
    $this->assertEquals(array('b' => 'right', 'd' => array('b' => 'right')), ArrayUtil::intersectRecursive($right, $left));
  }

  public function testDeepMerge() {
    $base = array();
    $base["present_vs_absent"] = "base";
    $base["int"] = 1;
    $base["float"] = 2.718281828;
    $base["string"] = "foo";
    $base["bool"] = false;
    $base["array"] = array(1, 2, 3, 4, 5);
    $base["object"] = array();
    $base["object"]["present_vs_absent"] = "base";
    $base["object"]["present_vs_present"] = "base";
    $base["null_vs_int"] = null;
    $base["int_vs_null"] = 1;
    $base["int_vs_string"] = 1;
    $base["int_vs_array"] = 1;
    $base["int_vs_object"] = 1;
    $base["string_vs_int"] = "string";
    $base["array_vs_int"] = array(1, 2, 3);
    $base["object_vs_int"] = array();
    $base["object_vs_int"]["sub_key"] = "foo";

    $toBeMerged = array();
    $toBeMerged["absent_vs_present"] = "merged";
    $toBeMerged["int"] = 2;
    $toBeMerged["float"] = 3.14159265;
    $toBeMerged["string"] = "bar";
    $toBeMerged["bool"] = true;
    $toBeMerged["array"] = array(1, 1, 2, 3, 5, 8);
    $toBeMerged["object"] = array();
    $toBeMerged["object"]["absent_vs_present"] = "merged";
    $toBeMerged["object"]["present_vs_present"] = "merged";
    $toBeMerged["null_vs_int"] = 1;
    $toBeMerged["int_vs_null"] = null;
    $toBeMerged["int_vs_string"] = "string";
    $toBeMerged["int_vs_array"] = array(1, 2, 3);
    $toBeMerged["int_vs_object"] = array();
    $toBeMerged["int_vs_object"]["sub_key"] = "bar";
    $toBeMerged["string_vs_int"] = 1;
    $toBeMerged["array_vs_int"] = 1;
    $toBeMerged["object_vs_int"] = 1;

    $expected = array();
    $expected["present_vs_absent"] = "base";
    $expected["absent_vs_present"] = "merged";
    $expected["int"] = 2;
    $expected["float"] = 3.14159265;
    $expected["string"] = "bar";
    $expected["bool"] = true;
    $expected["array"] = array(1, 1, 2, 3, 5, 8);
    $expected["object"] = array();
    $expected["object"]["present_vs_absent"] = "base";
    $expected["object"]["absent_vs_present"] = "merged";
    $expected["object"]["present_vs_present"] = "merged";
    $expected["null_vs_int"] = 1;
    //$expected["int_vs_null"] = undefined or null
    $expected["int_vs_string"] = "string";
    $expected["int_vs_array"] = array(1, 2, 3);
    $expected["int_vs_object"] = array();
    $expected["int_vs_object"]["sub_key"] = "bar";
    $expected["string_vs_int"] = 1;
    $expected["array_vs_int"] = 1;
    $expected["object_vs_int"] = 1;

    $this->assertEquals($expected, ArrayUtil::deepMerge($base, $toBeMerged, true));
    $expected["int_vs_null"] = null;
    $this->assertEquals($expected, ArrayUtil::deepMerge($base, $toBeMerged, false));
    unset($expected["int_vs_null"]);

    $this->assertNotEquals($expected, $base);
    $this->assertEquals($expected, ArrayUtil::deepMergeInplace($base, $toBeMerged, true));
    $this->assertEquals($expected, $base);
  }

  public function testRemove() {
    $this->assertEquals(array(0,1,3,4,3,2,1,0), ArrayUtil::remove(array(0,1,2,3,4,3,2,1,0), 2));
    $this->assertEquals(array("b" => "b", "c" => "a"), ArrayUtil::remove(array("a" => "a", "b" => "b", "c" => "a"), "a"));
  }

  public function testRemoveAll() {
    $this->assertEquals(array(0,1,3,4,3,1,0), ArrayUtil::removeAll(array(0,1,2,3,4,3,2,1,0), 2));
    $this->assertEquals(array("b" => "b"), ArrayUtil::removeAll(array("a" => "a", "b" => "b", "c" => "a"), "a"));
  }

  public function testReplace() {
    $this->assertEquals(array(0,1,-2,3,4,3,2,1,0), ArrayUtil::replace(array(0,1,2,3,4,3,2,1,0), 2, -2));
    $this->assertEquals(array("a" => "A", "b" => "b", "c" => "a"), ArrayUtil::replace(array("a" => "a", "b" => "b", "c" => "a"), "a", "A"));
  }

  public function testReplaceAll() {
    $this->assertEquals(array(0,1,-2,3,4,3,-2,1,0), ArrayUtil::replaceAll(array(0,1,2,3,4,3,2,1,0), 2, -2));
    $this->assertEquals(array("a" => "A", "b" => "b", "c" => "A"), ArrayUtil::replaceAll(array("a" => "a", "b" => "b", "c" => "a"), "a", "A"));
  }

  public function testReplaceAllRecursive() {
    $this->assertEquals(array(0,1,-2,3,4,3,-2,1,0,array(0,1,-2)),
        ArrayUtil::replaceAllRecursive(array(0,1,2,3,4,3,2,1,0,array(0,1,2)), 2, -2));
    $this->assertEquals(array("a" => "A", "b" => "b", "c" => "A", "sub" => array("a" => "A", "b" => "b")),
        ArrayUtil::replaceAllRecursive(array("a" => "a", "b" => "b", "c" => "a", "sub" => array("a" => "a", "b" => "b")), "a", "A"));
  }

  public function testRecursiveSortAssociativeInPlace() {

    // Make sure it sorts keys and not values

    $input    = array("a" => "a", "b" => "b");
    $expected = array("a" => "a", "b" => "b");
    ArrayUtil::recursiveSortAssociativeInPlace($input);
    $this->assertEquals($expected, $input);

    $input    = array("b" => "b", "a" => "a");
    $expected = array("a" => "a", "b" => "b");
    ArrayUtil::recursiveSortAssociativeInPlace($input);
    $this->assertEquals($expected, $input);

    $input    = array("a" => "b", "b" => "a");
    $expected = array("a" => "b", "b" => "a");
    ArrayUtil::recursiveSortAssociativeInPlace($input);
    $this->assertEquals($expected, $input);

    $input    = array("b" => "a", "a" => "b");
    $expected = array("a" => "b", "b" => "a");
    ArrayUtil::recursiveSortAssociativeInPlace($input);
    $this->assertEquals($expected, $input);

    // Make sure it preserves nonassociative arrays

    $input    = array(3, 2, 1);
    $expected = array(3, 2, 1);
    ArrayUtil::recursiveSortAssociativeInPlace($input);
    $this->assertEquals($expected, $input);

    // Make sure it sorts mixed-associativeness arrays

    $input    = array("b" => "b", 3, 2, "a" => "a", 1);
    $expected = array(3, 2, 1, "a" => "a", "b" => "b");
    ArrayUtil::recursiveSortAssociativeInPlace($input);
    $this->assertEquals($expected, $input);

    // Make sure it sorts recursively

    $input    = array("a" => array("b" => "b", "a" => "a"), "b" => "b");
    $expected = array("a" => array("a" => "a", "b" => "b"), "b" => "b");
    ArrayUtil::recursiveSortAssociativeInPlace($input);
    $this->assertEquals($expected, $input);

    $input    = array("b" => "b", "a" => array("b" => "b", "a" => "a"));
    $expected = array("a" => array("a" => "a", "b" => "b"), "b" => "b");
    ArrayUtil::recursiveSortAssociativeInPlace($input);
    $this->assertEquals($expected, $input);

    $input    = array("b" => "b", "a" => array("b" => array(3, 2, 1), "a" => "a"));
    $expected = array("a" => array("a" => "a", "b" => array(3, 2, 1)), "b" => "b");
    ArrayUtil::recursiveSortAssociativeInPlace($input);
    $this->assertEquals($expected, $input);

    // Make sure it traverses nonassociative arrays without sorting them

    $input    = array(3, array("b" => "b", "a" => array(3, array("b" => "b", "a" => "a"), 1)), 1);
    $expected = array(3, array("a" => array(3, array("a" => "a", "b" => "b"), 1), "b" => "b"), 1);
    ArrayUtil::recursiveSortAssociativeInPlace($input);
    $this->assertEquals($expected, $input);

  }

  public function testHash() {
    // Assert sorting or not the array impacts the array for unsorted arrays
    $input = array("b" => "b", "a" => "a");
    $sortedHash = ArrayUtil::hash($input, null, true);
    $unsortedHash = ArrayUtil::hash($input, null, false);
    $this->assertNotEquals($sortedHash, $unsortedHash);

    // Assert sorting or not the array does not impact the array for sorted arrays
    $input = array("a" => "a", "b" => "b");
    $sortedHash = ArrayUtil::hash($input, null, true);
    $unsortedHash = ArrayUtil::hash($input, null, false);
    $this->assertEquals($sortedHash, $unsortedHash);

    // Assert hash is not sensitive to array sorting by default
    $sortedInput   = array("a" => "a", "b" => "b");
    $unsortedInput = array("b" => "b", "a" => "a");
    $sortedHash = ArrayUtil::hash($sortedInput);
    $unsortedHash = ArrayUtil::hash($unsortedInput);
    $this->assertEquals($sortedHash, $unsortedHash);

    // Assert unicode strings survive encoding and decoding
    $input = array(3, "( ͡° ͜ʖ ͡°)", 1);
    $hashOriginal = ArrayUtil::hash($input);
    $reparsed = json_decode(json_encode($input));
    $hashReparsed = ArrayUtil::hash($reparsed);
    $this->assertEquals($hashOriginal, $hashReparsed);
    $reparsed = json_decode(json_encode($input, JSON_UNESCAPED_UNICODE));
    $hashReparsed = ArrayUtil::hash($reparsed);
    $this->assertEquals($hashOriginal, $hashReparsed);

    // Assert deep unsorted strings survive encoding and decoding with sort sensitive hashing
    $input = array(3, array("b" => array("bb" => "b", "ba" => "a"), "a" => array("ab" => "b", "aa" => "a")), 1);
    $hashOriginal = ArrayUtil::hash($input, null, false);
    $reparsed = json_decode(json_encode($input));
    $hashReparsed = ArrayUtil::hash($reparsed, null, false);
    $this->assertEquals($hashOriginal, $hashReparsed);
  }

  private function assertArrayEqualsUnsorted($expected, $actual, $message = '') {
    sort($expected);
    sort($actual);
    $this->assertEquals($expected, $actual, $message);
  }

  public function testSetMerge() {
    $this->assertArrayEqualsUnsorted(
        array(0, 1, 2, 3),
        ArrayUtil::setMerge(
            array(0, 2),
            array(1, 3)));

    $this->assertArrayEqualsUnsorted(
        array(0, 1, 2),
        ArrayUtil::setMerge(
            array(0, 1),
            array(1, 2)));

    $this->assertArrayEqualsUnsorted(
        array(0, 1),
        ArrayUtil::setMerge(
            array(0, 0, 1, 1),
            array()));

    $this->assertArrayEqualsUnsorted(
        array("a", "b", "c", "d"),
        ArrayUtil::setMerge(
            array("a", "c"),
            array("b", "d")));

    $this->assertArrayEqualsUnsorted(
        array("a", "b", "c"),
        ArrayUtil::setMerge(
            array("a", "b"),
            array("b", "c")));

    $this->assertArrayEqualsUnsorted(
        array("a", "b"),
        ArrayUtil::setMerge(
            array("a", "a", "b", "b"),
            array()));
  }

  public function testDiffStrictRecursive() {
    // Differentiates non strictly equal values, including non associative arrays
    $values = array(
        null, false, true, -1, 0, 1, 2, "", "-1", "0", "1", "2", -1.0, 0.0, 1.0, 2.0,
        array(), array(0,1), array(1,2), array(1,2,3), array(3,2,1),
        array("a" => "a")
    );
    for ($i = 0 ; $i < count($values) ; ++$i) {
      $base = array("key" => $values[$i]);
      for ($j = 0 ; $j < count($values) ; ++$j) {
        if ($i === $j) continue;
        $new = array("key" => $values[$j]);
        $this->assertEquals(
            $new,
            ArrayUtil::diffStrictRecursive(
                $new,
                $base));
      }
      // No difference between two strictly equal values
      $new = array("key" => $values[$i]);
      $this->assertEquals(
          array(),
          ArrayUtil::diffStrictRecursive(
              $new,
              $base),
          "Failed asserting twice " . var_export($values[$i], true) . " is identical");
    }

    // Not order sensitive
    $this->assertEquals(
        array(),
        ArrayUtil::diffStrictRecursive(
            array("a"=>"a", "b"=>"b"),
            array("b"=>"b", "a"=>"a")));

    // Detects additions
    $this->assertEquals(
        array("new" => "new"),
        ArrayUtil::diffStrictRecursive(
            array("a"=>"a", "b"=>"b", "new"=>"new"),
            array("a"=>"a", "b"=>"b")));
    $this->assertEquals(
        array("new" => array("sub"=>"array", "added")),
        ArrayUtil::diffStrictRecursive(
            array("a"=>"a", "b"=>"b", "new"=>array("sub"=>"array", "added")),
            array("a"=>"a", "b"=>"b")));

    // Assigns null to removed items
    $this->assertEquals(
        array("removed" => null),
        ArrayUtil::diffStrictRecursive(
            array("a"=>"a", "b"=>"b"),
            array("a"=>"a", "b"=>"b", "removed"=>"removed")));
    $this->assertEquals(array("removed" => null),
        ArrayUtil::diffStrictRecursive(
            array("a"=>"a", "b"=>"b"),
            array("a"=>"a", "b"=>"b", "removed"=>array("sub"=>"array", "removed"))));

    // Detects no difference recursively at the shallowest level
    $this->assertEquals(
        array(),
        ArrayUtil::diffStrictRecursive(
            array("common1" => array("common2" => array("common3" => "come on!"))),
            array("common1" => array("common2" => array("common3" => "come on!")))));
    $this->assertEquals(
        array("common1" => array("diff2" => "new2")),
        ArrayUtil::diffStrictRecursive(
            array("common1" => array("diff2" => "new2", "common2" => array("common3" => "come on!"))),
            array("common1" => array("diff2" => "old2", "common2" => array("common3" => "come on!")))));

    // Custom removed marker at multiple depth
    $removedValueMarker = new \stdClass();
    $this->assertEquals(
        array("a"=>$removedValueMarker, "b"=>array("a"=>$removedValueMarker,"b"=>"B")),
        ArrayUtil::diffStrictRecursive(
            array("b"=>array("b"=>"B","c"=>"c"), "c"=>"c"),
            array("a"=>"a", "b"=>array("a"=>"a","b"=>"b","c"=>"c"), "c"=>"c"),
            $removedValueMarker));

    // Handles \stdClass
    $removedValueMarker = new \stdClass();
    $this->assertEquals(
        array("a"=>$removedValueMarker, "b"=>array("a"=>$removedValueMarker,"b"=>"B")),
        ArrayUtil::diffStrictRecursive(
            (object)array("b"=>array("b"=>"B","c"=>"c"), "c"=>"c"),
            (object)array("a"=>"a", "b"=>array("a"=>"a","b"=>"b","c"=>"c"), "c"=>"c"),
            $removedValueMarker));
  }

  public function testSetAtPath() {
    // Empty path on unset variable
    $value = 'foo';
    ArrayUtil::setAtPath($unsetVar1, array(), $value);
    $this->assertEquals($value, $unsetVar1);

    // Non-empty path on unset variable
    $value = 'foo';
    ArrayUtil::setAtPath($unsetVar2, array('a', 'b'), $value);
    $this->assertEquals(array('a' => array('b' => $value)), $unsetVar2);

    // Empty path on set variable
    $array = array('a' => array('a' => 'a'));
    $value = 'foo';
    ArrayUtil::setAtPath($array, array(), $value);
    $this->assertEquals($value, $array);

    // Non-empty path on set variable
    $array = array('a' => array('a' => 'a'));
    $value = 'foo';
    ArrayUtil::setAtPath($array, array('a', 'b'), $value);
    $this->assertEquals(array('a' => array('a' => 'a', 'b' => $value)), $array);

    // Non-empty path on set variable, with non variable value
    $array = array('a' => array('a' => 'a'));
    ArrayUtil::setAtPath($array, array('a', 'b'), 'foo');
    $this->assertEquals(array('a' => array('a' => 'a', 'b' => 'foo')), $array);

    // Changes type of parent
    $array = array('a' => array('b' => 'b'));
    $value = 'foo';
    ArrayUtil::setAtPath($array, array('a', 'b', 'c'), $value);
    $this->assertEquals(array('a' => array('b' => array('c' => $value))), $array);

    // First inexisting keys outside
    $array = array('a' => 'a');
    ArrayUtil::setAtPath($array['b']['c'], array('d'), 'd');
    $this->assertEquals(array('a' => 'a', 'b' => array('c' => array('d' => 'd'))), $array);
    // on inexistent var
    ArrayUtil::setAtPath($unsetVar3['b']['c'], array('d'), 'd');
    $this->assertEquals(array('b' => array('c' => array('d' => 'd'))), $unsetVar3);
  }

  public function testSetAtDottedPath() {
    // Empty path on unset variable
    $value = 'foo';
    ArrayUtil::setAtDottedPath($unsetVar1, '', $value);
    $this->assertEquals($value, $unsetVar1);
    // ensure it does not set by reference
    $value = 'bar';
    $this->assertNotEquals($value, $unsetVar1);

    // Non-empty path on unset variable
    $value = 'foo';
    ArrayUtil::setAtDottedPath($unsetVar2, 'a.b', $value);
    $this->assertEquals(array('a' => array('b' => $value)), $unsetVar2);
    // ensure it does not set by reference
    $value = 'bar';
    $this->assertNotEquals(array('a' => array('b' => $value)), $unsetVar2);

    // Empty path on set variable
    $array = array('a' => array('a' => 'a'));
    $value = 'foo';
    ArrayUtil::setAtDottedPath($array, '', $value);
    $this->assertEquals($value, $array);
    // ensure it does not set by reference
    $value = 'bar';
    $this->assertNotEquals($value, $array);

    // Non-empty path on set variable
    $array = array('a' => array('a' => 'a'));
    $value = 'foo';
    ArrayUtil::setAtDottedPath($array, 'a.b', $value);
    $this->assertEquals(array('a' => array('a' => 'a', 'b' => $value)), $array);
    // ensure it does not set by reference
    $value = 'bar';
    $this->assertNotEquals(array('a' => array('a' => 'a', 'b' => $value)), $array);

    // Changes type of parent
    $array = array('a' => array('b' => 'b'));
    $value = 'foo';
    ArrayUtil::setAtDottedPath($array, 'a.b.c', $value);
    $this->assertEquals(array('a' => array('b' => array('c' => $value))), $array);
    // ensure it does not set by reference
    $value = 'bar';
    $this->assertNotEquals(array('a' => array('b' => array('c' => $value))), $array);
  }

  public function testAtPath() {
    // Empty path returns whole value
    $array = 'foo';
    $this->assertEquals($array, ArrayUtil::getAtPath($array, array()));

    // Walks array
    $array = array('a' => 'a', 'b' => array('b' => array('c' => 'c')));
    $this->assertEquals(array('c' => 'c'), ArrayUtil::getAtPath($array, array('b', 'b')));

    // Does not return a reference
    $array = array('a' => array('b' => 'b'));
    $value = ArrayUtil::getAtPath($array, array('a'));
    $value['b'] = 'B';
    $this->assertEquals(array('a' => array('b' => 'b')), $array);

    // Returns null and does not alter array on missing subkey
    $array = array('a' => array('b' => 'b'));
    $this->assertEquals(null, ArrayUtil::getAtPath($array, array('a', 'b', 'c')));
    $this->assertEquals(null, ArrayUtil::getAtPath($array, array('a', 'c')));
    $this->assertEquals(array('a' => array('b' => 'b')), $array);
  }

  public function testAtDottedPath() {
    // Empty path returns whole value
    $array = 'foo';
    $this->assertEquals($array, ArrayUtil::getAtDottedPath($array, ''));

    // Walks array
    $array = array('a' => 'a', 'b' => array('b' => array('c' => 'c')));
    $this->assertEquals(array('c' => 'c'), ArrayUtil::getAtDottedPath($array, 'b.b'));

    // Does not return a reference
    $array = array('a' => array('b' => 'b'));
    $value = ArrayUtil::getAtDottedPath($array, 'a');
    $value['b'] = 'B';
    $this->assertEquals(array('a' => array('b' => 'b')), $array);

    // Returns null and does not alter array on missing subkey
    $array = array('a' => array('b' => 'b'));
    $this->assertEquals(null, ArrayUtil::getAtDottedPath($array, 'a.b.c'));
    $this->assertEquals(null, ArrayUtil::getAtDottedPath($array, 'a.c'));
    $this->assertEquals(array('a' => array('b' => 'b')), $array);
  }

  public function testCollectAtDepth() {
    // Depth 0 should return an array of the input
    $depth = 0;

    // - of a scalar
    // -- using copies by default
    $array = 'foo';
    $collected = ArrayUtil::collectAtDepth($array, $depth);
    $array = 'bar';
    $this->assertEquals(array('foo'), $collected);
    // -- using references
    $array = 'foo';
    $collected = ArrayUtil::collectAtDepth($array, $depth, true);
    $array = 'bar';
    $this->assertEquals(array('bar'), $collected);
    // - of an array
    // -- using copies by default
    $array = array('foo', 42, array());
    $collected = ArrayUtil::collectAtDepth($array, $depth);
    $array[0] = 'bar';
    $array[1] *= -1;
    $array[2][] = true;
    $array[] = false;
    $this->assertEquals(array(array('foo', 42, array())), $collected);
    // -- using references
    $array = array('foo', 42, array());
    $collected = ArrayUtil::collectAtDepth($array, $depth, true);
    $array[0] = 'bar';
    $array[1] *= -1;
    $array[2][] = true;
    $array[] = false;
    $this->assertEquals(array(array('bar', -42, array(true), false)), $collected);

    // Depth 1
    $depth = 1;
    // - of scalar
    // -- using copies by default
    $array = array('foo', 42, array());
    $collected = ArrayUtil::collectAtDepth($array, $depth);
    $array[0] = 'bar';
    $array[1] *= -1;
    $array[2][] = true;
    $array[] = false;
    $this->assertEquals(array('foo', 42, array()), $collected);
    // -- using references
    $array = array('foo', 42, array());
    $collected = ArrayUtil::collectAtDepth($array, $depth, true);
    $array[0] = 'bar';
    $array[1] *= -1;
    $array[2][] = true;
    $array[] = false;
    $this->assertEquals(array('bar', -42, array(true)), $collected);

    // - of arrays
    // -- using copies by default
    $array = array( array('foo', 42, array()), array('FOO', 142, array()) );
    $collected = ArrayUtil::collectAtDepth($array, $depth);
    $array[0][0] = 'bar';
    $array[0][1] *= -1;
    $array[0][2][] = true;
    $array[0][] = false;
    $array[1][0] = 'BAR';
    $array[1][1] *= -2;
    $array[1][2][] = true;
    $array[1][] = false;
    $array[] = false;
    $this->assertEquals(array(array('foo', 42, array()), array('FOO', 142, array())), $collected);
    // -- using references
    $array = array( array('foo', 42, array()), array('FOO', 142, array()) );
    $collected = ArrayUtil::collectAtDepth($array, $depth, true);
    $array[0][0] = 'bar';
    $array[0][1] *= -1;
    $array[0][2][] = true;
    $array[0][] = false;
    $array[1][0] = 'BAR';
    $array[1][1] *= -2;
    $array[1][2][] = true;
    $array[1][] = false;
    $array[] = false;
    $this->assertEquals(array(array('bar', -42, array(true), false), array('BAR', -284, array(true), false)), $collected);

    // Depth 2
    $depth = 2;

    $array = array( array('foo', 42, array()), array('FOO', 142, array()) );
    $collected = ArrayUtil::collectAtDepth($array, $depth);
    $array[0][0] = 'bar';
    $array[0][1] *= -1;
    $array[0][2][] = true;
    $array[0][] = false;
    $array[1][0] = 'BAR';
    $array[1][1] *= -2;
    $array[1][2][] = true;
    $array[1][] = false;
    $this->assertEquals(array('foo', 42, array(), 'FOO', 142, array()), $collected);
    // - using references
    $array = array( array('foo', 42, array()), array('FOO', 142, array()) );
    $collected = ArrayUtil::collectAtDepth($array, $depth, true);
    $array[0][0] = 'bar';
    $array[0][1] *= -1;
    $array[0][2][] = true;
    $array[0][] = false;
    $array[1][0] = 'BAR';
    $array[1][1] *= -2;
    $array[1][2][] = true;
    $array[1][] = false;
    $this->assertEquals(array('bar', -42, array(true), 'BAR', -284, array(true)), $collected);

    // Depth 5
    $depth = 5;

    $array = array();
    $array[0][0][0][0][0] = '0foo';
    $array[0][0][0][0][1] = '0bar';
    $array[1][0][0][0][0] = '1foo';
    $array[1][0][0][0][1] = '1bar';
    $collected = ArrayUtil::collectAtDepth($array, $depth);
    $array[0][0][0][0][0] = '0FOO';
    $array[0][0][0][0][1] = '0BAR';
    $array[1][0][0][0][0] = '1FOO';
    $array[1][0][0][0][1] = '1BAR';
    $this->assertEquals(array('0foo', '0bar', '1foo', '1bar'), $collected);
    // - using references
    $array = array();
    $array[0][0][0][0][0] = '0foo';
    $array[0][0][0][0][1] = '0bar';
    $array[1][0][0][0][0] = '1foo';
    $array[1][0][0][0][1] = '1bar';
    $collected = ArrayUtil::collectAtDepth($array, $depth, true);
    $array[0][0][0][0][0] = '0FOO';
    $array[0][0][0][0][1] = '0BAR';
    $array[1][0][0][0][0] = '1FOO';
    $array[1][0][0][0][1] = '1BAR';
    $this->assertEquals(array('0FOO', '0BAR', '1FOO', '1BAR'), $collected);
  }

}
