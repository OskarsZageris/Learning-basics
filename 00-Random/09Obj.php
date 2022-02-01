<?php
//pearonas reģistrs, vārds uzvārds personas kods
//obj veidā jāpaparasa, jauna presona, kas izveido personu un saglabā reģistru
//izvadīt reģistru, karai personai
//persona, reģistrs, get set

class Person
{
    private string $name;
    private string $age;
    private string $code;

    public function __construct($name, $age, $code)
    {
        $this->name = $name;
        $this->age = $age;
        $this->code = $code;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getCode()
    {
        return $this->code;
    }
}

$person = new Person("Oskars", 20, '250291-11221');
$person2 = new Person("Oskars", 21, '250291-11221');

class Registry
{
    public array $persons;

    public function addPerson(Person $person)
    {
        return $this->persons[] = $person;
    }

    public function getPersons()
    {
        return $this->persons;
    }
}

$registry = new Registry();
While(true){

$registry->addPerson($person);
$registry->addPerson($person2);
$newName = readline("Enter your name  ");
$newAge = (int)readline("Enter your age  ");
$newCode = readline("Enter your person-code  ");
$registry->addPerson(new Person($newName, $newAge, $newCode));

foreach ($registry->getPersons() as $every) {
    echo "{$every->getName()} is {$every->getAge()} age old, {$every->getCode()}" . PHP_EOL;
}
}


