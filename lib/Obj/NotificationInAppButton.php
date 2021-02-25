<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO part for `notification.inApp.buttons` items.
 * @see NotificationInApp
 * @codeCoverageIgnore
 */
class NotificationInAppButton extends NotificationButton {

  // Nothing to add

}
