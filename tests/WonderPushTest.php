<?php

namespace WonderPush;

class WonderPushTest extends TestCase {

  const WONDERPUSHDEMO_ACCESS_TOKEN = 'NTcxNmYzNjJiNTkyYzhmYjZmNzA2ZDA1ZjFmYTU1NTFhZmFlMzg2YTc4MmM3OGE5YTI0YjNiMzRhZDMwNDY5Yg';
  const WONDERPUSHDEMO_APPLICATION_ID = '01906i1feoq2cu1p';

  protected $wp;

  /**
   * @return WonderPush
   */
  public static function getWonderPush() {
    return new WonderPush(self::WONDERPUSHDEMO_ACCESS_TOKEN, self::WONDERPUSHDEMO_APPLICATION_ID);
  }

  protected function setUp() {
    $this->wp = self::getWonderPush();
  }

  public function testInstantiation() {
    $this->assertInstanceOf('WonderPush\WonderPush', $this->wp);
  }

}
