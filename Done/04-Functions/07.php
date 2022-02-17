<?php
//Imagine you own a gun store. Only certain guns can be purchased with license types.
// Create an object (person) that will be the requester to purchase a gun (object) Person object has a name,
// valid licenses (multiple) & cash. Guns are objects stored within an array. Each gun has license letter,
// price & name. Using PHP in-built functions determine if the requester (person) can buy a gun from the store.

$person = new stdClass();
$person->name ='Ivars';
$person->cash =2050;
$person->licenses =["A","B"];

function createWeapon(string $name, int $price, string $license =null):stdClass
{
    $weapon =new stdClass();
    $weapon->name= $name;
    $weapon->license= $license;
    $weapon->price= $price;
return $weapon;
}

$weapons=[
    createWeapon('Ak47',1000,"A"),
    createWeapon('Deagle',300,"A"),
    createWeapon('Knife',50),
    createWeapon('Glock',200,"A")
];
$basket=[];
$cash=[];
$sum=0;
while($person->cash>0) {
    echo "{$person->name} has {$person->cash}$" . PHP_EOL;
    foreach ($weapons as $index => $weapon) {
        echo "[{$index}] {$weapon->name} ({$weapon->license}) {$weapon->price}$" . PHP_EOL;

    }

    $selectedWeaponIndex = (int)readline("Select weapon: ");
    $weapon = $weapons[$selectedWeaponIndex] ?? null;

    if ($weapon === null) {
        echo "weapon not found" . PHP_EOL;
        exit;
    }

    if ($weapon->license !== null && !in_array($weapon->license, $person->licenses)) {
        echo "Invalid license" . PHP_EOL;
        exit;
    }













echo "{$weapons[$selectedWeaponIndex]->name} has been added to basket".PHP_EOL. "[0]Continue".PHP_EOL."[1]Checkout".PHP_EOL ;
    $basket[]=$weapons[$selectedWeaponIndex]->name;
    $cash[]=$weapons[$selectedWeaponIndex]->price;

    $selectedWeaponIndex2 = (int)readline("Select option: ");
    if($selectedWeaponIndex2==0){

    }
    if($selectedWeaponIndex2==1){
        foreach ($basket as $item){
            echo $item.PHP_EOL;}
        foreach ($cash as$single){
            $sum=$sum+$single;
        }

            echo "Do you want to buy".PHP_EOL. "[0]Buy".PHP_EOL."[1]Exit".PHP_EOL ;
        echo "Total sum is {$sum}$".PHP_EOL;
            $selectedWeaponIndex3 = (int)readline("Select option: ");
            if($selectedWeaponIndex3==0){
                if ($person->cash < $sum) {
                    echo "Not enough cash." . PHP_EOL;
                    exit;
                }
                echo "Total sum ".$sum."$".PHP_EOL;
                $person->cash -= $sum;
                echo "{$person->name} has left with {$person->cash}$".PHP_EOL;
                $basket=[];
                $cash=[];
                $sum=0;

            }
            if($selectedWeaponIndex3==1){
                exit;
            }


    }


}
