<?php

namespace WonderPush\Net;

class ResponseTest extends \WonderPush\TestCase {

  public function testParsingResetsOnSetRawBody() {
    $response = new Response();
    $this->assertAttributeEquals(null, 'isParsed', $response);
    $response->setRawBody('{"foo":"bar"}');
    $this->assertAttributeEquals(null, 'isParsed', $response);
    $expected = new \stdClass();
    $expected->foo = 'bar';
    $this->assertEquals($expected, $response->parsedBody());
    $this->assertAttributeEquals(true, 'isParsed', $response);

    $response->setRawBody('{"foo":"qux"}');
    $this->assertAttributeEquals(null, 'isParsed', $response);
    $expected = new \stdClass();
    $expected->foo = 'qux';
    $this->assertEquals($expected, $response->parsedBody());
    $this->assertAttributeEquals(true, 'isParsed', $response);
  }

  public function testParseErrorParsesObjectAndResetsOnSetRawBody() {
    $response = new Response();
    $this->assertAttributeEquals(null, 'isParsed', $response);
    $response->setRawBody('{"foo":"bar"}');
    $this->assertAttributeEquals(null, 'isParsed', $response);
    $this->assertEquals(JSON_ERROR_NONE, $response->parseError());
    $this->assertAttributeEquals(true, 'isParsed', $response);

    $response->setRawBody('#');
    $this->assertAttributeEquals(null, 'isParsed', $response);
    $parseError = $response->parseError();
    $this->assertInstanceOf('\WonderPush\Errors\Parsing', $parseError);
    /** @var $parseError \WonderPush\Errors\Parsing */
    $this->assertEquals(JSON_ERROR_SYNTAX, $parseError->getJsonErrorCode());
    $this->assertAttributeEquals(true, 'isParsed', $response);
  }

  public function testParseErrorMsgParsesObjectAndResetsOnSetRawBody() {
    $response = new Response();
    $this->assertAttributeEquals(null, 'isParsed', $response);
    $response->setRawBody('{"foo":"bar"}');
    $this->assertAttributeEquals(null, 'isParsed', $response);
    $this->assertNull($response->parseError());
    $this->assertAttributeEquals(true, 'isParsed', $response);

    $response->setRawBody('#');
    $this->assertAttributeEquals(null, 'isParsed', $response);
    $this->assertInstanceOf('\WonderPush\Errors\Parsing', $response->parseError()); // "Syntax error" / "unexpected character"
    $this->assertAttributeEquals(true, 'isParsed', $response);
  }

  public function testParseJsonObject() {
    $response = Response::_new()
        ->setRawBody('{"foo":"bar"}');
    $expected = new \stdClass();
    $expected->foo = 'bar';
    $this->assertEquals($expected, $response->parsedBody());
  }

  public function testParseJsonEmptyObjectAsObject() {
    $response = Response::_new()
        ->setRawBody('{}');
    $this->assertNotEquals(array(), $response->parsedBody());
    $this->assertEquals(new \stdClass(), $response->parsedBody());
  }

  public function testParseJsonArray() {
    $response = Response::_new()
        ->setRawBody('[]');
    $this->assertEquals(array(), $response->parsedBody());
  }

  public function testParseJsonBool() {
    $response = Response::_new()
        ->setRawBody('true');
    $this->assertEquals(true, $response->parsedBody());
  }

  public function testParseJsonString() {
    $response = Response::_new()
        ->setRawBody('"foo"');
    $this->assertEquals('foo', $response->parsedBody());
  }

}
