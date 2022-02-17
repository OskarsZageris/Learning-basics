<?php

$words = [
    "Java",
    "Python",
    "PHP",
    "C#",
    "C Programming",
    "C++"
];

//todo
foreach ($words as$word){
    echo $word . " ";
}
//echo "Original string array: ";
asort($words);
//todo
//echo "Sorted string array: ";
echo PHP_EOL;
foreach ($words as$word){
    echo $word . ", ";
}