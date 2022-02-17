<?php

//jāuztaisa autosalons, kurā ir mašīnas un sistēma, kurā ir iespēja autopmašīnu rezervēt (readline) un mašīna ieiet rezervēto sarakstā
//izdalās pieejamās mašīnas un rezervētās mašīnas.

//50 clash of code speeles liidz mēnešaa beigām.



class Cars
{
    public $name;
    public $price;

    public function __construct($name,$price)
    {
        $this->name = $name;
        $this->price = $price;
    }


}


$cars[]=new Cars("Chevrolet T7500",2000);
$cars[]=new Cars("Peterbilt 330",5000);
$cars[]=new Cars("Land Rover FREELANDER",3000);
$cars[]=new Cars("Honda VT1300CRA STATELINE ABS",1500);


//foreach ($cars as $car){
//    echo"$car->name costs $car->price".PHP_EOL;
//}

class CarStore{
    public array $carsInStore=[];
    public function addCarsInStore($car){
        return $this->carsInStore[]=$car;
    }
    public array $reserved=[];
    public function reserveCar($car){
        return $this->reserved[]=$car;

    }
}


$carsInStore=new CarStore();
foreach ($cars as $car){
    $carsInStore->addCarsInStore($car);

}
while(true){


echo "You can select:" . PHP_EOL;
foreach ($carsInStore->carsInStore as $index => $car) {
    echo "[$index]$car->name" . PHP_EOL;
}

    if(isset($carsInStore->reserved[0])){
    echo "These cars are reserved:" . PHP_EOL;
    foreach ($carsInStore->reserved as $index => $car) {
        echo "$car->name" . PHP_EOL;

}}
//var_dump($carsInStore);
$reserveThis=(int)readline("Select car you want to reserve for yourself: ");
if($reserveThis>-1&&$reserveThis<count($carsInStore->carsInStore)) {
    echo PHP_EOL;
    echo "You have reserved {$carsInStore->carsInStore[$reserveThis]->name}.";
    $carsInStore->reserveCar($carsInStore->carsInStore[$reserveThis]);
    unset($carsInStore->carsInStore[$reserveThis]);
    $carsInStore->carsInStore = array_values($carsInStore->carsInStore);

}else{
    echo "No such car available";
    exit;
}
}