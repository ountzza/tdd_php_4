<?php

function getCloseMembers($firstRange, $lastRange){
  if($firstRange==$lastRange){
    return "";
  }
  for($i=$firstRange+1; $i< $lastRange; $i++){
    $result[] = $i;
  }
  $result = implode($result,',');
  return $result;
}

function calRange($range) {

  $membersRange = substr($range,1,3);
  $member = explode(',',$membersRange);

  $setMembers = getCloseMembers($member[0],$member[1]);

  $firstSign = $range[0];
  $lastSign = $range[4];

  $signs = $firstSign . $lastSign;
  $lastFive = "," . $member[1];
  $firstZero = $member[0] . ",";

  if($member[0] == $member[1]) {
    $lastFive = "";
    $firstZero = "";
    $setMembers = $member[0];
  }

  if($membersRange == "0,0") {
      $setMembers = "";

  }else if($signs == "(]")  {
    $setMembers = $setMembers . $lastFive;

  } else if($signs == "[)") {
    $setMembers = $firstZero . $setMembers;

  } else if($signs == "[]"){
    $setMembers = $firstZero . $setMembers . $lastFive;
  }

  return "{" . $setMembers . "}";
}
