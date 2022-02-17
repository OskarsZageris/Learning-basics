<?php


//Create a class called Date that includes: three pieces of information as instance variables — a month, a day and a year.
//
//Your class should have a constructor that initializes the three instance variables and assumes that the values provided are correct.
// Provide a set and a get for each instance variable.
//
//Provide a method DisplayDate that displays the month, day and year separated by forward slashes /.
//
//Write a test application named DateTest that demonstrates class Date capabilities.


class Date {
    private int $month;
    private int $day;
    private int $year;
    public string $date;
    public function __construct($year,$month,$day)
    {
        $this->day=$day;
        $this->month=$month;
        $this->year=$year;
    }

    public function displayDate(){
$this->date="{$this->year}/{$this->month}/{$this->day}";
    }
}

$time=new Date(2018,10,15);
$time->displayDate();
echo $time->date;