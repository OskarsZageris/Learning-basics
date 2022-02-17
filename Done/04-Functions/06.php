<?php
//Create an non-associative array with 5 elements where 3 are integers,
// 1 float and 1 string.
//
// Create a for loop that iterates non-associative array
// using php in-built function that determines count of elements in the array.

// Create a function that doubles the integer number.
// Within the loop using php in-built function print out the double of the number value (using your custom function).

$list=[
    1,
    2,
    3,
    "String",
    0.5
];
//var_dump($list);

$a=count($list);
//echo $a;

Function doubleNumbers($integers){
    return $integers*2;
}
//foreach($list as $value){
//    if(is_int($value)){
//echo doubleNumbers($value).PHP_EOL;
//    }else{
//        echo $value.PHP_EOL;
//    }
//    echo is_int($value).PHP_EOL;
//}
for ($i=0;$i<$a;$i++){
    if(is_int($list[$i])){
        echo doubleNumbers($list[$i]).PHP_EOL;
    }else{
        echo $list[$i].PHP_EOL;
    }
}