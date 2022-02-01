<?php

//Create a non associative array with integers and print out only integers that divides by 3 without any left.

$array=[6,9,12,10,11,13];


foreach ($array as $output){
    if($output%3===0){
    echo $output.PHP_EOL;
    }

}