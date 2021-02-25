<?php

namespace WonderPush\Net;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

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
