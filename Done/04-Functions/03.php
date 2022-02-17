<?php

//Create a person object with name, surname and age.
// Create a function that will determine if the person has reached 18 years of age.
// Print out if the person has reached age of 18 or not.


$arraylist=[
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
        "age" => 17,
        "birthday"=>"3.February"
    ]
];
//var_dump($arraylist);
function ageLegit($x){
for ($i=0;$i<3;$i++){

        if($x[$i]["age"]>18){
            echo $x[$i]["name"]." ".$x[$i]["surname"]." ".$x[$i]["age"]." ".$x[$i]["birthday"]." ".PHP_EOL;
        }
    }

}

ageLegit($arraylist);
