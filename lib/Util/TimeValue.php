<?php

namespace WonderPush\Util;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * Time duration representation and conversion.
 */
class TimeValue {

  /**
   * The amount of time.
   * @var integer|float
   */
  public $value;

  /**
   * The unit the amount of time is expressed into.
   * @var integer A `\WonderPush\Util\TimeUnit` unit constant.
   * @see TimeUnit
   */
  public $unit;

  /**
   * Asserts the given value is valid.
   * @param mixed $value
   */
  public static function assertValidValue($value) {
    assert(is_int($value) || is_float($value));
  }

  /**
   * Returns whether a given value has no decimals.
   * @param integer|float $value
   * @return boolean
   */
  private static function isIntegerValue($value) {
    // FIXME : the result of fmod may be in [-0.000001, +0.000001] because of float precision
    return is_int($value) || (fmod($value, 1) === 0.);
  }

  /**
   * Construct a new amount of time representation.
   * @param integer|float $value The amount of time.
   * @param integer $unit A `\WonderPush\Util\TimeUnit` unit constant.
   */
  public function __construct($value, $unit) {
    self::assertValidValue($value);
    TimeUnit::assertValidUnit($unit);
    $this->value = $value;
    $this->unit = $unit;
  }

  /**
   * Compares the object to another time value.
   * @param TimeValue $other The other time value to compare to
   * @return integer `-1`, `0` or `1` respectively if the object is less, equal or greater than the given argument.
   */
  public function compareTo(TimeValue $other) {
    if ($this->unit === $other->unit) {
      $cmp = $this->value - $other->value;
    } else if ($this->unit < $other->unit) {
      $cmp = $this->value - $other->to($this->unit);
    } else {
      $cmp = $this->to($other->unit) - $other->value;
    }

    if ($cmp === 0) {
      return 0;
    }
    return $cmp < 0 ? -1 : 1;
  }

  /**
   * Return a short human readable representation of this object, suitable for further parsing.
   * @return string
   * @see parse()
   */
  public function __toString() {
    $labels = TimeUnit::getUnitLabels($this->unit);
    $label = $labels[0];
    if (strlen($label) > 2) {
      $label = ' ' . $label;
    }
    return $this->value . $label;
  }

  /**
   * Parses a number with an optional unit into a time value.
   * @param string|integer|float|TimeValue $value
   * @param integer $defaultUnit A `\WonderPush\Util\TimeUnit` unit constant.
   * @return TimeValue|null
   */
  public static function parse($value, $defaultUnit = TimeUnit::MILLISECONDS) {
    if (is_string($value) && preg_match('/^\s*([+-]?[\d\.]+([eE][+-]?[\d]+)?)\s*([a-zA-Z]*)?\s*$/', $value, $matches)) {
      $value = (float)$matches[1];
      $label = $matches[3];
      $unit  = TimeUnit::labelToUnit($label);
      if (null === $unit) {
        if (null === $defaultUnit) {
          return null;
        }
        $unit = $defaultUnit;
      }
      return new TimeValue($value, $unit);
    }
    if (is_numeric($value)) {
      return new TimeValue($value, $defaultUnit);
    }
    if ($value instanceof self) {
      return $value;
    }
    return null;
  }

  ///
  /// Factory methods
  ///

  /**
   * Returns a time value with the given amount of nanoseconds.
   * @param integer|float $value
   * @return TimeValue
   */
  public static function Nanoseconds($value) {
    return new TimeValue($value, TimeUnit::NANOSECONDS);
  }

  /**
   * Returns a time value with the given amount of microseconds.
   * @param integer|float $value
   * @return TimeValue
   */
  public static function Microseconds($value) {
    return new TimeValue($value, TimeUnit::MICROSECONDS);
  }

  /**
   * Returns a time value with the given amount of milliseconds.
   * @param integer|float $value
   * @return TimeValue
   */
  public static function Milliseconds($value) {
    return new TimeValue($value, TimeUnit::MILLISECONDS);
  }

  /**
   * Returns a time value with the given amount of seconds.
   * @param integer|float $value
   * @return TimeValue
   */
  public static function Seconds($value) {
    return new TimeValue($value, TimeUnit::SECONDS);
  }

  /**
   * Returns a time value with the given amount of minutes.
   * @param integer|float $value
   * @return TimeValue
   */
  public static function Minutes($value) {
    return new TimeValue($value, TimeUnit::MINUTES);
  }

  /**
   * Returns a time value with the given amount of hours.
   * @param integer|float $value
   * @return TimeValue
   */
  public static function Hours($value) {
    return new TimeValue($value, TimeUnit::HOURS);
  }

  /**
   * Returns a time value with the given amount of days.
   * @param integer|float $value
   * @return TimeValue
   */
  public static function Days($value) {
    return new TimeValue($value, TimeUnit::DAYS);
  }

  /**
   * Returns a time value with the given amount of weeks.
   * @param integer|float $value
   * @return TimeValue
   */
  public static function Weeks($value) {
    return new TimeValue($value, TimeUnit::WEEKS);
  }

  ///
  /// Convertion methods
  ///

  /**
   * Converts the time value into another time value using the desired unit.
   * @param integer $toUnit A `\WonderPush\Util\TimeUnit` unit constant.
   * @return TimeValue
   */
  public function convert($toUnit) {
    return new TimeValue($this->to($toUnit), $toUnit);
  }

  /**
   * Returns the time value amount expressed in the desired unit.
   * @param integer $toUnit A `\WonderPush\Util\TimeUnit` unit constant.
   * @return integer|float
   */
  public function to($toUnit) {
    return TimeUnit::convert($this->value, $this->unit, $toUnit);
  }

