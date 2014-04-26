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
function getOpenMembers($firstRange, $lastRange){
  if($firstRange==$lastRange){
    return $firstRange;
  }
  for($i=$firstRange; $i<= $lastRange; $i++){
    $result[] = $i;
  }
  $result = implode($result,',');
  return $result;
}

function calRange($range) {
  $membersRange = substr($range,1,3);
  $member = explode(',',$membersRange);

  $firstSign = $range[0];
  $lastSign = $range[4];

  $signs = $firstSign . $lastSign;
  $lastFive = "," . $member[1];
  $firstZero = $member[0] . ",";

  $setMembers = getCloseMembers($member[0],$member[1]);

  if($member[0] == $member[1]) {
    $lastFive = "";
    $firstZero = "";
  
    if($signs == "[]") {
        $setMembers = $member[0];
    } else if ($signs == "()") {
        $setMembers = "";
    } else if($signs == "(]"){
        throw new Exception("invalid");
    }
  }

  if($signs == "(]")  {
    $setMembers = $setMembers . $lastFive;

  } else if($signs == "[)") {
    $setMembers = $firstZero . $setMembers;

  } else if($signs == "[]"){
    $setMembers = $firstZero . $setMembers . $lastFive;
  }

  return "{" . $setMembers . "}";
}
