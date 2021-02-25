<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO part for `notification.push.web`.
 * @see NotificationPush
 * @codeCoverageIgnore
 */
class NotificationPushWeb extends NotificationPush {

  // Nothing special, only let overriding common values

}
