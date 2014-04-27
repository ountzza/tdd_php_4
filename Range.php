<?php

function getOpenMembers($firstRange, $lastRange){
  if($firstRange==$lastRange){
    return "";
  }
  return getMembersLoop($firstRange+1, $lastRange);
}

function getCloseMembers($firstRange, $lastRange){
  if($firstRange==$lastRange){
    return $firstRange;
  }
  return getMembersLoop($firstRange, $lastRange+1);
}

function getMembersLoop($firstRange, $lastRange){
  for($i=$firstRange; $i< $lastRange; $i++){
    $result[] = $i;
  }
  return $result = implode($result,',');
}

function explodeMemberRange($range){
  $membersRange = substr($range,1,3);
  return explode(',',$membersRange);
}

function calRange($range) {

  $member = explodeMemberRange($range);
  $setMembers = getOpenMembers($member[0],$member[1]);

  $signs = $range[0] . $range[4];
  $lastFive = "," . $member[1];
  $firstZero = $member[0] . ",";

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
