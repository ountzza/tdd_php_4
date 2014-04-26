<?php

function getCloseMembers($firstRange, $lastRange){
  for($i=$firstRange+1; $i< $lastRange; $i++){
    $result[] = $i;
  }
  $result = implode($result,',');
  return $result;
}
function calRange($range) {

  $setMembers = "1,2,3,4";

  $membersRange = substr($range,1,3);
  $member = explode($membersRange,",");


  $firstSign = $range[0];
  $lastSign = $range[4];

  $signs = $firstSign . $lastSign;

  if ($membersRange == "1,1") {
      $setMembers = "1";

  } else if($membersRange == "0,0") {
      $setMembers = "";

  }else if($signs == "(]")  {
    $setMembers = $setMembers . ",5";

  } else if($signs == "[)") {
    $setMembers = "0," . $setMembers;

  } else if($signs == "[]"){
    $setMembers = "0," . $setMembers . ",5";
  
  }

  return "{" . $setMembers . "}";
}
