<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RomanNumeralConverterSpec extends ObjectBehavior
{
  function it_should_calculate_roman_numeral_for_1()
  {
    $this->convert(1)->shouldReturn('I');
  }

  function it_should_calculate_roman_numeral_for_2()
  {
    $this->convert(2)->shouldReturn('II');
  }

  function it_should_calculate_roman_numeral_for_4()
  {
    $this->convert(4)->shouldReturn('IV');
  }

  function it_should_calculate_roman_numeral_for_5()
  {
    $this->convert(5)->shouldReturn('V');
  }

  function it_should_calculate_roman_numeral_for_6()
  {
    $this->convert(6)->shouldReturn('VI');
  }

  function it_should_calculate_roman_numeral_for_9()
  {
    $this->convert(9)->shouldReturn('IX');
  }

  function it_should_calculate_roman_numeral_for_10()
  {
    $this->convert(10)->shouldReturn('X');
  }

  function it_should_calculate_roman_numeral_for_12()
  {
    $this->convert(12)->shouldReturn('XII');
  }

  function it_should_calculate_roman_numeral_for_15()
  {
    $this->convert(15)->shouldReturn('XV');
  }

  function it_should_calculate_roman_numeral_for_16()
  {
    $this->convert(16)->shouldReturn('XVI');
  }

  function it_should_calculate_roman_numeral_for_20()
  {
    $this->convert(20)->shouldReturn('XX');
  }

  function it_should_calculate_roman_numeral_for_50()
  {
    $this->convert(50)->shouldReturn('L');
  }

  function it_should_calculate_roman_numeral_for_100()
  {
    $this->convert(100)->shouldReturn('C');
  }

  function it_should_calculate_roman_numeral_for_129()
  {
    $this->convert(129)->shouldReturn('CXXIX');
  }

  function it_should_calculate_roman_numeral_for_500()
  {
    $this->convert(500)->shouldReturn('D');
  }

  function it_should_calculate_roman_numeral_for_1000()
  {
    $this->convert(1000)->shouldReturn('M');
  }

  function it_should_calculate_roman_numeral_for_1999()
  {
    $this->convert(1999)->shouldReturn('MCMXCIX');
  }

  function it_takes_exception_with_zero()
  {
    $this->shouldThrow('InvalidArgumentException')->duringConvert(0);
  }
}
