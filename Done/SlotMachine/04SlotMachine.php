<?php
//3x3 laukums slotmachiina

//3x4 laukums, var defineet kombinaacijas
//iespeejams cik ieliku naudu saakumaa, speeles cena, uzvaras laimests, while visu loop, var ievadiit likmi, kas uzvaru mainiis, katram simbolam savs vinests

$playerMoney=50;

$screenRow=3;
$screenColumn=4;

$screen=array();
for($i=0;$i<$screenRow;$i++){

    for($j=0;$j<$screenColumn;$j++){
        $screen[$i][$j]="-";
    }
}
function display_slotMachine($screen,$screenRow,$screenColumn)
{
    for ($i = 0; $i < $screenRow; $i++) {
        echo PHP_EOL;
        for ($j = 0; $j < $screenColumn; $j++) {
            echo $screen[$i][$j] . " ";
        }
    }
}


$possibleSymbols=['*','@','$'];

$randomSymbol = $possibleSymbols[array_rand($possibleSymbols)];

$winningCombinations=[
    [
        [0,0],[0,1],[0,2]
    ],
    [
        [1,0],[1,1],[1,2]
    ],
    [
        [2,0],[2,1],[2,2]
    ],
    [
        [0,0],[1,1],[2,2]
    ],
    [
        [0,2],[1,1],[2,0]
    ]
];
while(true){
$playAgain=readline("Do you want to spin?Y/N   ");


if($playAgain=="Y"||$playAgain=="y") {
    $howMuchToBet=readline("How much you want to bet with?  ");
    $playerMoney=$playerMoney-$howMuchToBet;
    for ($i = 0; $i < $screenRow; $i++) {
        $randomSymbol = $possibleSymbols[array_rand($possibleSymbols)];
        for ($j = 0; $j < $screenColumn; $j++) {
            $randomSymbol = $possibleSymbols[array_rand($possibleSymbols)];
            $screen[$i][$j] = $randomSymbol;
        }
    }
//$possibleSymbols;
//echo count($possibleSymbols);
    display_slotMachine($screen, $screenRow, $screenColumn);
    echo PHP_EOL;
if(function_exists("wowYouActuallyWonSomething")===false) {
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
}

    $winnings = 0;
    for ($i = 0; $i < count($possibleSymbols); $i++) {
        if ($possibleSymbols[$i] == '*' && wowYouActuallyWonSomething($winningCombinations, $screen, $possibleSymbols[$i])) {
            $winnings = $winnings + (1*$howMuchToBet);
        }
        if ($possibleSymbols[$i] == '$' && wowYouActuallyWonSomething($winningCombinations, $screen, $possibleSymbols[$i])) {
            $winnings = $winnings + (2*$howMuchToBet);
        }
        if ($possibleSymbols[$i] == '@' && wowYouActuallyWonSomething($winningCombinations, $screen, $possibleSymbols[$i])) {
            $winnings = $winnings + (3*$howMuchToBet);
        }

    }
    $playerMoney=$playerMoney+$winnings;
    echo "You have {$playerMoney}$ left.";
    echo PHP_EOL;
    echo "You have won {$winnings}$ this turn." . PHP_EOL;
}else {
    exit;
}
}