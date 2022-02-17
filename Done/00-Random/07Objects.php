<?php
//veikals kuraa iepkshaa produkti, noskaums cena, papildus tam jānoska, produktu kopējā vērtība, un kopējo daudzumu,
//produkts, veikals, produktam cena, noskaumums, un cik daudz viņš ir, jānoskaja produktu kopējā cena(visu). produktu cena, produktu skaits

class Store
{
    public $name;
    public $price;
    public $amount;

    public function __construct($name,$price,$amount)
    {
        $this->name = $name;
        $this->price = $price;
$this->amount=$amount;
    }
}


$store[]=new Store("apple",10,10);
$store[]=new Store("tomato",11,20);
$store[]=new Store("pear",12,30);
$store[]=new Store("cucumber",13,40);


//var_dump($a->name);
$totalSum=0;
$totalAmount=0;
foreach($store as $value){
echo "We have $value->amount of $value->name, each costs $value->price$".PHP_EOL;

    $totalAmount=$totalAmount+$value->amount;
    $sum=$value->amount*$value->price;
    $totalSum=$totalSum+$sum;
}
echo "Total amount of products is $totalAmount".PHP_EOL;
echo "Total sum is ".$totalSum."$".PHP_EOL;


