<?php

namespace WonderPush\Util;

/**
 * Time duration representation and conversion.
 */
class TimeValue {

  public $value;
  public $unit;

  public static function assertValidValue($unit) {
    assert(is_int($unit) || is_float($unit));
  }

  private static function isIntegerValue($value) {
    // FIXME : the result of fmod may be in [-0.000001, +0.000001] because of float precision
    return is_int($value) || (fmod($value, 1) === 0.);
  }

  public function __construct($value, $unit) {
    self::assertValidValue($value);
    TimeUnit::assertValidUnit($unit);
    $this->value = $value;
    $this->unit = $unit;
  }

  public function compareTo($other) {
    assert($other instanceof TimeValue);

    if ($this->unit === $other->unit) {
      $cmp = $this->value - $other->value;
    } else if ($this->unit < $other->unit) {
      $cmp = $this->value - $other->to($this->unit);
    } else {
      $cmp = $this->to($other->unit) - $other->value;
    }

    return $cmp == 0 ? 0 : ($cmp < 0 ? -1 : 1);
  }

  public function __toString() {
    $labels = TimeUnit::getUnitLabels($this->unit);
    $label = $labels[0];
    if (strlen($label) > 2) $label = ' ' . $label;
    return $this->value . $label;
  }

  public static function parse($value, $defaultUnit = TimeUnit::MILLISECONDS) {
    if (is_string($value) && preg_match("/^\s*([+-]?[0-9\.]+([eE][+-]?[0-9]+)?)\s*([a-zA-Z]*)?\s*$/", $value, $matches)) {
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

  public static function Nanoseconds($value) {
    return new TimeValue($value, TimeUnit::NANOSECONDS);
  }

  public static function Microseconds($value) {
    return new TimeValue($value, TimeUnit::MICROSECONDS);
  }

  public static function Milliseconds($value) {
    return new TimeValue($value, TimeUnit::MILLISECONDS);
  }

  public static function Seconds($value) {
    return new TimeValue($value, TimeUnit::SECONDS);
  }

  public static function Minutes($value) {
    return new TimeValue($value, TimeUnit::MINUTES);
  }

  public static function Hours($value) {
    return new TimeValue($value, TimeUnit::HOURS);
  }

  public static function Days($value) {
    return new TimeValue($value, TimeUnit::DAYS);
  }

  public static function Weeks($value) {
    return new TimeValue($value, TimeUnit::WEEKS);
  }

  ///
  /// Convertion methods
  ///

  public function to($toUnit) {
    return TimeUnit::convert($this->value, $this->unit, $toUnit);
  }

  public function convert($toUnit) {
    return new TimeValue($this->to($toUnit), $toUnit);
  }

  public function toNanoseconds() {
    return $this->to(TimeUnit::NANOSECONDS);
  }

  public function toMicroseconds() {
    return $this->to(TimeUnit::MICROSECONDS);
  }

  public function toMilliseconds() {
    return $this->to(TimeUnit::MILLISECONDS);
  }

  public function toSeconds() {
    return $this->to(TimeUnit::SECONDS);
  }

  public function toMinutes() {
    return $this->to(TimeUnit::MINUTES);
  }

  public function toHours() {
    return $this->to(TimeUnit::HOURS);
  }

  public function toDays() {
    return $this->to(TimeUnit::DAYS);
  }

  public function toWeeks() {
    return $this->to(TimeUnit::WEEKS);
  }

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
   * @param array $options 'short' (bool-false) : display short unit
   *                       'rounded' (bool-false) : find an approximate value
   */
  public function toHumanUnit($options = array()) {
    $short   = ArrayUtil::getIfSet($options, 'short', false);
    $rounded = ArrayUtil::getIfSet($options, 'rounded', false);

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
    if ($seconds >= TimeUnit::MILLISECONDS) {
      $ms = $this->toMilliseconds();
      if (self::isIntegerValue($ms) || ($rounded && $ms > 1)) {
        return round($ms).($short ? 'ms' : ' ms');
      }
    }
    if ($seconds >= TimeUnit::MICROSECONDS) {
      $us = $this->toMicroseconds();
      if (self::isIntegerValue($us) || ($rounded && $us > 1)) {
        return round($us).($short ? 'us' : ' us');
      }
    }
    $ns = $this->toNanoseconds();
    return $ns.($short ? 'ns' : ' ns');
  }


}
