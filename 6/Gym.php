<?php
namespace oap;

Class Gym {
  protected const AGE_FROM = 10;
  protected const AGE_TO = 100;

  protected $visitors;

  protected $maxAge;
  protected $minAge;
  protected $avgAge;

  public function getMaxAge() {
    return $this->maxAge;
  }
  public function getMinAge() {
    return $this->minAge;
  }
  public function getAvgAge() {
    return $this->avgAge;
  }

  public function __construct($visitors)
  {
    foreach($visitors as $visitor) {
      if(is_int($visitor)) {
        if($visitor >= self::AGE_FROM && $visitor <= self::AGE_TO) {
          continue;
        } else throw new \InvalidArgumentException('Age can be only in range 10 - 100');
      } else throw new \InvalidArgumentException('Age can be only integer in range 10 - 100');
    }

    $this->visitors = $visitors;
  }

  public function findYoungest() {
    $min = self::AGE_TO + 1;
    foreach($this->visitors as $visitorAge) {
      if($visitorAge < $min) {
        $min = $visitorAge;
      }
    }

    $this->minAge = $min;
    return $this->minAge;
  }

  public function findOldest() {
    $max = self::AGE_FROM - 1;
    foreach($this->visitors as $visitorAge) {
      if($visitorAge > $max) {
        $max = $visitorAge;
      }
    }

    $this->maxAge = $max;
    return $this->maxAge;
  }

  public function findAvg() {
    $sumAge = 0;
    foreach($this->visitors as $visitorAge) {
      $sumAge += $visitorAge;
    }

    $this->avgAge = round($sumAge/count($this->visitors));
    return $this->avgAge;
  }
}
?>
