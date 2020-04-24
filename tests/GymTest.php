<?php
namespace oap;

use PHPUnit\Framework\TestCase;

include __DIR__ . '/../6/Gym.php';

final class GymTest extends TestCase
{
    protected $visitors = Array(
      array(12, 55, 32, 21, 26, 15, 67),
      array(48, 71, 59, 17, 84),
      array(24, 26, 24, 75, 20)
    );

    /**
    * @dataProvider providerFindYoungest
    */
    public function testFindYoungest($visitors, $expected) {
      $gym = new Gym($visitors);
      $this->assertEquals($expected, $gym->findYoungest());
    }

    /**
    * @dataProvider providerFindOldest
    */
    public function testFindOldest($visitors, $expected) {
      $gym = new Gym($visitors);
      $this->assertEquals($expected, $gym->findOldest());
    }

    /**
    * @dataProvider providerFindAvg
    */
    public function testFindAvg($visitors, $expected) {
      $gym = new Gym($visitors);
      $this->assertEquals($expected, $gym->findAvg());
    }

    /**
    * @dataProvider providerGymConstructException
    * @expectedException InvalidArgumentException
    */
    public function testGymConstructException($visitors) {
      $gym = new Gym($visitors);
    }

    public function providerFindYoungest() {
      return Array(
        array($this->visitors[0], 12),
        array($this->visitors[1], 17),
        array($this->visitors[2], 20)
      );
    }

    public function providerFindOldest() {
      return Array(
        array($this->visitors[0], 67),
        array($this->visitors[1], 84),
        array($this->visitors[2], 75)
      );
    }

    public function providerFindAvg() {
      return Array(
        array($this->visitors[0], 33),
        array($this->visitors[1], 56),
        array($this->visitors[2], 34)
      );
    }

    public function providerGymConstructException() {
      return Array(
        array(null, 20, 30, 40),
        array('s', 20, 30, 40),
        array(9, 20, 30, 40),
        array(101, 20, 30, 40)
      );
    }

}
