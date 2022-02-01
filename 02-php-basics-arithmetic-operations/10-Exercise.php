<?php
//See calculate-area.php
//
//Design a Geometry class with the following methods:
//
//A static method that accepts the radius of a circle and returns the area of the circle. Use the following formula:
//Area = π * r * 2
//Use Math.PI for π and r for the radius of the circle
//A static method that accepts the length and width of a rectangle and returns the area of the rectangle. Use the following formula:
//Area = Length x Width
//A static method that accepts the length of a triangle’s base and the triangle’s height. The method should return the area of the triangle. Use the following formula:
//Area = Base x Height x 0.5
//The methods should display an error message if negative values are used for the circle’s radius, the rectangle’s length or width, or the triangle’s base or height.
//
//Next write a program to test the class, which displays the following menu and responds to the user’s selection:
//
//Geometry calculator:
//
//Calculate the Area of a Circle
//Calculate the Area of a Rectangle
//Calculate the Area of a Triangle
//Quit
//Enter your choice (1-4):
//Display an error message if the user enters a number outside the range of 1 through 4 when selecting an item from the menu.
echo "Calculate the Area of a Circle".PHP_EOL;
echo"Calculate the Area of a Rectangle".PHP_EOL;
echo"Calculate the Area of a Triangle".PHP_EOL;
echo"Quit".PHP_EOL;
$a = readline('Enter your choice (1-4): ');
//$R=10;
//$L=5;
//$W=8;
//$B=3;
//$H=4;
if($a==1){
    $b = readline('Enter radius: ');
    if(intval($b)<0){
        echo "Error, no negative numbers".PHP_EOL;
    }else{

$circleCalculator=pi()*$b*2;
echo $circleCalculator.PHP_EOL;
    }
}
if($a==2){
    $a = readline('Enter length: ');
    $b = readline('Enter width: ');
$rectangleCalculator=$a*$b;
echo $rectangleCalculator.PHP_EOL;
}
if($a==3){
    $a = readline('Enter base: ');
    $b = readline('Enter height: ');
$triangleCalculator=$a*$b*0.5;
echo $triangleCalculator.PHP_EOL;
}
if(intval($a)<0||intval($a)>4){
    echo "Error".PHP_EOL;
}

