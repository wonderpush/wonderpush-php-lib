<?php

namespace WonderPush\Util;

class UrlUtilTest extends \WonderPush\TestCase {

  public function testParseQueryStringEmpty() {
    $this->assertEquals(array(), UrlUtil::parseQueryString(null));
    $this->assertEquals(array(), UrlUtil::parseQueryString(array()));
    $this->assertEquals(array(), UrlUtil::parseQueryString(''));

    $this->assertNotEquals(array(), UrlUtil::parseQueryString('='));
  }

  public function testParseQueryStringArray() {
    $this->assertEquals(array(), UrlUtil::parseQueryString(array()));
    $this->assertEquals(array(0), UrlUtil::parseQueryString(array(0)));
    $this->assertEquals(array('foo' => 'bar'), UrlUtil::parseQueryString(array('foo' => 'bar')));
  }

  public function testParseQueryString() {
    $this->assertEquals(array('a' => 'A'), UrlUtil::parseQueryString('a=A'));
    $this->assertEquals(array('a' => 'A', 'b' => 'B'), UrlUtil::parseQueryString('a=A&b=B'));
  }

  public function testParseQueryStringEncoding() {
    $this->assertEquals(array('equal' => '='), UrlUtil::parseQueryString('equal=%3D'));
    $this->assertEquals(array('space' => ' '), UrlUtil::parseQueryString('space=+'));
    $this->assertEquals(array('space' => ' '), UrlUtil::parseQueryString('space=%20'));
    $this->assertEquals(array('unencoded' => 'a=b'), UrlUtil::parseQueryString('unencoded=a=b'));
    $this->assertEquals(array('wicked=key&a=b' => 'wicked=value&c=d'), UrlUtil::parseQueryString('wicked%3Dkey%26a%3Db=wicked%3Dvalue%26c%3Dd'));
  }

  public function testReplaceQueryStringInUrlWithNullOrEmptyArray() {
    $this->assertEquals('foo//bar', UrlUtil::replaceQueryStringInUrl('foo//bar', null));
    $this->assertEquals('foo//bar', UrlUtil::replaceQueryStringInUrl('foo//bar', array()));
    $this->assertEquals('foo//bar', UrlUtil::replaceQueryStringInUrl('foo//bar?', null));
    $this->assertEquals('foo//bar', UrlUtil::replaceQueryStringInUrl('foo//bar?', array()));
    $this->assertEquals('foo//bar', UrlUtil::replaceQueryStringInUrl('foo//bar?a=b', null));
    $this->assertEquals('foo//bar', UrlUtil::replaceQueryStringInUrl('foo//bar?a=b', array()));
    $this->assertEquals('foo//bar', UrlUtil::replaceQueryStringInUrl('foo//bar?a=b&c=d', null));
    $this->assertEquals('foo//bar', UrlUtil::replaceQueryStringInUrl('foo//bar?a=b&c=d', array()));
  }

  public function testReplaceQueryStringInUrl() {
    $this->assertEquals('foo//bar?a=A&b=B', UrlUtil::replaceQueryStringInUrl('foo//bar', array('a' => 'A', 'b' => 'B')));
    $this->assertEquals('foo//bar?a=A&b=B', UrlUtil::replaceQueryStringInUrl('foo//bar?', array('a' => 'A', 'b' => 'B')));
    $this->assertEquals('foo//bar?a=A&b=B', UrlUtil::replaceQueryStringInUrl('foo//bar?a=b', array('a' => 'A', 'b' => 'B')));
    $this->assertEquals('foo//bar?a=A&b=B', UrlUtil::replaceQueryStringInUrl('foo//bar?a=b&c=d', array('a' => 'A', 'b' => 'B')));
    $this->assertEquals('https://host.ext/some/path?a=A&b=B', UrlUtil::replaceQueryStringInUrl('https://host.ext/some/path', array('a' => 'A', 'b' => 'B')));
  }

  public function testReplaceQueryStringInUrlEncoding() {
    $this->assertEquals('foo//bar?equal=%3D', UrlUtil::replaceQueryStringInUrl('foo//bar', array('equal' => '=')));
    if (defined('PHP_QUERY_RFC3986')) {
      $this->assertEquals('foo//bar?space=%20', UrlUtil::replaceQueryStringInUrl('foo//bar', array('space' => ' ')));
    } else {
      $this->assertEquals('foo//bar?space=+', UrlUtil::replaceQueryStringInUrl('foo//bar', array('space' => ' ')));
    }
    $this->assertEquals('foo//bar?wicked%3Dkey%26a%3Db=wicked%3Dvalue%26c%3Dd', UrlUtil::replaceQueryStringInUrl('foo//bar', array('wicked=key&a=b' => 'wicked=value&c=d')));
  }

}
