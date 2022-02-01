<?php

//Create a function that accepts 2 integer arguments.
// First argument is a base value and the second one is a value its been multiplied by.
// For example, given argument 10 and 5 prints out 50

$a =readline("Enter a number one: ");
$b =readline("Enter a number two: ");

function multiply($x,$y){
    return $x*$y;
}

echo multiply($a,$b).PHP_EOL;
