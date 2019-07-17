<?php

namespace WonderPush\Util;

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
   * @param type $value The amount of time.
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
   * @param \WonderPush\Util\TimeValue $other The other time value to compare to
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

    return $cmp == 0 ? 0 : ($cmp < 0 ? -1 : 1);
  }

  /**
   * Return a short human readable representation of this object, suitable for further parsing.
   * @return string
   * @see parse()
   */
  public function __toString() {
    $labels = TimeUnit::getUnitLabels($this->unit);
    $label = $labels[0];
    if (strlen($label) > 2) $label = ' ' . $label;
    return $this->value . $label;
  }

  /**
   * Parses a number with an optional unit into a time value.
   * @param string|integer|float|TimeValue $value
   * @param integer $defaultUnit A `\WonderPush\Util\TimeUnit` unit constant.
   * @return \WonderPush\Util\TimeValue|null
   */
  public static function parse($value, $defaultUnit = TimeUnit::MILLISECONDS) {
    if (is_string($value) && preg_match('/^\s*([+-]?[\d\.]+([eE][+-]?[\d]+)?)\s*([a-zA-Z]*)?\s*$/', $value, $matches)) {
      $value = floatval($matches[1]);
      $label = $matches[3];
      $unit  = TimeUnit::labelToUnit($label);
      if (null === $unit) {
        if (null === $defaultUnit) {
          return null;
        }
        $unit = $defaultUnit;
      }
      return new TimeValue($value, $unit);
    } else if (is_numeric($value)) {
      return new TimeValue($value, $defaultUnit);
    } else if ($value instanceof TimeValue) {
      return $value;
    } else {
      return null;
    }
  }

  ///
  /// Factory methods
  ///

  /**
   * Returns a time value with the given amount of nanoseconds.
   * @param integer|float $value
   * @return \WonderPush\Util\TimeValue
   */
  public static function Nanoseconds($value) {
    return new TimeValue($value, TimeUnit::NANOSECONDS);
  }

  /**
   * Returns a time value with the given amount of microseconds.
   * @param integer|float $value
   * @return \WonderPush\Util\TimeValue
   */
  public static function Microseconds($value) {
    return new TimeValue($value, TimeUnit::MICROSECONDS);
  }

  /**
   * Returns a time value with the given amount of milliseconds.
   * @param integer|float $value
   * @return \WonderPush\Util\TimeValue
   */
  public static function Milliseconds($value) {
    return new TimeValue($value, TimeUnit::MILLISECONDS);
  }

  /**
   * Returns a time value with the given amount of seconds.
   * @param integer|float $value
   * @return \WonderPush\Util\TimeValue
   */
  public static function Seconds($value) {
    return new TimeValue($value, TimeUnit::SECONDS);
  }

  /**
   * Returns a time value with the given amount of minutes.
   * @param integer|float $value
   * @return \WonderPush\Util\TimeValue
   */
  public static function Minutes($value) {
    return new TimeValue($value, TimeUnit::MINUTES);
  }

  /**
   * Returns a time value with the given amount of hours.
   * @param integer|float $value
   * @return \WonderPush\Util\TimeValue
   */
  public static function Hours($value) {
    return new TimeValue($value, TimeUnit::HOURS);
  }

  /**
   * Returns a time value with the given amount of days.
   * @param integer|float $value
   * @return \WonderPush\Util\TimeValue
   */
  public static function Days($value) {
    return new TimeValue($value, TimeUnit::DAYS);
  }

  /**
   * Returns a time value with the given amount of weeks.
   * @param integer|float $value
   * @return \WonderPush\Util\TimeValue
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
   * @return TimeValue
   */
  public function toNanoseconds() {
    return $this->to(TimeUnit::NANOSECONDS);
  }

  /**
   * Returns the time value amount expressed in microseconds.
   * @return TimeValue
   */
  public function toMicroseconds() {
    return $this->to(TimeUnit::MICROSECONDS);
  }

  /**
   * Returns the time value amount expressed in milliseconds.
   * @return TimeValue
   */
  public function toMilliseconds() {
    return $this->to(TimeUnit::MILLISECONDS);
  }

  /**
   * Returns the time value amount expressed in seconds.
   * @return TimeValue
   */
  public function toSeconds() {
    return $this->to(TimeUnit::SECONDS);
  }

  /**
   * Returns the time value amount expressed in minutes.
   * @return TimeValue
   */
  public function toMinutes() {
    return $this->to(TimeUnit::MINUTES);
  }

  /**
   * Returns the time value amount expressed in hours.
   * @return TimeValue
   */
  public function toHours() {
    return $this->to(TimeUnit::HOURS);
  }

  /**
   * Returns the time value amount expressed in days.
   * @return TimeValue
   */
  public function toDays() {
    return $this->to(TimeUnit::DAYS);
  }

  /**
   * Returns the time value amount expressed in weeks.
   * @return TimeValue
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
      if (self::isIntegerValue($weeks) || $weeks > 1) {
        return TimeUnit::WEEKS;
      }
    }
    if ($seconds >= TimeUnit::DAYS) {
      $days = $this->toDays();
      if (self::isIntegerValue($days) || $days > 1) {
        return TimeUnit::DAYS;
      }
    }
    if ($seconds >= TimeUnit::HOURS) {
      $hours = $this->toHours();
      if (self::isIntegerValue($hours) || $hours > 1) {
        return TimeUnit::HOURS;
      }
    }
    if ($seconds >= TimeUnit::MINUTES) {
      $min = $this->toMinutes();
      if (self::isIntegerValue($min) || $min > 1) {
        return TimeUnit::MINUTES;
      }
    }
    if ($seconds >= TimeUnit::SECONDS) {
      if (self::isIntegerValue($seconds) || $seconds > 1) {
        return TimeUnit::SECONDS;
      }
    }
    if ($seconds >= TimeUnit::MILLISECONDS) {
      $ms = $this->toMilliseconds();
      if (self::isIntegerValue($ms) || $ms > 1) {
        return TimeUnit::MILLISECONDS;
      }
    }
    if ($seconds >= TimeUnit::MICROSECONDS) {
      $us = $this->toMicroseconds();
      if (self::isIntegerValue($us) || $us > 1) {
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
      if (self::isIntegerValue($weeks) || ($rounded && $weeks > 1)) {
        return round($weeks).($short ? 'w' : ' weeks');
      }
    }
    if ($seconds >= TimeUnit::DAYS) {
      $days = $this->toDays();
      if (self::isIntegerValue($days) || ($rounded && $days > 1)) {
        return round($days).($short ? 'd' : ' days');
      }
    }
    if ($seconds >= TimeUnit::HOURS) {
      $hours = $this->toHours();
      if (self::isIntegerValue($hours) || ($rounded && $hours > 1)) {
        return round($hours).($short ? 'h' : ' hours');
      }
    }
    if ($seconds >= TimeUnit::MINUTES) {
      $min = $this->toMinutes();
      if (self::isIntegerValue($min) || ($rounded && $min > 1)) {
        return round($min).($short ? 'm' : ' min');
      }
    }
    if ($seconds >= TimeUnit::SECONDS) {
      if (self::isIntegerValue($seconds) || ($rounded && $seconds > 1)) {
        return round($seconds).($short ? 's' : ' sec');
      }
    }
    if ($seconds >= 10e-3) {
      $ms = $this->toMilliseconds();
      if (self::isIntegerValue($ms) || ($rounded && $ms > 1)) {
        return round($ms).($short ? 'ms' : ' ms');
      }
    }
    if ($seconds >= 10e-6) {
      $us = $this->toMicroseconds();
      if (self::isIntegerValue($us) || ($rounded && $us > 1)) {
        return round($us).($short ? 'us' : ' us');
      }
    }
    $ns = $this->toNanoseconds();
    return $ns.($short ? 'ns' : ' ns');
  }

}
