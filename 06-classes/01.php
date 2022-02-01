<?php

//slotu mašīna jāuztaisa, tikai obj orentēōša;




//make geometriskas figūras, aplis trīstūris un kvadrāts, katra ir kā forma, formai vajag nosakumu un vismētu
// funkcijas, kas izrēģina izmeru, laukumu, aplim iedots rādius, trīstūrim malas garumi, utt
// mantošanu jāizmanto, 3 figūras $name vienāds, parametri katram savi, 4 kclasses


//kopēja funcija, kas aprēķina laukumu kopā, visu formas kopā masīvā var ielikt, visus , var izvadīt jau kas ir.


//izvēle izveidot formu un ierakstīt parametrus, kas tiek pieglabaats kopeejaa objektaa, ja grib aprēķina visu. opcijas

abstract class Shape
{
    protected string $name;

    protected function __construct($name)
    {
        $this->name = $name;
    }
}

class Triangle extends Shape
{
    protected int $bottomSide = 1;
    protected int $base = 1;
    public array $sumOfSquares;

    public function __construct($name, $bottomSide, $base)
    {
        $this->bottomSide = $bottomSide;
        $this->base = $base;
        parent::__construct($name);
    }

    public function squareArea()
    {
        $this->sumOfSquares[] = $this->bottomSide * $this->base / 2;
        return $this->bottomSide * $this->base / 2;
    }
}

class Circle extends Shape
{
    protected int $radius = 1;
    public array $sumOfSquares;

    public function __construct($name, $radius)
    {
        $this->radius = $radius;
        parent::__construct($name);
    }

    public function squareArea()
    {
        $this->sumOfSquares[] = $this->radius;
        return $this->radius;
    }
}

class Rectangle extends Shape
{
    protected int $sideOne = 1;
    protected int $sideTwo = 1;
    public array $sumOfSquares;

    public function __construct($name, $sideOne, $sideTwo)
    {
        $this->sideOne = $sideOne;
        $this->sideTwo = $sideTwo;
        parent::__construct($name);
    }

    public function squareArea()
    {
        $this->sumOfSquares[] = $this->sideOne * $this->sideTwo;
        return $this->sideOne * $this->sideTwo;
    }
}

class ShapesCalculator
{
    private array $shapes = [];

    public function add(Shape $shape)
    {
        $this->shapes[] = $shape;
    }

    public function sumArea(): int
    {
        $sumOfAllArea=0;
        foreach ($this->shapes as $shape){

            $sumOfAllArea+=$shape->squareArea();
        }
        return $sumOfAllArea;

    }
}
$areasSum = new ShapesCalculator();
readline("Enter Triangle parameters ");
$triangle = new Triangle("Triangle", 10, 20);
echo $triangle->squareArea() . PHP_EOL;
$areasSum->add($triangle);

$rectangle = new Rectangle("Retangle", 10, 20);
echo $rectangle->squareArea() . PHP_EOL;
$areasSum->add($rectangle);

$circle = new Circle("Circle", 10);
echo $circle->squareArea() . PHP_EOL;
$areasSum->add($circle);

echo $areasSum->sumArea() . PHP_EOL;





