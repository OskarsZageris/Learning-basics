<?php
//See energy-drinks.php
//
//A soft drink company recently surveyed 12,467 of its customers and found that approximately
// 14 percent of those surveyed purchase one or more energy drinks per week. Of those customers
// who purchase energy drinks, approximately 64 percent of them prefer citrus flavored energy drinks.
//
//Write a program that displays the following:
//
//The approximate number of customers in the survey who purchased one or more energy drinks per week
//The approximate number of customers in the survey who prefer citrus flavored energy drinks


class EnergyDrinks {
    private int $customers;
    public function __construct(int $customers)
    {
        $this->customers=$customers;
    }
    public function displayNumbers():void{
        $x=round($this->customers/100*14);
        $y=round($this->customers/100*64);
        echo "approximate $x of customers in the survey who purchased one or more energy drinks per week".PHP_EOL;
        echo "approximate $y of customers in the survey who prefer citrus flavored energy drinks".PHP_EOL;
    }
}
$statistics=new EnergyDrinks(12467);
$statistics->displayNumbers();
