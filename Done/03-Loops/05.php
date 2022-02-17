<?php

//Create an associative array with objects of multiple persons.
//Each person should have a name, surname, age and birthday.
// Using loop (by your choice) print out every persons personal data.

$personList=[
    ["name" => "John",
    "surname" => "Doe",
    "age" => 50,
        "birthday"=>"1.February"],
    [ "name" => "Jane",
        "surname" => "Doe",
        "age" => 41,
        "birthday"=>"2.February"
    ],
    ["name" => "Joe",
    "surname" => "New",
    "age" => 43,
        "birthday"=>"3.February"
    ]
];

foreach ($personList as $individual){
    echo "{$individual["name"]} {$individual["surname"]} is {$individual["age"]} years ago old and is born in {$individual["birthday"]}".PHP_EOL;
}


