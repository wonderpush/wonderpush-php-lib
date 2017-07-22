<?php

namespace WonderPush\Util;

/**
 * Utility class for time manipulation.
 */
class TimeUtil {

  private static $tzCache = array();

  private static $offsetMs = 0;

  const RFC1123 = \DateTime::RFC1123;
  const RFC850 = \DateTime::RFC850;
  const ASCTIME = 'D M j H:i:s Y';

  /**
   * @return \DateTimeZone
   */
  public static function getDateTimeZoneUTC() {
    return self::getDateTimeZone('UTC');
  }

  /**
   * @param string $timezone - ex: "UTC", "CET", "Europe/Paris", etc.
   *                           If null, uses the default timezone.
   * @return \DateTimeZone
   */
  public static function getDateTimeZone($timezone = null) {
    if ($timezone === null) {
      $timezone = date_default_timezone_get();
    }
    if (!isset(self::$tzCache[$timezone])) {
      self::$tzCache[$timezone] = new \DateTimeZone($timezone);
    }
    return self::$tzCache[$timezone];
  }

  /**
   * @param long $timeMs in milliseconds
   * @return \DateTime
   */
  public static function dateTimeFromTimeMs($timeMs) {
    return self::dateTimeFromTimestamp(intval($timeMs / 1000));
  }

  /**
   * @param integer $timestamp in seconds
   * @return \DateTime
   */
  public static function dateTimeFromTimestamp($timestamp) {
    $dt = new \DateTime('@' . $timestamp);
    return $dt->setTimezone(self::getDateTimeZoneUTC());
  }

  /**
   * @return \DateTime
   */
  public static function dateTimeNow() {
    return new \DateTime('now', self::getDateTimeZoneUTC());
  }

  public static function getTimeMs() {
    return (int)round(microtime(true) * 1000) + self::$offsetMs;
  }

  public static function date($format, $timestamp = NULL) {
    if ($timestamp === NULL) {
      $timestamp = self::time();
    }
    return date($format, $timestamp);
  }

  public static function gmdate($format, $timestamp = NULL) {
    if ($timestamp === NULL) {
      $timestamp = self::time();
    }
    return gmdate($format, $timestamp);
  }

  public static function time() {
    $time = (int)(self::getTimeMs() / 1000);
    return $time;
  }

  public static function setTimeReferenceMs($timeReferenceMs) {
    self::$offsetMs = 0;
    if ($timeReferenceMs !== 0) {
      $nowMs = self::getTimeMs();
      self::$offsetMs = $timeReferenceMs - $nowMs;
    }
  }

  /**
   * Parses an HTTP-Date, as defined in RFC 2616.
   *
   * If the given date is an int, returns it unmodified.
   * If the given date is not a string, or cannot be parsed as a date, returns false.
   *
   * @param string $date  The input date.
   * @param boolean $resortToStrtotime
   *     Resort to strtotime()'s automatic parsing if no known format worked.
   * @return int|false    The parsed timestamp, or false.
   * @see http://www.w3.org/Protocols/rfc2616/rfc2616-sec3.html#sec3.3.1
   */
  public static function parseHTTPDate($date, $resortToStrtotime = true) {
    if (is_int($date)) {
      return $date;
    } else if (!is_string($date)) {
      return null;
    }
    $utc = self::getDateTimeZoneUTC();
    $parsed = false;
    if ($parsed == false) {
      $parsed = \DateTime::createFromFormat(self::RFC1123, $date, $utc);
    }
    if ($parsed == false) {
      $parsed = \DateTime::createFromFormat(self::RFC850, $date, $utc);
    }
    if ($parsed == false) {
      $parsed = \DateTime::createFromFormat(self::ASCTIME, $date, $utc);
    }
    if ($parsed == false && $resortToStrtotime) {
      try {
        $parsed = new \DateTime($date, $utc);
      } catch (\Exception $ignored) {}
    }
    if ($parsed instanceof \DateTime) {
      $parsed = $parsed->getTimestamp();
    }
    return $parsed;
  }

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

  /**
   * @param \DateTimeInterface $dt
   * @return string
   */
  public static function dateTimeToISO8601(\DateTimeInterface $dt) {
    return $dt->format('Y-m-d\TH:i:s.') . substr($dt->format('u'), 0, 3) . $dt->format('P');
  }

  public static function getMillisecondTimestampFromDateTime($dt) {
    if (!($dt instanceof \DateTime)) return null;
    return $dt->getTimestamp() * 1000 + round(intval($dt->format('u')) / 1000);
  }

  /**
   * Generates a date according to the subset of RFC 1123, as defined in RFC 2616.
   *
   * @param int $timestamp in seconds
   * @return string
   * @see http://www.w3.org/Protocols/rfc2616/rfc2616-sec3.html#sec3.3.1
   */
  public static function formatHTTPDate($timestamp) {
    return str_replace('+0000', 'GMT', gmdate(\DateTime::RFC1123, $timestamp));
  }

