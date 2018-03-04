<?php

namespace Colorize;

// See https://en.wikipedia.org/wiki/ANSI_escape_code

class Colored
{
  /**
   * @internal
   */
  static function instance() {
    static $instance = null;
    if (!$instance) {
      $instance = new Colored();
    }
    return $instance;
  }

  private function __construct() {
    $this->set('');
  }

  /**
   * @internal
   */
  function set($str) {
    $this->str = $str;
    $this->fg = null;
    $this->bg = null;
    $this->format = [];
    return $this;
  }

  function off() {
    // TODO: $this->styles = [];
    return $this;
  }

  function light() {
    $this->format []= self::ANSI_LIGHT;
    return $this;
  }

  function dark() {
    $this->format []= self::ANSI_DARK;
    return $this;
  }

  function italic() {
    $this->format []= self::ANSI_ITALIC;
    return $this;
  }

  function underline() {
    $this->format []= self::ANSI_UNDERLINE;
    return $this;
  }

  function blink() {
    $this->format []= self::ANSI_BLINK;
    return $this;
  }

  function swap() {
    $this->format []= self::ANSI_SWAP;
    return $this;
  }

  function hide() {
    $this->format []= self::ANSI_HIDE;
    return $this;
  }

  function show() {
    $this->format []= self::ANSI_SHOW;
    return $this;
  }

  function black() {
    $this->fg = self::ANSI_BLACK;
    return $this;
  }

  function red() {
    $this->fg = self::ANSI_RED;
    return $this;
  }

  function green() {
    $this->fg = self::ANSI_GREEN;
    return $this;
  }

  function yellow() {
    $this->fg = self::ANSI_YELLOW;
    return $this;
  }

  function blue() {
    $this->fg = self::ANSI_BLUE;
    return $this;
  }

  function magenta() {
    $this->fg = self::ANSI_MAGENTA;
    return $this;
  }

  function cyan() {
    $this->fg = self::ANSI_CYAN;
    return $this;
  }

  function white() {
    $this->fg = self::ANSI_WHITE;
    return $this;
  }

  function standard() {
    $this->fg = self::ANSI_DEFAULT;
    return $this;
  }

  function onBlack() {
    $this->bg = self::ANSI_BLACK;
    return $this;
  }

  function onRed() {
    $this->bg = self::ANSI_RED;
    return $this;
  }

  function onGreen() {
    $this->bg = self::ANSI_GREEN;
    return $this;
  }

  function onYellow() {
    $this->bg = self::ANSI_YELLOW;
    return $this;
  }

  function onBlue() {
    $this->bg = self::ANSI_BLUE;
    return $this;
  }

  function onMagenta() {
    $this->bg = self::ANSI_MAGENTA;
    return $this;
  }

  function onCyan() {
    $this->bg = self::ANSI_CYAN;
    return $this;
  }

  function onWhite() {
    $this->bg = self::ANSI_WHITE;
    return $this;
  }

  function onStandard() {
    $this->bg = self::ANSI_DEFAULT;
    return $this;
  }

  /**
   * Returns the styled string. Alias for `string`. Allows csting with (string).
   */
  function __toString() {
    return $this->string();
  }

  /**
   * Returns the styled string.
   */
  function string() {
    $styles = [];
    if ($this->fg !== null) {
      $styles []= self::foreground($this->fg);
    }

    if ($this->bg !== null) {
      $styles []= self::background($this->bg);
    }

    $styles = array_merge($styles, $this->format);

    if (empty($styles)) {
      return $this->str;
    } else {
      $escape = "\e[" . join(';', $styles) . 'm';
      return $escape . $this->str . "\e[" . self::ANSI_OFF . 'm';
    }
  }

  private static function foreground($color) {
    return "3$color";
  }

  private static function brightForeground($color) {
    return "9$color";
  }

  private static function background($color) {
    return "4$color";
  }

  private static function brightBackground($color) {
    return "10$color";
  }

  private const ANSI_OFF       = '0';
  private const ANSI_LIGHT     = '1';
  private const ANSI_DARK      = '2';
  private const ANSI_ITALIC    = '3';
  private const ANSI_UNDERLINE = '4';
  private const ANSI_BLINK     = '5';
  private const ANSI_SWAP      = '7';
  private const ANSI_HIDE      = '8';
  private const ANSI_STRIKE    = '9'; // TODO (not widely supported)
  private const ANSI_SHOW      = '28';

  private const ANSI_BLACK     = '0';
  private const ANSI_RED       = '1';
  private const ANSI_GREEN     = '2';
  private const ANSI_YELLOW    = '3';
  private const ANSI_BLUE      = '4';
  private const ANSI_MAGENTA   = '5';
  private const ANSI_CYAN      = '6';
  private const ANSI_WHITE     = '7';
  private const ANSI_DEFAULT   = '9';
}

function colorize($str) {
  return Colored::instance()->set($str);
}

function light($str) {
  return colorize($str)->light();
}

function dark($str) {
  return colorize($str)->dark();
}

/**
 * Italic text. Not widely supported. Sometimes treated like swap.
 */
function italic($str) {
  return colorize($str)->italic();
}

/**
 * Underline text.
 */
function underline($str) {
  return colorize($str)->underline();
}

function blink($str) {
  return colorize($str)->blink();
}

function swap($str) {
  return colorize($str)->swap();
}

/**
 * Hide the text. It appears as blank space. Not widely supported.
 */
function hide($str) {
  return colorize($str)->hide();
}

/**
 * Black text.
 */
function black($str) {
  return colorize($str)->black();
}

/**
 * Red text.
 */
function red($str) {
  return colorize($str)->red();
}

/**
 * Green text.
 */
function green($str) {
  return colorize($str)->green();
}

/**
 * Yellow text.
 */
function yellow($str) {
  return colorize($str)->yellow();
}

/**
 * Blue text.
 */
function blue($str) {
  return colorize($str)->blue();
}

/**
 * Magenta text.
 */
function magenta($str) {
  return colorize($str)->magenta();
}

/**
 * Cyan text.
 */
function cyan($str) {
  return colorize($str)->cyan();
}

/**
 * White text.
 */
function white($str) {
  return colorize($str)->white();
}

/**
 * Standard (terminal default) text.
 */
function standard($str) {
  return colorize($str)->standard();
}

/**
 * Black background.
 */
function onBlack($str) {
  return colorize($str)->onBlack();
}

/**
 * Red background.
 */
function onRed($str) {
  return colorize($str)->onRed();
}

/**
 * Green background.
 */
function onGreen($str) {
  return colorize($str)->onGreen();
}

/**
 * Yellow background.
 */
function onYellow($str) {
  return colorize($str)->onYellow();
}

/**
 * Blue background.
 */
function onBlue($str) {
  return colorize($str)->onBlue();
}

/**
 * Magenta background.
 */
function onMagenta($str) {
  return colorize($str)->onMagenta();
}

/**
 * Cyan background.
 */
function onCyan($str) {
  return colorize($str)->onCyan();
}

/**
 * White background.
 */
function onWhite($str) {
  return colorize($str)->onWhite();
}

/**
 * Standard (terminal default) background.
 */
function onStandard($str) {
  return colorize($str)->onStandard();
}
