<?php

namespace Colorize;

// See https://en.wikipedia.org/wiki/ANSI_escape_code

class Colored
{
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

  function __toString() {
    return $this->string();
  }

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

  private static function background($color) {
    return "4$color";
  }

  const ANSI_OFF       = '0';
  const ANSI_LIGHT     = '1';
  const ANSI_DARK      = '2';
  const ANSI_ITALIC    = '3';
  const ANSI_UNDERLINE = '4';
  const ANSI_BLINK     = '5';
  const ANSI_SWAP      = '7';
  const ANSI_HIDE      = '8';
  const ANSI_STRIKE    = '9'; // TODO (not widely supported)
  const ANSI_SHOW      = '28';

  const ANSI_BLACK     = '0';
  const ANSI_RED       = '1';
  const ANSI_GREEN     = '2';
  const ANSI_YELLOW    = '3';
  const ANSI_BLUE      = '4';
  const ANSI_MAGENTA   = '5';
  const ANSI_CYAN      = '6';
  const ANSI_WHITE     = '7';
  const ANSI_DEFAULT   = '9';
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

function italic($str) {
  return colorize($str)->italic();
}

function underline($str) {
  return colorize($str)->underline();
}

function blink($str) {
  return colorize($str)->blink();
}

function swap($str) {
  return colorize($str)->swap();
}

function hide($str) {
  return colorize($str)->hide();
}

function black($str) {
  return colorize($str)->black();
}

function red($str) {
  return colorize($str)->red();
}

function green($str) {
  return colorize($str)->green();
}

function yellow($str) {
  return colorize($str)->yellow();
}

function blue($str) {
  return colorize($str)->blue();
}

function magenta($str) {
  return colorize($str)->magenta();
}

function cyan($str) {
  return colorize($str)->cyan();
}

function white($str) {
  return colorize($str)->white();
}

function standard($str) {
  return colorize($str)->standard();
}

function onBlack($str) {
  return colorize($str)->onBlack();
}

function onRed($str) {
  return colorize($str)->onRed();
}

function onGreen($str) {
  return colorize($str)->onGreen();
}

function onYellow($str) {
  return colorize($str)->onYellow();
}

function onBlue($str) {
  return colorize($str)->onBlue();
}

function onMagenta($str) {
  return colorize($str)->onMagenta();
}

function onCyan($str) {
  return colorize($str)->onCyan();
}

function onWhite($str) {
  return colorize($str)->onWhite();
}

function onStandard($str) {
  return colorize($str)->onStandard();
}