  /**
   * @param string $s - a date in format Y-m-d (ex: 2014-01-15)
   * @return string - a date in format Y M d (ex: 2014 jan 15)
   */
  public static function YmdToYMd($s) {
    $parsed = \DateTime::createFromFormat('Y-m-d', $s, self::getDateTimeZoneUTC());
    return $parsed->format('Y M d');
  }

  /**
   * @param \DateTime|IntlCalendar|long $timestampOr\DateTime
   * @param string|array $format - see IntlDateFormatter::formatObject
   * @param string $locale
   * @return string
   */
  public static function localeFormat($timestampOrDateTime, $format, $locale = null) {
    if (is_numeric($timestampOrDateTime)) {
      $timestampOrDateTime = new \DateTime($timestampOrDateTime, TimeUtil::getDateTimeZoneUTC());
    }
    $timezone = null;
    $calendar = null;
    if ($timestampOrDateTime instanceof \DateTime) {
      $timezone = $timestampOrDateTime->getTimezone();
    } else if ($timestampOrDateTime instanceof IntlCalendar) {
      $timezone = $timestampOrDateTime->getTimeZone();
      $calendar = $timestampOrDateTime;
    }
    $datetype = IntlDateFormatter::FULL;
    $timetype = IntlDateFormatter::FULL;
    $pattern = null;
    if (is_string($format)) {
      $pattern = $format;
    } else if (is_array($format)) {
      list($datetype, $timetype) = $format;
    } else if (is_long($format)) {
      $datetype = $timetype = $format;
    }
    $formatter = new IntlDateFormatter($locale, $datetype, $timetype, $timezone, $calendar, $pattern);
    return $formatter->format($timestampOrDateTime);
  }

  /**
   * @param DateInterval $dateInterval
   * @return integer A TimeUnit constant, or TimeUnit::DAYS * 30 for a month and TimeUnit::DAYS * 365 for a year, or 0
   */
  public static function getSmallestTimeUnitFromDateInterval(DateInterval $dateInterval) {
    if ($dateInterval->s !== 0) {
      return TimeUnit::SECONDS;
    } else if ($dateInterval->i !== 0) {
      return TimeUnit::MINUTES;
    } else if ($dateInterval->h !== 0) {
      return TimeUnit::HOURS;
    } else if ($dateInterval->d !== 0) {
      return TimeUnit::DAYS;
    } else if ($dateInterval->m !== 0) {
      return TimeUnit::DAYS * 30;
    } else if ($dateInterval->y !== 0) {
      return TimeUnit::DAYS * 365;
    } else {
      return 0;
    }
  }

  /**
   * @param \DateTime $dateTime
   * @param integer $timeUnit A TimeUnit constant, or TimeUnit::DAYS * 30 for a month and TimeUnit::DAYS * 365 for a year, or 0
   * @return \DateTime
   */
  public static function roundDateTimeToTimeUnit(\DateTime $dateTime, $timeUnit) {
    if ($timeUnit === TimeUnit::MINUTES) {
      $toParse = $dateTime->format('Y-m-d H:i') .     ':00';
    } else if ($timeUnit === TimeUnit::HOURS) {
      $toParse = $dateTime->format('Y-m-d H') .    ':00:00';
    } else if ($timeUnit === TimeUnit::DAYS) {
      $toParse = $dateTime->format('Y-m-d') .   ' 00:00:00';
    } else if ($timeUnit === TimeUnit::DAYS * 30) {
      $toParse = $dateTime->format('Y-m') .  '-01 00:00:00';
    } else if ($timeUnit === TimeUnit::DAYS * 365) {
      $toParse = $dateTime->format('Y') . '-01-01 00:00:00';
    } else { // seconds or unrecognized units
      $toParse = $dateTime->format('Y-m-d H:i:s');
    }
    return \DateTime::createFromFormat('Y-m-d H:i:s', $toParse, $dateTime->getTimezone());
  }

  /**
   * @param \DateTime $dateTime
   * @param integer $timeUnit A TimeUnit constant, or TimeUnit::DAYS * 30 for a month and TimeUnit::DAYS * 365 for a year, or 0
   * @return \DateTime
   */
  public static function roundDateTimeToTimeSubUnit(\DateTime $dateTime, $timeUnit) {
    // Shift units
    if ($timeUnit === TimeUnit::HOURS) {
      $timeUnit = TimeUnit::MINUTES;
    } else if ($timeUnit === TimeUnit::DAYS) {
      $timeUnit = TimeUnit::HOURS;
    } else if ($timeUnit === TimeUnit::DAYS * 30) {
      $timeUnit = TimeUnit::DAYS;
    } else if ($timeUnit === TimeUnit::DAYS * 365) {
      $timeUnit = TimeUnit::DAYS * 30;
    } else { // minutes, seconds or unrecognized units
      $timeUnit = TimeUnit::SECONDS;
    }
    // The round normally
    return self::roundDateTimeToTimeUnit($dateTime, $timeUnit);
  }

}
