<?php
require("Range.php");

class RangeSpec extends PHPUnit_Framework_TestCase {

  function testCloseRangeZeroToFive () {
    $this->assertEquals("{0,1,2,3,4,5}",calRange("[0,5]"));
  }

  function testOpenCloseRangeZeroToFive () {
    $this->assertEquals("{1,2,3,4,5}", calRange("(0,5]"));
  }

  function testCloseOpenRangeZeroToFive () {
    $this->assertEquals("{0,1,2,3,4}", calRange("[0,5)"));
  }

  function testOpenOpenRangeZeroToFive () {
    $this->assertEquals("{1,2,3,4}", calRange("(0,5)"));
  }

  function testOpenOpenRangeZeroToZero () {
    $this->assertEquals("{}", calRange("(0,0)"));
  }

  function testCloseCloseRangeOneToOne () {
    $this->assertEquals("{1}", calRange("[1,1]"));
  }

  function testOpenOpenRangeZeroToFour () {
    $this->assertEquals("{1,2,3}", calRange("(0,4)"));
  }

  function testCloseCloseRangeTwoToTwo () {
    $this->assertEquals("{2}", calRange("[2,2]"));
  }

  function testOpenOpenRangeTwoToTwo () {
    $this->assertEquals("{}", calRange("(2,2)"));
  }

  function testOpenCloseRangeTwoToTwo () {
    try {
      $this->assertEquals("invalid", calRange("(2,2]"));
      $this->fail("Invalid range was not thrown");
    } catch (Exception $e) {
      $this->assertTrue(true);
    }
  }

  function testCloseGetMemberZeroToFour () {
    $this->assertEquals("1,2,3", getCloseMembers("0","4"));
  }

  function testCloseGetMemberSixToTen () {
    $this->assertEquals("7,8,9", getCloseMembers("6","10"));
  }

  function testCloseGetMemberOneToOne () {
    $this->assertEquals("", getCloseMembers("1","1"));
  }

  function testCloseGetMemberOneToFive() {
    $this->assertEquals("2,3,4", getCloseMembers("1","5"));
  }

  function testCloseGetMemberTwoToOne () {
      try {
        $this->assertEquals("1", getCloseMembers("2","1"));
        $this->fail("Invalid range was not thrown");
      } catch (Exception $e) {
      $this->assertTrue(true);
    }
  }
  
  function testOpenGetMemberOneToFive () {
    $this->assertEquals("1,2,3,4,5", getOpenMembers("1","5"));
  }

  function testOpenGetMemberOneToTwo () {
    $this->assertEquals("1,2", getOpenMembers("1","2"));
  }

  function testOpenGetMemberOneToOne () {
    $this->assertEquals("1", getOpenMembers("1","1"));
  }

   function testOpenGetMemberTwoToOne() {
      try {
        $this->assertEquals("1", getOpenMembers("2","1"));
        $this->fail("Invalid range was not thrown");
      } catch (Exception $e) {
      $this->assertTrue(true);
    }
  }

  function testAlwaysfail () {
    //$this->assertTrue(fail);
  }


}
