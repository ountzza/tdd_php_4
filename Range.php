<?php

function rangeZeroToFive($range) {

  $firstPosition = 0;
  $lastPosition = 4;
  $openSignPosition = $range[$firstPosition];
  $closeSignPosition = $range[$lastPosition];

  if ($openSignPosition == "(" && $closeSignPosition == ")") {
    return "{1,2,3,4}";
  }
  else if($openSignPosition == "(")  {
    return "{1,2,3,4,5}";

  } else if($closeSignPosition == ")") {
    return "{0,1,2,3,4}";

  }

  return "{0,1,2,3,4,5}";

}
