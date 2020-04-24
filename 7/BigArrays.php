<?php
namespace oap;

Class BigArrays {
  protected const FROM = 0;
  protected const TO = 255;

  protected $arr1 = [];
  protected $arr2 = [];
  private $length;

  public function getArr1() {
    return $this->arr1;
  }
  public function getArr2() {
    return $this->arr2;
  }

  public function setArr1($array) {
    return $this->arr1 = $array;
  }
  public function setArr2($array) {
    return $this->arr2 = $array;
  }

  public function __construct($length)
  {
    if(is_int($length)) {
      if(!($length > 0)) {
        throw new \InvalidArgumentException('Arrays\' length must be bigger than zero');
      }
    } else throw new \InvalidArgumentException('Arrays\' length can be only a positive number');

    for($i = 0; $i < $length; $i++) {
      $this->arr1[$i] = [];
      $this->arr2[$i] = [];
      for($j = 0; $j < $length; $j++) {
        $this->arr1[$i][$j] = [];
        $this->arr2[$i][$j] = [];
        for($k = 0; $k < $length; $k++) {
          $this->arr1[$i][$j][$k] = rand(self::FROM, self::TO);
          $this->arr2[$i][$j][$k] = rand(self::FROM, self::TO);
        }
      }
    }

    $this->length = $length;
  }

  public function sumArrays() {
    $resArr = [];

    for($i = 0; $i < $this->length; $i++) {
      $resArr[$i] = [];
      for($j = 0; $j < $this->length; $j++) {
        $resArr[$i][$j] = [];
        for($k = 0; $k < $this->length; $k++) {
          $resArr[$i][$j][$k] = $this->arr1[$i][$j][$k] + $this->arr2[$i][$j][$k];
        }
      }
    }

    return $resArr;
  }

  public function diffArrays($minuend) {
    if(!is_int($minuend) || $minuend > 2) {
      throw new \InvalidArgumentException('Minuend array number should be passed correctly (1 or 2)');
    }
    $resArr = [];

    for($i = 0; $i < $this->length; $i++) {
      $resArr[$i] = [];
      for($j = 0; $j < $this->length; $j++) {
        $resArr[$i][$j] = [];
        for($k = 0; $k < $this->length; $k++) {
          if($minuend == 1) {
            $resArr[$i][$j][$k] = $this->arr1[$i][$j][$k] - $this->arr2[$i][$j][$k];
          } else {
            $resArr[$i][$j][$k] = $this->arr2[$i][$j][$k] - $this->arr1[$i][$j][$k];
          }
        }
      }
    }

    return $resArr;
  }

  public function multiplyBy($multiplier) {
    if(!is_float($multiplier) || $multiplier == 0) {
      throw new \InvalidArgumentException('Multiplier should be a float number different from zero');
    }
    $resArr1 = [];
    $resArr2 = [];

    for($i = 0; $i < $this->length; $i++) {
      $resArr1[$i] = [];
      $resArr2[$i] = [];
      for($j = 0; $j < $this->length; $j++) {
        $resArr1[$i][$j] = [];
        $resArr2[$i][$j] = [];
        for($k = 0; $k < $this->length; $k++) {
          $resArr1[$i][$j][$k] = $this->arr1[$i][$j][$k] * $multiplier;
          $resArr2[$i][$j][$k] = $this->arr2[$i][$j][$k] * $multiplier;
        }
      }
    }

    return Array($resArr1, $resArr2);
  }

  public function findBiggestElemSum() {
    $elemSum1 = 0;
    $elemSum2 = 0;

    for($i = 0; $i < $this->length; $i++) {
      $resArr[$i] = [];
      for($j = 0; $j < $this->length; $j++) {
        $resArr[$i][$j] = [];
        for($k = 0; $k < $this->length; $k++) {
          $elemSum1 += $this->arr1[$i][$j][$k];
          $elemSum2 += $this->arr2[$i][$j][$k];
        }
      }
    }

    if($elemSum1 > $elemSum2) {
      $result = 1;
    } else if($elemSum1 < $elemSum2) {
      $result = 2;
    } else {
      $result = 0;
    }

    return Array($result, $elemSum1, $elemSum2);
  }
}
?>
