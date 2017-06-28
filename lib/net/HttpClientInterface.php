<?php

namespace WonderPush\Net;

/**
 * Interface of an HTTP client.
 */
interface HttpClientInterface {

  /**
   * Perform an HTTP call and return the response.
   * @param \WonderPush\Net\Request $request
   * @return \WonderPush\Net\Response
   */
  public function execute(Request $request);

}
