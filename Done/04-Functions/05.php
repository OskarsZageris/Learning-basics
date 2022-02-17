<?php
//Create a 2D associative array in 2nd dimension with fruits and their weight.
//Create a function that determines if fruit has weight over 10kg.
// Create a secondary array with shipping costs per weight.
// Meaning that you can say that over 10 kg shipping costs are 2 euros, otherwise its 1 euro.
// Using foreach loop print out the values of the fruits and how much it would cost to ship this product.

$bag=[
    ["name"=>"banana",
    "weight"=>2
    ],
    ["name"=>"orange",
        "weight"=>11
    ],
    ["name"=>"lemon",
        "weight"=>22
    ],
    ["name"=>"berries",
        "weight"=>20
    ]
];
$costs=[
  ["weight"=>10,
  "cost"=>"1$"],
    ["weight"<10,
  "cost"=>"2$"],

];

function isOverWeight($name,int $weight=10):bool{
return $name["weight"]>=$weight;
}

//var_dump($bag);
//echo $bag[0]["name"];
foreach($bag as $fruits){
    if(isOverWeight($fruits,$costs[0]["weight"])){

  echo  "{$fruits["name"]} will cost {$costs[1]["cost"]}".PHP_EOL;
    }else{
        echo "{$fruits["name"]} will cost {$costs[0]["cost"]}".PHP_EOL;
    }
}