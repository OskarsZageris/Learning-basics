<?php

//For this exercise, you will design a set of classes that work together to simulate a car's fuel gauge and odometer.
// The classes you will design are the following:
//
//The FuelGauge Class: This class will simulate a fuel gauge. Its responsibilities are as follows:
//
//To know the car’s current amount of fuel, in liters.
//To report the car’s current amount of fuel, in liters.
//To be able to increment the amount of fuel by 1 liter. This simulates putting fuel in the car. ( The car can hold a maximum of 70 liters.)
//To be able to decrement the amount of fuel by 1 liter, if the amount of fuel is greater than 0 liters. This simulates burning fuel as the car runs.
//The Odometer Class: This class will simulate the car’s odometer. Its responsibilities are as follows:
//
//To know the car’s current mileage.
//To report the car’s current mileage.
//To be able to increment the current mileage by 1 kilometer. The maximum mileage the odometer can store is 999,999 kilometer.
// When this amount is exceeded, the odometer resets the current mileage to 0.
//To be able to work with a FuelGauge object. It should decrease the FuelGauge object’s current amount of fuel by 1 liter for every 10 kilometers traveled.
// (The car’s fuel economy is 10 kilometers per liter.)
//Demonstrate the classes by creating instances of each. Simulate filling the car up with fuel,
// and then run a loop that increments the odometer until the car runs out of fuel. During each loop iteration, print the car’s current mileage and amount of fuel.
class FuelGauge
{
    protected int $fuel;
    protected int $millage;

    public function __construct($startingFuel=20,$startingMillage=999950)
    {
        $this->fuel = $startingFuel;
        $this->millage=$startingMillage;
    }

    public function fuelAmount()
    {
        echo $this->fuel.PHP_EOL;
    }

    public function increaseFuel($liters)
    {
            for($j=0;$j<$liters;$j++){
        if($this->fuel>=70){
            echo "car can hold only 70 liters";
            exit;
        }else{
        $this->fuel++;
        }
            }
    }

    protected function decreaseFuel()
    {
        $this->fuel--;
    }
}


class Odometer extends FuelGauge {
    private int $counter=10;
    protected int $fuel;
public function increase(){
    $this->counter++;
    $this->millage++;
    if($this->counter>9){
        if($this->fuel>1){
        $this->counter=0;
        $this->decreaseFuel();
        }else{
            echo "fill the bank, out of fuel".PHP_EOL;
            exit;
        }
    }
    if($this->millage==1000000){
        $this->millage=1;
    }
}
    public function millage(){
        echo "$this->millage miles".PHP_EOL;
    }



}
 $car=new Odometer();
$i=0;
while($i<1000) {
    $car->increase();
    $i++;

}
    $car->fuelAmount();
$car->millage();
$car->increaseFuel(55);
    $car->fuelAmount();




