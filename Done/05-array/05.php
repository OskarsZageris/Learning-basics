<?php

//See tic-tac-toe.php
//
//Code an interactive, two-player game of Tic-Tac-Toe. You'll use a two-dimensional array of chars.
//
//(...a game already in progress)
//
//	X   O
//	O X X
//	  X O
//
//'O', choose your location (row, column): 0 1
//
//	X O O
//	O X X
//	  X O
//
//'X', choose your location (row, column): 2 0
//
//	X O O
//	O X X
//	X X O
////
////The game is a tie.
//
//function display_board()
//{
//    echo "   |   |   \n";
//    echo "---+---+---\n";
//    echo "   |   |   \n";
//    echo "---+---+---\n";
//    echo "   |   |   \n";
//}


//display_board();
//
//
//
//$array = array();
//
//$array[] = array(0, 1, 2);
//$array[] = array(3, 4, 5);
//$array[] = array(6, 7, "");
//
////var_dump($array);
//if($array[2][2]==""){
//    $array[2][2]=8;
//}
//echo $array[2][2];


$board=array();

$board[]=array("-","-","-");
$board[]=array("-","-","-");
$board[]=array("-","-","-");

function display_board($board){
for($i=0;$i<3;$i++)
{
    echo PHP_EOL;
    for($j=0;$j<3;$j++)
    {
        echo $board[$i][$j]." ";
    }
}

}
function checkIfThereIsAWinner($board){
    if($board[0][0]==$board[0][1]&&$board[0][1]==$board[0][2]&&$board[0][0]!=="-"){
        display_board($board);
        echo PHP_EOL;
        echo "{$board[0][0]} has won the game!".PHP_EOL;
        die;
    }

    if($board[1][0]==$board[1][1]&&$board[1][1]==$board[1][2]&&$board[1][0]!=="-"){
        display_board($board);
        echo PHP_EOL;
        echo "{$board[1][0]} has won the game!".PHP_EOL;
        die;
    }

    if($board[2][0]==$board[2][1]&&$board[2][1]==$board[2][2]&&$board[2][0]!=="-"){
        display_board($board);
        echo PHP_EOL;
        echo "{$board[2][0]} has won the game!".PHP_EOL;
        die;
    }

    if($board[0][0]==$board[1][0]&&$board[1][0]==$board[2][0]&&$board[0][0]!=="-"){
        display_board($board);
        echo PHP_EOL;
        echo "{$board[0][0]} has won the game!".PHP_EOL;
        die;
    }
    if($board[0][1]==$board[1][1]&&$board[1][1]==$board[2][1]&&$board[0][1]!=="-"){
        display_board($board);
        echo PHP_EOL;
        echo "{$board[0][1]} has won the game!".PHP_EOL;
        die;
    }
    if($board[0][2]==$board[1][2]&&$board[1][2]==$board[2][2]&&$board[0][2]!=="-"){
        display_board($board);
        echo PHP_EOL;
        echo "{$board[0][2]} has won the game!".PHP_EOL;
        die;
    }
    if($board[0][0]==$board[1][1]&&$board[1][1]==$board[2][2]&&$board[0][0]!=="-"){
        display_board($board);
        echo PHP_EOL;
        echo "{$board[0][0]} has won the game!".PHP_EOL;
        die;
    }
    if($board[0][2]==$board[1][1]&&$board[1][1]==$board[0][2]&&$board[0][2]!=="-"){
        display_board($board);
        echo PHP_EOL;
        echo "{$board[0][2]} has won the game!".PHP_EOL;
        die;
    }
}
display_board($board);
echo PHP_EOL;
$squaresTaken=0;
do {
    $mistakeChecker = 0;
    do {
        if($squaresTaken!==9){
        $move = readline("'X', choose your location (row, column):  ");
        }else{
            echo "Game is over, it's a Tie!".PHP_EOL;
            die;
        }

        $output = preg_replace('/[^0-9]/', '', $move);
        $row = substr($output, 0, 1);
        $column = substr($output, 1, 2);

        if ($board[$row][$column] == "-") {
            $board[$row][$column] = "X";
            $squaresTaken++;
            $mistakeChecker = 1;
            checkIfThereIsAWinner($board);
        } else {
            echo "board square is already taken!" . PHP_EOL;
        }


    } while ($mistakeChecker === 0);
    for ($i = 0; $i < 3; $i++) {
        echo PHP_EOL;
        for ($j = 0; $j < 3; $j++) {
            echo $board[$i][$j] . " ";
        }
    }
    echo PHP_EOL;
    $mistakeChecker = 0;
    do {
        if($squaresTaken!==9){
        $move = readline("'O', choose your location (row, column):  ");
        }else{
            echo "Game is over, it's a Tie!".PHP_EOL;
            die;
        }

        $output = preg_replace('/[^0-9]/', '', $move);
        $row = substr($output, 0, 1);
        $column = substr($output, 1, 2);

        if ($board[$row][$column] == "-") {
            $board[$row][$column] = "O";
            $squaresTaken++;
            $mistakeChecker = 1;
            checkIfThereIsAWinner($board);
        } else {
            echo "board square is already taken!" . PHP_EOL;
        }

    } while ($mistakeChecker === 0);
    display_board($board);



}while($squaresTaken!==9);

