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

    public function getName(): string
    {
        return $this->name;
    }

    public function getSex(): string
    {
        return $this->sex;
    }

    public function getMother(): string
    {
        return $this->mother;
    }

    public function getFather(): string
    {
        return $this->father;
    }

}

$max = new Dog("Max", "male", "Lady", "Rocky");
$rocky = new Dog("Rocky", "male", "Molly", "Sam");
$sparky = new Dog("Sparky", "male");
$buster = new Dog("Buster", "male", "Lady", "Sparky");
$sam = new Dog("Sam", "male");
$lady = new Dog("Lady", "female");
$molly = new Dog("Molly", "female");
$coco = new Dog("Coco", "female", "Molly", "Sparky");

class DogTest
{
    public function hasSameMother($firstDog, $secondDog): bool
    {
        if ($firstDog->getMother() === $secondDog->getMother()) {
            return true;
        } else {
            return false;
        }
    }

    public function hasSameFather($firstDog, $secondDog): bool
    {
        if ($firstDog->getFather() === $secondDog->getFather()) {
            return true;
        } else {
            return false;
        }
    }

    public function infoAboutTheDog($dog): void
    {
        echo "{$dog->getName()} father is {$dog->getFather()}" . PHP_EOL;
        echo "{$dog->getName()} mother is {$dog->getMother()}" . PHP_EOL;
        echo "{$dog->getName()} is {$dog->getSex()}" . PHP_EOL;
    }

}

$dogTest = new DogTest;

$dogTest->infoAboutTheDog($coco);
$firstDogToCheck = $coco;
$secondDogToCheck = $buster;


if ($dogTest->hasSameMother($firstDogToCheck, $secondDogToCheck)) {
    echo "{$firstDogToCheck->getName()} and {$secondDogToCheck->getName()} have same mother, {$firstDogToCheck->getMother()}" . PHP_EOL;
} else {
    echo "{$firstDogToCheck->getName()} and {$secondDogToCheck->getName()} does not have same mother" . PHP_EOL;
    echo "{$firstDogToCheck->getName()} have {$firstDogToCheck->getMother()} as mother, but {$secondDogToCheck->getName()} have {$firstDogToCheck->getMother()} as mother" . PHP_EOL;
}
if ($dogTest->hasSameFather($firstDogToCheck, $secondDogToCheck)) {
    echo "{$firstDogToCheck->getName()} and {$secondDogToCheck->getName()} have same father, {$firstDogToCheck->getFather()}" . PHP_EOL;
} else {
    echo "{$firstDogToCheck->getName()} and {$secondDogToCheck->getName()} does not have same father" . PHP_EOL;
    echo "{$firstDogToCheck->getName()} have {$firstDogToCheck->getFather()} as father, but {$secondDogToCheck->getName()} have {$firstDogToCheck->getFather()} as father" . PHP_EOL;
}
