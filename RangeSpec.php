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
  function testOpenOpenRangeZeroToZero () {
    $this->assertEquals("{}", rangeZeroToFive("(0,0)"));
  }
  function testCloseCloseRangeOneToOne () {
    $this->assertEquals("{1}", rangeZeroToFive("[1,1]"));
  }
//  function testOpenOpenRangeZeroToFour () {
//    $this->assertEquals("{1,2,3}", rangeZeroToFive("(0,4)"));
//  }
  function testCloseGetMember () {
    $this->assertEquals("1,2,3", getCloseMembers("0","4"));
  }
  function testCloseGetMemberSixToTen () {
    $this->assertEquals("7,8,9", getCloseMembers("6","10"));
  }
}
