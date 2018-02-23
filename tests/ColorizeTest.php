<?php

use PHPUnit\Framework\TestCase;

use function Colorize\colorize;
use function Colorize\black;
use function Colorize\red;
use function Colorize\green;
use function Colorize\yellow;
use function Colorize\blue;
use function Colorize\magenta;
use function Colorize\cyan;
use function Colorize\white;
use function Colorize\standard;
use function Colorize\onBlack;
use function Colorize\onRed;
use function Colorize\onGreen;
use function Colorize\onYellow;
use function Colorize\onBlue;
use function Colorize\onMagenta;
use function Colorize\onCyan;
use function Colorize\onWhite;
use function Colorize\onStandard;
use function Colorize\italic;
use function Colorize\underline;
use function Colorize\blink;
use function Colorize\hide;

class ColorizeTest extends TestCase
{
  function testBasic() {
    $this->assertSame('test', colorize('test')->string());
    $this->assertSame('test', (string)colorize('test'));
  }

  function testForeground() {
    $this->assertSame("\e[30mtest\e[0m", (string)colorize('test')->black());
    $this->assertSame("\e[31mtest\e[0m", (string)colorize('test')->red());
    $this->assertSame("\e[32mtest\e[0m", (string)colorize('test')->green());
    $this->assertSame("\e[33mtest\e[0m", (string)colorize('test')->yellow());
    $this->assertSame("\e[34mtest\e[0m", (string)colorize('test')->blue());
    $this->assertSame("\e[35mtest\e[0m", (string)colorize('test')->magenta());
    $this->assertSame("\e[36mtest\e[0m", (string)colorize('test')->cyan());
    $this->assertSame("\e[37mtest\e[0m", (string)colorize('test')->white());
    $this->assertSame("\e[39mtest\e[0m", (string)colorize('test')->standard());
  }

  function testForegroundFunctions() {
    $this->assertSame((string)colorize('test')->black(),    (string)black('test'));
    $this->assertSame((string)colorize('test')->red(),      (string)red('test'));
    $this->assertSame((string)colorize('test')->green(),    (string)green('test'));
    $this->assertSame((string)colorize('test')->yellow(),   (string)yellow('test'));
    $this->assertSame((string)colorize('test')->blue(),     (string)blue('test'));
    $this->assertSame((string)colorize('test')->magenta(),  (string)magenta('test'));
    $this->assertSame((string)colorize('test')->cyan(),     (string)cyan('test'));
    $this->assertSame((string)colorize('test')->white(),    (string)white('test'));
    $this->assertSame((string)colorize('test')->standard(), (string)standard('test'));
  }

  function testBackground() {
    $this->assertSame("\e[40mtest\e[0m", (string)colorize('test')->onBlack());
    $this->assertSame("\e[41mtest\e[0m", (string)colorize('test')->onRed());
    $this->assertSame("\e[42mtest\e[0m", (string)colorize('test')->onGreen());
    $this->assertSame("\e[43mtest\e[0m", (string)colorize('test')->onYellow());
    $this->assertSame("\e[44mtest\e[0m", (string)colorize('test')->onBlue());
    $this->assertSame("\e[45mtest\e[0m", (string)colorize('test')->onMagenta());
    $this->assertSame("\e[46mtest\e[0m", (string)colorize('test')->onCyan());
    $this->assertSame("\e[47mtest\e[0m", (string)colorize('test')->onWhite());
    $this->assertSame("\e[49mtest\e[0m", (string)colorize('test')->onStandard());
  }

  function testBackgroundFunctions() {
    $this->assertSame((string)colorize('test')->onBlack(),    (string)onBlack('test'));
    $this->assertSame((string)colorize('test')->onRed(),      (string)onRed('test'));
    $this->assertSame((string)colorize('test')->onGreen(),    (string)onGreen('test'));
    $this->assertSame((string)colorize('test')->onYellow(),   (string)onYellow('test'));
    $this->assertSame((string)colorize('test')->onBlue(),     (string)onBlue('test'));
    $this->assertSame((string)colorize('test')->onMagenta(),  (string)onMagenta('test'));
    $this->assertSame((string)colorize('test')->onCyan(),     (string)onCyan('test'));
    $this->assertSame((string)colorize('test')->onWhite(),    (string)onWhite('test'));
    $this->assertSame((string)colorize('test')->onStandard(), (string)onStandard('test'));
  }

  function testStyle() {
    $this->assertSame("\e[3mtest\e[0m", (string)colorize('test')->italic());
    $this->assertSame("\e[4mtest\e[0m", (string)colorize('test')->underline());
    $this->assertSame("\e[5mtest\e[0m", (string)colorize('test')->blink());
    $this->assertSame("\e[8mtest\e[0m", (string)colorize('test')->hide());
  }

  function testStyleFunctions() {
    $this->assertSame((string)colorize('test')->italic(),    (string)italic('test'));
    $this->assertSame((string)colorize('test')->underline(), (string)underline('test'));
    $this->assertSame((string)colorize('test')->blink(),     (string)blink('test'));
    $this->assertSame((string)colorize('test')->hide(),      (string)hide('test'));
  }

  function testOverride() {
    $this->assertSame((string)blue('test'), (string)red('test')->green()->blue());
    $this->assertSame((string)onRed('test'), (string)onBlue('test')->onGreen()->onRed());
  }

  function testMulti() {
    // TODO: Failing.
    //$fst = colorize('fst')->red();
    //$snd = colorize('snd')->blue();
    //$this->assertSame("", (string)$fst);
    //$this->assertSame("", (string)$snd);
  }
}
