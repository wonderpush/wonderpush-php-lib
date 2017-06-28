<?php

namespace WonderPush;

class WonderPushTest extends TestCase {

  const WONDERPUSHDEMO_ACCESS_TOKEN = 'NTcxNmYzNjJiNTkyYzhmYjZmNzA2ZDA1ZjFmYTU1NTFhZmFlMzg2YTc4MmM3OGE5YTI0YjNiMzRhZDMwNDY5Yg';
  const WONDERPUSHDEMO_APPLICATION_ID = '01906i1feoq2cu1p';

  public function testInstantiation() {
    $sdk = new WonderPush(self::WONDERPUSHDEMO_ACCESS_TOKEN, self::WONDERPUSHDEMO_APPLICATION_ID);
    $this->assertInstanceOf('WonderPush\WonderPush', $sdk);
  }

}
