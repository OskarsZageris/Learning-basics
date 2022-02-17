<?php
//Exercise #8
//Foo Corporation needs a program to calculate how much to pay their hourly employees.
// The US Department of Labor requires that employees get paid time and a half for any hours over 40
// that they work in a single week. For example, if an employee works 45 hours, they get 5 hours of overtime,
// at 1.5 times their base pay. The State of Massachusetts requires that hourly employees be paid at least $8.00 an hour.
// Foo Corp requires that an employee not work more than 60 hours in a week.
//
//Summary
//An employee gets paid (hours worked) × (base pay), for each hour up to 40 hours.
//For every hour over 40, they get overtime = (base pay) × 1.5.
//The base pay must not be less than the minimum wage ($8.00 an hour). If it is, print an error.
//If the number of hours is greater than 60, print an error message.
//Write a method that takes the base pay and hours worked as parameters, and prints the total pay or an error.
// Write a main method that calls this method for each of these employees:
//
//Employee	Base Pay	Hours Worked
//Employee 1	$7.50	35
//Employee 2	$8.20	47
//Employee 3	$10.00	73

$Emp1Pay=7.50;
$Emp2Pay=8.20;
$Emp3Pay=10.00;
    $Emp1Hours=35;
    $Emp2Hours=47;
    $Emp3Hours=73;
    $overHours=1.5;

$employees =[

        [
            "name" => "1",
            "pay" => 7.50,
            "hours" => 35
        ],
    [
        "name" => "2",
        "pay" => 8.20,
        "hours" => 47
    ],
    [
        "name" => "2",
        "pay" => 8.00,
        "hours" => 40
    ],
        [
            "name" => "3",
            "pay" => 10.00,
            "hours" => 73
        ]
];
//var_dump($employees);
//foreach ($items[0]["name"] as $output){
//    echo $output.PHP_EOL;
//}
//$count= count($employees);
//for($i=0;$i<$count;$i++){
//    echo $employees[$i].PHP_EOL;
//}
$count= count($employees);
//echo $count;
for($i=0;$i<$count;$i++) {
    if($employees[$i]["pay"]<8){
        echo "Error, under payed".PHP_EOL;
    }elseif($employees[$i]["hours"]>60){
        echo "Error, worked too much".PHP_EOL;
    }elseif($employees[$i]["hours"]<=40){
            $out =$employees[$i]["hours"]*$employees[$i]["pay"];
            echo $out;
        }else {
        $main = 40 * $employees[$i]["pay"];
        $sum = ($employees[$i]["hours"] - 40) * $employees[$i]["pay"] + $main.PHP_EOL;
        echo $sum;
    }};


