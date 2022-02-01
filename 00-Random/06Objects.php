<?php
//obj ierocis, nosakumus un speeks, un cits obj invertory soma, kuraa caur konstruykoru varu salikt objektus, inverty[], bonuss izdrukaat arraa, kas invertory objaa ir
class Weapon
{
    public $name;
    public $damage;

public function __construct($name,$damage)
{
    $this->name=$name;
    $this->damage=$damage;
}
}
$weapons[]=new Weapon("Dagger",3);
$weapons[]=new Weapon("Mace",5);
$weapons[]=new Weapon("Sword",6);

class Inventory{
public array $inventory=[];
    public function addWeapon($weapon){
return $this->inventory[]=$weapon;
}
}

$inventory=new Inventory();
foreach ($weapons as $weapon){
    $inventory->addWeapon($weapon);
}

foreach($inventory->inventory as $items){
    echo "In your inventory is $items->name with $items->damage damage.".PHP_EOL;
};
