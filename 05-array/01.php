<?php

$numbers = [
1789, 2035, 1899, 1456, 2013,
1458, 2458, 1254, 1472, 2365,
1456, 2165, 1457, 2456
];

//todo
//echo "Original numeric array: ";
foreach($numbers as $number){
    echo $number." ";
}
asort($numbers);

//todo
echo PHP_EOL;
foreach($numbers as $number){
    echo $number." ";
}
