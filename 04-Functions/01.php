<?php

//Create a function that accepts any string and returns the same value with added "codelex" by the end of it. Print this value out.

$a = readline('Enter something to add codelex: ');



function addCodelex($b){
    return $b. " codelex";
}

echo addCodelex($a).PHP_EOL;