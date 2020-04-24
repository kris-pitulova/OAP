<?php
namespace oap;

use PHPUnit\Framework\TestCase;

include __DIR__ . '/../7/BigArrays.php';

final class BigArraysTest extends TestCase
{
    protected $arr = Array(
      array(
        array(
          array(12, 150),
          array(110, 202)
        ),
        array(
          array(174, 90),
          array(164, 179)
        )
      ),
      array(
        array(
          array(133, 75),
          array(200, 98)
        ),
        array(
          array(64, 25),
          array(188, 44)
        )
      )
    );


    /**
    * @dataProvider providerSumArrays
    */
    public function testSumArrays($arr, $expected) {
      $bigArrays = new BigArrays(2);
      $bigArrays->setArr1($this->arr[0]);
      $bigArrays->setArr2($this->arr[1]);

      $this->assertEquals($expected, $bigArrays->sumArrays());
    }

    /**
    * @dataProvider providerDiffArrays
    */
    public function testDiffArrays($arr, $minuend, $expected) {
      $bigArrays = new BigArrays(2);
      $bigArrays->setArr1($this->arr[0]);
      $bigArrays->setArr2($this->arr[1]);

      $this->assertEquals($expected, $bigArrays->diffArrays($minuend));
    }

    /**
    * @dataProvider providerMultiplyBy
    */
    public function testMultiplyBy($arr, $multiplier, $expected) {
      $bigArrays = new BigArrays(2);
      $bigArrays->setArr1($this->arr[0]);
      $bigArrays->setArr2($this->arr[1]);

      $this->assertEquals($expected, $bigArrays->multiplyBy($multiplier));
    }

    /**
    * @dataProvider providerFindBiggestElemSum
    */
    public function testFindBiggestElemSum($arr, $expected) {
      $bigArrays = new BigArrays(2);
      $bigArrays->setArr1($this->arr[0]);
      $bigArrays->setArr2($this->arr[1]);

      $this->assertEquals($expected, $bigArrays->findBiggestElemSum());
    }

    /**
    * @dataProvider providerBigArraysConstructException
    * @expectedException InvalidArgumentException
    */
    public function testBigArraysConstructException($length) {
      $bigArrays = new BigArrays($length);
    }

    public function providerSumArrays() {
      return Array(
        array($this->arr, Array(
          array(
            array(145, 225),
            array(310, 300)
          ),
          array(
            array(238, 115),
            array(352, 223)
          )
        ))
      );
    }

    public function providerDiffArrays() {
      return Array(
        array($this->arr, 1, Array(
          array(
            array(-121, 75),
            array(-90, 104)
          ),
          array(
            array(110, 65),
            array(-24, 135)
          )
        )),
        array($this->arr, 2, Array(
          array(
            array(121, -75),
            array(90, -104)
          ),
          array(
            array(-110, -65),
            array(24, -135)
          )
        ))
      );
    }

    public function providerMultiplyBy() {
      return Array(
        array($this->arr, 4.5, Array(
          array(
            array(
              array(54, 675),
              array(495, 909)
            ),
            array(
              array(783, 405),
              array(738, 805.5)
            )
          ),
          array(
            array(
              array(598.5, 337.5),
              array(900, 441)
            ),
            array(
              array(288, 112.5),
              array(846, 198)
            )
          ))
        ),
        array($this->arr, -7, Array(
          array(
            array(
              array(-84, -1050),
              array(-770, -1414)
            ),
            array(
              array(-1218, -630),
              array(-1148, -1253)
            )
          ),
          array(
            array(
              array(-931, 525),
              array(-1400, -686)
            ),
            array(
              array(-448, -175),
              array(-1316, -308)
            )
          ))
        )
      );
    }

    public function providerFindBiggestElemSum() {
      return Array(
        array($this->arr, array(1, 1081, 827))
      );
    }

    public function providerBigArraysConstructException() {
      return Array(
        array(0),
        array(-15),
        array('twenty'),
        array(null)
      );
    }

}
