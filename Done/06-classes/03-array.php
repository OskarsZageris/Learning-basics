<?php
//riepas japieliek, ja riepas nodilst, tad jāpārtrauc braukšana 4 riepas randomā, riepas dilst
//1-1,2 katrai nodilums veidojaas

//tuvās, tālās gaismas, gaismām pazūd kvalitāte, ja pārredzimība ir zem 50% tad braukt nedriigst
//tuvajām mainās pēc viena koef, tālām no cita koef, rnadom generator

//ar mačīnu var sākt braukt, kad iedarbinātā, lai mašīnu iedarbinātum, vajag bāku līdz pilnu

// akumulātros mašinai, nevar iedarbināt pašīnu ja nav sprieguma

class FuelGauge
{
    private float $fuel = 0;
    private const FUEL_CAPACITY = 70;

    public function __construct(float $amount)
    {
        $this->change($amount);
    }

    public function change(float $amount): void
    {
        $this->fuel += $amount;

        if ($this->fuel > self::FUEL_CAPACITY) {
            $this->fuel = self::FUEL_CAPACITY;
        }

        if ($this->fuel < 0) {
            $this->fuel = 0;
        }
    }

    public function getFuel(): float
    {
        return $this->fuel;
    }
}

class Odometer
{
    private int $mileage = 0;

    public function getMileage(): float
    {
        return $this->mileage;
    }

    public function addMileage(int $amount)
    {
        $this->mileage += $amount;
    }
}

class Tires
{
    public array $tires;

    public function __construct($tire1, $tire2, $tire3, $tire4)
    {
        $this->tires[] = $tire1;
        $this->tires[] = $tire2;
        $this->tires[] = $tire3;
        $this->tires[] = $tire4;
    }
    public function removeLayer(): void
    {
        foreach ($this->tires as $index => $tire) {
            $this->tires[$index] -= rand(1,2);
        }
    }

}


class Car
{
    private string $name;
    private FuelGauge $fuelGauge;
    private Odometer $odometer;
    private Tires $tires;

    private const CONSUMPTION_PER_KM = 0.07; // 7L on 100km

    public function __construct(string $name, int $fuelGaugeAmount)
    {
        $this->name = $name;
        $this->fuelGauge = new FuelGauge($fuelGaugeAmount);
        $this->odometer = new Odometer();
        $this->tires = new Tires(100, 100, 100, 100);
    }

    public function drive(int $distance = 10): void
    {
        if ($this->fuelGauge->getFuel() <= 0) return;

        $this->tires->removeLayer();
        foreach ($this->tires->tires as $tire) {
            echo $tire." ";
        }


        $this->fuelGauge->change($distance * -self::CONSUMPTION_PER_KM);
        $this->odometer->addMileage($distance);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFuel(): float
    {
        return $this->fuelGauge->getFuel();
    }

    public function getMileage(): int
    {
        return $this->odometer->getMileage();
    }
}

$name = readline('Car name: ');
$fuelGaugeAmount = (int)readline('Fuel Gauge amount: ');
$driveDistance = (int)readline('Drive distance: ');

$car = new Car($name, $fuelGaugeAmount);

echo "------ " . $car->getName() . " ------";
echo PHP_EOL;

while ($car->getFuel() > 0) {
    echo "Fuel: " . $car->getFuel() . "l" . PHP_EOL;
    echo "Mileage: " . $car->getMileage() . "km" . PHP_EOL;

    $car->drive($driveDistance);

    sleep(1);
}