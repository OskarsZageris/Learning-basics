<?php
//Exercise 4
//Create a array of objects that uses the function of exercise 3 but in loop printing out if the person has reached age of 18.

$person = new stdClass();
$person->name = "John";
$person->surname = "Doe";
$person->age = 50;

function hasReachedAgeOf(stdClass $person,int $ageOf=18):bool
{
return $person->age>= $ageOf;
}
$personOne = new stdClass();
$personOne->name= "Jānis";
$personOne->age= 29;

$personTwo = new stdClass();
$personTwo->name= "Oskars";
$personTwo->age= 17;

$personThree = new stdClass();
$personThree->name= "Pēteris";
$personThree->age= 18;

$persons=[
    $personOne,$personTwo,$personThree
];

foreach ($persons as $person){
    echo "{$person->name}";
    if (hasReachedAgeOf($person)){
        echo " is an adult".PHP_EOL;
    }else{
        echo " isn't an adult".PHP_EOL;
    }
}

function createPerson(string $name, int $age):stdClass{
$person =new stdClass();
$person->name=$name;
$person->age=$age;
return $person;
}
createPerson("Jānis",22);
