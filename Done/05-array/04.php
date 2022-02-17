<?php
//Write a program that creates an array of ten integers. It should put ten random numbers from 1 to 100 in the array.
// It should copy all the elements of that array into another array of the same size.
//
//Then display the contents of both arrays. To get the output to look like this, you'll need a several for loops.
//
//Create an array of ten integers
//Fill the array with ten random numbers (1-100)
//Copy the array into another array of the same capacity
//Change the last value in the first array to a -7
//Display the contents of both arrays
//Array 1: 45 87 39 32 93 86 12 44 75 -7
//Array 2: 45 87 39 32 93 86 12 44 75 50

$arrayOne=array();
for($i=0;$i<10;$i++){
    $x=rand(1,100);
   $arrayOne[]=$x;
}
$arrayTwo=$arrayOne;

array_pop($arrayOne);
$arrayOne[]=-7;


foreach($arrayOne as $array){
    echo $array." ";
}
echo PHP_EOL;

foreach($arrayTwo as $array) {
    echo $array . " ";
}
echo PHP_EOL;
//$cart = array();
//$cart[] = 13;
//$cart[] = 14;
