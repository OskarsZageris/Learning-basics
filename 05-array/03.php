<?php


$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];

$a=readline("Enter the value to search for: ");

if(in_array($a,$numbers)){
    echo "yes";
}else{
    echo "no";
}
//echo in_array($a);
//todo check if an array contains a value user entered