  /**
   * Returns the time value amount expressed in nanoseconds.
   * @return integer|float
   */
  public function toNanoseconds() {
    return $this->to(TimeUnit::NANOSECONDS);
  }

  /**
   * Returns the time value amount expressed in microseconds.
   * @return integer|float
   */
  public function toMicroseconds() {
    return $this->to(TimeUnit::MICROSECONDS);
  }

  /**
   * Returns the time value amount expressed in milliseconds.
   * @return integer|float
   */
  public function toMilliseconds() {
    return $this->to(TimeUnit::MILLISECONDS);
  }

  /**
   * Returns the time value amount expressed in seconds.
   * @return integer|float
   */
  public function toSeconds() {
    return $this->to(TimeUnit::SECONDS);
  }

  /**
   * Returns the time value amount expressed in minutes.
   * @return integer|float
   */
  public function toMinutes() {
    return $this->to(TimeUnit::MINUTES);
  }

  /**
   * Returns the time value amount expressed in hours.
   * @return integer|float
   */
  public function toHours() {
    return $this->to(TimeUnit::HOURS);
  }

  /**
   * Returns the time value amount expressed in days.
   * @return integer|float
   */
  public function toDays() {
    return $this->to(TimeUnit::DAYS);
  }

  /**
   * Returns the time value amount expressed in weeks.
   * @return integer|float
   */
  public function toWeeks() {
    return $this->to(TimeUnit::WEEKS);
  }

  /**
   * Returns the most appropriate time unit to express the time value.
   * @return integer A `\WonderPush\Util\TimeUnit` unit constant.
   */
  public function getHumanUnit() {
    $seconds = $this->toSeconds();
    if ($seconds >= TimeUnit::WEEKS) {
      $weeks = $this->toWeeks();
      if ($weeks > 1 || self::isIntegerValue($weeks)) {
        return TimeUnit::WEEKS;
      }
    }
    if ($seconds >= TimeUnit::DAYS) {
      $days = $this->toDays();
      if ($days > 1 || self::isIntegerValue($days)) {
        return TimeUnit::DAYS;
      }
    }
    if ($seconds >= TimeUnit::HOURS) {
      $hours = $this->toHours();
      if ($hours > 1 || self::isIntegerValue($hours)) {
        return TimeUnit::HOURS;
      }
    }
    if ($seconds >= TimeUnit::MINUTES) {
      $min = $this->toMinutes();
      if ($min > 1 || self::isIntegerValue($min)) {
        return TimeUnit::MINUTES;
      }
    }
    if ($seconds >= TimeUnit::SECONDS) {
      if ($seconds > 1 || self::isIntegerValue($seconds)) {
        return TimeUnit::SECONDS;
      }
    }
    if ($seconds >= TimeUnit::MILLISECONDS) {
      $ms = $this->toMilliseconds();
      if ($ms > 1 || self::isIntegerValue($ms)) {
        return TimeUnit::MILLISECONDS;
      }
    }
    if ($seconds >= TimeUnit::MICROSECONDS) {
      $us = $this->toMicroseconds();
      if ($us > 1 || self::isIntegerValue($us)) {
        return TimeUnit::MICROSECONDS;
      }
    }
    return TimeUnit::NANOSECONDS;
  }

  /**
   * Formats the time value into a human readable representation, suitable for parsing.
   * @param array $options
   *    Available keys:
   *
   *    * `short` (boolean, default `false`): Use a 1-2 letter unit
   *    * `round` (boolean, default `false`): Round to the nearest integer.
   * @return string
   */
  public function toHumanUnit($options = array()) {
    $short   = ArrayUtil::getIfSet($options, 'short', false);
    $rounded = ArrayUtil::getIfSet($options, 'round', false);

    $seconds = $this->toSeconds();
    if ($seconds >= TimeUnit::WEEKS) {
      $weeks = $this->toWeeks();
      if (($rounded && $weeks > 1) || self::isIntegerValue($weeks)) {
        return round($weeks).($short ? 'w' : ' weeks');
      }
    }
    if ($seconds >= TimeUnit::DAYS) {
      $days = $this->toDays();
      if (($rounded && $days > 1) || self::isIntegerValue($days)) {
        return round($days).($short ? 'd' : ' days');
      }
    }
    if ($seconds >= TimeUnit::HOURS) {
      $hours = $this->toHours();
      if (($rounded && $hours > 1) || self::isIntegerValue($hours)) {
        return round($hours).($short ? 'h' : ' hours');
      }
    }
    if ($seconds >= TimeUnit::MINUTES) {
      $min = $this->toMinutes();
      if (($rounded && $min > 1) || self::isIntegerValue($min)) {
        return round($min).($short ? 'm' : ' min');
      }
    }
    if ($seconds >= TimeUnit::SECONDS) {
      if (($rounded && $seconds > 1) || self::isIntegerValue($seconds)) {
        return round($seconds).($short ? 's' : ' sec');
      }
    }
    if ($seconds >= 10e-3) {
      $ms = $this->toMilliseconds();
      if (($rounded && $ms > 1) || self::isIntegerValue($ms)) {
        return round($ms).($short ? 'ms' : ' ms');
      }
    }
    if ($seconds >= 10e-6) {
      $us = $this->toMicroseconds();
      if (($rounded && $us > 1) || self::isIntegerValue($us)) {
        return round($us).($short ? 'us' : ' us');
      }
    }
    $ns = $this->toNanoseconds();
    return $ns.($short ? 'ns' : ' ns');
  }

}
