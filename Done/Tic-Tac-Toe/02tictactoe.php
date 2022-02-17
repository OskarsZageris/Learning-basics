<?php
// TicTacToe //laukums //kursh speeleetajs ievada // ievada simbolu speeleetaajam
//kombinaacijas masiivs jaatrodas teksta failaa, gan kombinaacijas gan speeles laukums jaatrodas teksta failaa, jaanolasa shiis vertiibas un jaauzbuyuvee
$gameSettings =file_get_contents("02tictac.txt");




$separateOne=explode("\n",$gameSettings);

$output = preg_replace('/[^0-9]/', '', $separateOne[0]);

$rowBoard = substr($output, 0, 1);
$columnBoard = substr($output, 1, 2);


$board=array();
    for($i=0;$i<$rowBoard;$i++){

        for($j=0;$j<$columnBoard;$j++){
            $board[$i][$j]="-";
        }
    }
function display_board($board,$rowBoard,$columnBoard)
{
    for ($i = 0; $i < $rowBoard; $i++) {
        echo PHP_EOL;
        for ($j = 0; $j < $columnBoard; $j++) {
            echo $board[$i][$j] . " ";
        }
    }
}

echo PHP_EOL;

    $separateTwo=explode("|",$separateOne[2]);
$numberOfCombinations=count($separateTwo);


for ($i=0;$i<$numberOfCombinations;$i++){
    $separateThree[$i]=explode(":",$separateTwo[$i]);
}
for($i=0;$i<$numberOfCombinations;$i++){
    $numberOfCombinations2= count($separateThree[$i]);
    for($j=0;$j<$numberOfCombinations2;$j++){
        $oneTimer[$i][$j]=explode(",",$separateThree[$i][$j]);
    }
}


for($i=0;$i<$numberOfCombinations-1;$i++){
    $numberOfCombinations2= count($separateThree[$i]);
    for($j=0;$j<$numberOfCombinations2;$j++){
        for($m=0;$m<2;$m++) {
            $combinations[$i][$j][$m] = (int)$oneTimer[$i][$j][$m];
        }
    }
}

$player1 = readline("Enter symbol for player 1: ");
$player2 = readline("Enter symbol for player 2: ");

$activePlayer = $player1;
/*
$combinations = [
[
[0, 0], [0, 1], [0, 2],
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
        [0, 0], [1, 0], [2, 0]
    ],
    [
        [0, 1], [1, 1], [2, 1]
    ],
    [
        [0, 2], [1, 2], [2, 2]
    ],
    [
        [2, 0], [1, 1], [2, 0]
    ]
];
*/


function winnerWinnerChickenDinner(array $combinations, array $board, string $activePlayer): bool
{
foreach ($combinations as $combination) {
foreach ($combination as $item)
{
[$row, $column] = $item;
if ($board[$row][$column] !== $activePlayer) {
break;
}

if (end($combination) === $item) {
return true;
}
}
}

return false;
}

function isBoardFull(array $board): bool
{
foreach ($board as $row) {
if (in_array('-', $row)) return false;
}
return true;
}
// X
// $board[0][0] = X
while (!isBoardFull($board) && !winnerWinnerChickenDinner($combinations, $board, $activePlayer)) {
    display_board($board,$rowBoard,$columnBoard);
    echo PHP_EOL;
    echo $activePlayer;
$position = readline(' Enter position: ');
[$row, $column] = explode(',', $position);

if ($board[$row][$column] !== '-') {
echo 'Invalid position. its taken!' . PHP_EOL;
continue;
}


$board[$row][$column] = $activePlayer;

if (winnerWinnerChickenDinner($combinations, $board, $activePlayer))
{
    display_board($board,$rowBoard,$columnBoard);
    echo PHP_EOL;
echo 'Winner is ' . $activePlayer;
echo PHP_EOL;
exit;
}

echo PHP_EOL;
$activePlayer = $player1 === $activePlayer ? $player2 : $player1;
}

echo 'The game was tied.';
echo PHP_EOL;


