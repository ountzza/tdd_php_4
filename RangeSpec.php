<?php
require("Range.php");

class RangeSpec extends PHPUnit_Framework_TestCase {

  function testCloseRangeZeroToFive () {
    $this->assertEquals("{0,1,2,3,4,5}",rangeZeroToFive("[0,5]"));
  }

  function testOpenCloseRangeZeroToFive () {
    $this->assertEquals("{1,2,3,4,5}", rangeZeroToFive("(0,5]"));
  }

  function testCloseOpenRangeZeroToFive () {
    $this->assertEquals("{0,1,2,3,4}", rangeZeroToFive("[0,5)"));
  }

  function testOpenOpenRangeZeroToFive () {
    $this->assertEquals("{1,2,3,4}", rangeZeroToFive("(0,5)"));
  }

}
