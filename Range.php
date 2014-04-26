<?php

function rangeZeroToFive($range) {
 
  $setMembers = "1,2,3,4";
  $membersRange = substr($range,1,3);
  $firstSign = $range[0];
  $lastSign = $range[4];

  $signs = $firstSign . $lastSign;

  if ($signs == "()") {
    if($membersRange == "0,0") {
      $setMembers = "";
    }

  } else if($signs == "(]")  {
    $setMembers = $setMembers . ",5";

  } else if($signs == "[)") {
    $setMembers = "0," . $setMembers;

  } else if($signs == "[]"){
    $setMembers = "0," . $setMembers . ",5";
  
  }

  return "{" . $setMembers . "}";
}
