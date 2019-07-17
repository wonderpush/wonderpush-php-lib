<?php

namespace WonderPush\Net;

/**
 * Interface of an HTTP client.
 */
interface HttpClientInterface {

  /**
   * Perform an HTTP call and return the response.
   * @param Request $request
   * @return Response
   */
  public function execute(Request $request);

}
