<?php
//4x4 boards, 3 combinations, personas, kuras spēlē



class SlotMachineScreen
{
    public array $screen;
    private int $row;
    private int $column;

    public function __construct(int $row, int $column)
    {
        $this->row = $row;
        $this->column = $column;
        for ($i = 0; $i < $row; $i++) {
            for ($j = 0; $j < $column; $j++) {
                $this->screen[$i][$j] = "-";
            }
        }
    }

    function displaySlotMachine()
    {
        for ($i = 0; $i < $this->row; $i++) {
            echo PHP_EOL;
            for ($j = 0; $j < $this->column; $j++) {
                echo $this->screen[$i][$j] . " ";
            }
        }
    }

    public array $possibleSymbols = ['*', '@', '$'];

    function spinTheSlotMachine()
    {
        for ($i = 0; $i < $this->row; $i++) {

            for ($j = 0; $j < $this->column; $j++) {
                $randomSymbol = $this->possibleSymbols[array_rand($this->possibleSymbols)];
                $this->screen[$i][$j] = $randomSymbol;
            }
        }
    }


}


class SlotMachineWinningCombinations
{
    public array $winningCombinations = [
        [
            [0, 0], [0, 1], [0, 2]
        ],
        [
            [1, 0], [1, 1], [1, 2]
        ],
        [
            [2, 0], [2, 1], [2, 2]
        ],
        [
            [0, 0], [1, 1], [2, 2]
        ],
        [
            [0, 2], [1, 1], [2, 0]
        ]
    ];

    public function wowYouActuallyWonSomething(array $winningCombinations, array $screen, $possibleSymbols): bool
{
foreach ($winningCombinations as $combination) {
foreach ($combination as $item) {
[$row, $column] = $item;
if ($screen[$row][$column] !== $possibleSymbols) {
break;
}
if (end($combination) === $item) {
    return true;
}
}
}


return false;
}



}

class Players
{
    public string $name;
    public int $cash;

    public function __construct($name, $cash)
    {
        $this->name = $name;
        $this->cash = $cash;
    }
}



$playerOne = new Players("Toms", 20);
$screen = new SlotMachineScreen(3, 3);
//$screen->displaySlotMachine();
$screen->spinTheSlotMachine();
$screen->displaySlotMachine();
//echo $playerOne->cash . PHP_EOL;

$didYouWin= new SlotMachineWinningCombinations;
////if($didYouWin->wowYouActuallyWonSomething($didYouWin->winningCombinations,$screen->screen,$screen->possibleSymbols)){
//    echo "Y".PHP_EOL;
//
//}else{
//    echo "N".PHP_EOL;
//};

function wowYouActuallyWonSomething(array $winningCombinations, array $screen, $possibleSymbols): bool
{
    foreach ($winningCombinations as $combination) {
        foreach ($combination as $item) {
            [$row, $column] = $item;
            if ($screen[$row][$column] !== $possibleSymbols) {
                break;
            }
            if (end($combination) === $item) {
                return true;
            }
        }
    }


    return false;
}


var_dump(wowYouActuallyWonSomething($didYouWin->winningCombinations,$screen->screen,$screen->possibleSymbols));
