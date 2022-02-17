<?php

$numbers=[
    1,
    2,
    7
];
//echo "sum(numbers) = " . array_sum($numbers) . "\n";

$person2 = [
    "name" => "John",
    "surname" => "Doe",
    "age" => 50
];

//var_dump($person2);


$person = new stdClass();
$person->name = "John";
$person->surname = "Doe";
$person->age = 50;
//var_dump($person);

$items = [
[
        [
            "name" => "John",
            "surname" => "Doe",
            "age" => 50
        ],
        [
            "name" => "Jane",
            "surname" => "Doe",
            "age" => 41
        ]
]
];
$output=$items[0][1]["name"]." ".$items[0][1]["surname"]." ".$items[0][1]["age"]."\n";
echo $output;

$items3 = [
    [
        [
            "name" => "John",
            "surname" => "Doe",
            "age" => 50
        ],
        [
            "name" => "Jane",
            "surname" => "Doe",
            "age" => 41
        ]
    ]
];

//var_dump($items3);
echo $items3[0][0]["name"]." & ".$items3[0][1]["name"]." ".$items3[0][0]["surname"]."`s".PHP_EOL;