<?php

class BowlingScorer
{
  protected $rolls = [];

  public function roll($pins_knocked)
  {
    $this->guardAgainstInvalidArguments($pins_knocked);
    $this->rolls[] = $pins_knocked;
  }

  public function score()
  {
    $roll = 0;
    $score = 0;

    for ($frame=1; $frame <= 10; $frame++)
    {
      if ($this->isStrike($roll))
      {
        $score += 10 + $this->strikeBonus($roll);
        $roll += 1;
      }
      elseif ($this->isSpare($roll))
      {
        $score += 10 + $this->spareBonus($roll);
        $roll += 2;
      }
      else
      {
        $score += $this->getFrameScore($roll);
        $roll += 2;
      }
    }

    return $score;
  }

  private function isStrike($roll)
  {
    return $this->rolls[$roll] == 10;
  }

  private function isSpare($roll)
  {
    return $this->rolls[$roll] + $this->rolls[$roll + 1] == 10;
  }

  private function getFrameScore($roll)
  {
    return $this->rolls[$roll] + $this->rolls[$roll + 1];
  }

  private function strikeBonus($roll)
  {
    return $this->rolls[$roll + 1] + $this->rolls[$roll + 2];
  }

  private function spareBonus($roll)
  {
    return $this->rolls[$roll + 2];
  }
  private function guardAgainstInvalidArguments($pins_knocked)
  {
    if ($pins_knocked < 0)
    {
      throw new InvalidArgumentException;
    }
  }

}
