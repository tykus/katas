<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use InvalidArgumentException;

class StringCalculatorSpec extends ObjectBehavior
{
  function it_translates_an_empty_string_into_zero()
  {
    $this->add('')->shouldEqual(0);
  }

  function it_finds_the_sum_of_one_number()
  {
    $this->add('5')->shouldEqual(5);
  }

  function it_finds_the_sum_of_two_numbers()
  {
    $this->add('1,2')->shouldEqual(3);
  }

  function it_finds_the_sum_of_any_amt_of_numbers()
  {
    $this->add('1,2,3,4,5')->shouldEqual(15);
  }

  function it_disallows_negative_numbers()
  {
    $this->shouldThrow(new InvalidArgumentException('Invalid number provided: -1'))->duringAdd('3,-1');
  }

  function it_ignores_any_number_greater_than_1000()
  {
    $this->add('2,2,1000')->shouldEqual(4);
  }

  function it_allows_for_newline_delimiters()
  {
    $this->add('1,1,3\n1')->shouldEqual(6);
  }
}
