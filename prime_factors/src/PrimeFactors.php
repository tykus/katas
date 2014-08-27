<?php

/**
 * Calculates the Prime Factors of a number passed into the generate() method
 */
class PrimeFactors
{

  public function generate($number)
  {
    $primes = [];

    for ($candidate=2; $number > 1; $candidate++)
    {
      for (; $number % $candidate == 0; $number /= $candidate)
      {
        $primes[] = $candidate;
      }
    }

    if ($number > 1)
    {
      $primes[] = $number;
    }

    return $primes;
  }
}
