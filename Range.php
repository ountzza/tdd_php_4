<?php

function rangeZeroToFive($range) {

  $firstPosition = 0;
  $lastPosition = 4;
  $firstSign = $range[$firstPosition];
  $lastSign = $range[$lastPosition];

  $signs = $firstSign . $lastSign;

  if ($signs == "()") {
    return "{1,2,3,4}";

  } else if($firstSign == "(")  {
    return "{1,2,3,4,5}";

  } else if($lastSign == ")") {
    return "{0,1,2,3,4}";

  }

  return "{0,1,2,3,4,5}";

}
