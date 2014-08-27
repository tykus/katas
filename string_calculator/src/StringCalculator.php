<?php

class StringCalculator
{

  const MAXIMUM_NUMBER_ALLOWED = 1000;

  /**
   * @param $numbers
   * @return int
   */
  public function add($numbers)
  {
    # rather than using explode() to split the string, we are stripping any
    # spaces (\s*) which might exist before or after the comma or newline
    # (,|\\\n) - note that the '\n' must itself be escaped!!
    $numbers = $this->parseNumbers($numbers);

    $solution = 0;

    foreach($numbers as $number)
    {
      $this->guardAgainstInvalidArguments($number);
      if ($number >= self::MAXIMUM_NUMBER_ALLOWED) continue;
      $solution += $number;
    }

    return $solution;
  }

  /**
   * @param $number
   */
  private function guardAgainstInvalidArguments($number)
  {
    if ($number < 0) throw new InvalidArgumentException("Invalid number provided: {$number}");
  }

  /**
   * @params $numbers
   */
  private function parseNumbers($numbers)
  {
    return array_map('intval', preg_split('/\s*(,|\\\n)\s*/', $numbers));
  }

}
