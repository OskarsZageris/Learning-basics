<?php

$a = readline('Pick a random number from: ');
$b = readline('Pick a random number to: ');
$c = readline("Pick your guess: ");

$x = rand($a,$b);
if($c==$x){
echo "You guessed it!  What are the odds?!?".PHP_EOL;
}else if($c>$x){
  echo  "Sorry, you are too high.  I was thinking of $x.".PHP_EOL;
}else{
    echo  "Sorry, you are too low.  I was thinking of $x.".PHP_EOL;
}
