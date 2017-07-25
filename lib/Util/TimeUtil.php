<?php

namespace WonderPush\Util;

/**
 * Utility class for time manipulation.
 */
class TimeUtil {

  /**
   * @param string $str
   * @return \DateTime
   */
  public static function parseISO8601DateOptionalTime($str) {
    // Parse parts
    $rtn = preg_match('/^(\d\d\d\d(?:-\d\d(?:-\d\d)?)?)(?:T(\d\d(?::\d\d(?::\d\d(?:.\d\d\d)?)?)?))?(Z|[+-]\d\d(?::\d\d(?::\d\d(?:.\d\d\d)?)?)?)?$/', $str, $matches);
    if ($rtn !== 1) return null;
    $date = $matches[1];
    $time = ArrayUtil::getIfSet($matches, 2, '');
    $offset = ArrayUtil::getIfSet($matches, 3, '');
    // Fill parts to default unspecified items
    $date .= substr('1970-01-01', strlen($date));
    $time .= substr('00:00:00.000000', strlen($time));
    if ($offset === 'Z') $offset = '';
    $offset .= substr('+00:00', strlen($offset));
    $offset = substr($offset, 0, 6); // second.milliseconds are not supported by the parser
    // Create fully specified date
    $str = $date . 'T' . $time . $offset;
    // Parse the date
    $parsed = \DateTime::createFromFormat('Y-m-d\TH:i:s.uP', $str);
    if ($parsed === false) $parsed = null;
    return $parsed;
  }

  public static function getMillisecondTimestampFromDateTime($dt) {
    if (!($dt instanceof \DateTime)) return null;
    return $dt->getTimestamp() * 1000 + round(intval($dt->format('u')) / 1000);
  }

}
