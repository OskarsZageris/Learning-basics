<?php

//The questions in this exercise all deal with a class Dog that you have to program from scratch.
//
//Create a class Dog. Dogs should have a name, and a sex.
//Make a class DogTest with a Main method in which you create the following Dogs:
//Max, male
//Rocky, male
//Sparky, male
//Buster, male
//Sam, male
//Lady, female
//Molly, female
//Coco, female
//Change the Dog class so that each dog has a mother and a father.
//Add to the main method in DogTest, so that:
//Max has Lady as mother, and Rocky as father
//Coco has Molly as mother, and Buster as father
//Rocky has Molly as mother, and Sam as father
//Buster has Lady as mother, and Sparky as father
//Change the dog class to include a method fathersName that return the name of the father.
// If the father reference is null, return "Unknown". Test in the DogTest main method that it works.
//referenceToCoco.FathersName() returns the string "Buster"
//referenceToSparky.FathersName() returns the string "Unknown"
//Change the dog class to include a method boolean HasSameMotherAs(Dog otherDog).
// The method should return true on the call
//referenceToCoco.HasSameMotherAs(referenceToRocky). Show that the new method works in the DogTest main method.


class Dog
{
    private string $name;
    private string $sex;
    private string $mother;
    private string $father;

    public function __construct(string $name, string $sex, string $mother = "Unknown", string $father = "Unknown")
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->mother = $mother;
        $this->father = $father;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSex()
    {
        return $this->sex;
    }

    public function getMother()
    {
        return $this->mother;
    }

    public function getFather()
    {
        return $this->father;
    }

    public function hasSameMotherAs(Dog $dog): string
    {
        if ($this->mother === $dog->getMother()) {
            return "True";
        } else return "False";
    }
}

class DogTest
{
    private array $dogs;

    public function __construct(array $dogs)
    {
        $this->dogs = $dogs;
    }

    public function getDogs()
    {
        return $this->dogs;
    }

}

$dogs = new DogTest([
    $max = new Dog("Max", "male", "Lady", "Rocky"),
    $rocky = new Dog("Rocky", "male", "Molly", "Sam"),
    $sparky = new Dog("Sparky", "male"),
    $buster = new Dog("Buster", "male", "Lady", "Sparky"),
    $sam = new Dog("Sam", "male"),
    $lady = new Dog("Lady", "female"),
    $molly = new Dog("Molly", "female"),
    $coco = new Dog("Coco", "female", "Molly", "Sparky"),
]);

echo $coco->getName()." has same mother as ".$rocky->getName().": ".$coco->hasSameMotherAs($rocky).PHP_EOL;
echo $buster->getName()." has same mother as ".$rocky->getName().": ".$buster->hasSameMotherAs($rocky).PHP_EOL;