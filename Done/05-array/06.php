<?php
//Write a program to play a word-guessing game like Hangman.
//
//It must randomly choose a word from a list of words.
//It must stop when all the letters are guessed.
//It must give them limited tries and stop after they run out.
//It must display letters they have already guessed (either only the incorrect guesses or all guesses).
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	_ _ _ _ _ _ _ _ _
//
//Misses:
//
//Guess:	e
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	_ e _ _ _ _ _ _ _
//
//Misses:
//
//Guess:	i
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	_ e _ i _ _ _ _ _
//
//Misses:
//
//Guess:	a
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	_ e _ i a _ _ a _
//
//Misses:
//
//Guess:	r
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	_ e _ i a _ _ a _
//
//Misses:	r
//
//Guess:	s
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	_ e _ i a _ _ a _
//
//Misses:	rs
//
//Guess:	t
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	_ e _ i a t _ a _
//
//Misses:	rs
//
//Guess:	n
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	_ e _ i a t _ a n
//
//Misses:	rs
//
//Guess:	o
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	_ e _ i a t _ a n
//
//Misses:	rso
//
//Guess:	l
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	l e _ i a t _ a n
//
//Misses:	rso
//
//Guess:	v
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	l e v i a t _ a n
//
//Misses:	rso
//
//Guess:	h
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	l e v i a t h a n
//
//Misses:	rso
//
//YOU GOT IT!
//
//Play "again" or "quit"? quit



$items = array("oneone","tenten","yolo");
do {
    $numberOfTries = 8;
    $randomWord = $items[array_rand($items)];
    echo $randomWord . PHP_EOL;
//word, you need to guess
    echo "Word:";
    $blankWord = array();

    for ($i = 0; $i < strlen($randomWord); $i++) {
        $blankWord[] = "_";
        echo "_";
    }

//uztaisa jaunu masīvu ar vārda garumu

    $checkIfHitRight = str_split($randomWord, 1);
//array words, kurš jāuzmin

    echo PHP_EOL;
    $misses = "";
    echo $misses;
    do {
        $guess = readline("Enter letter, you want to guess: ");

        if (in_array($guess, $checkIfHitRight)) {

            $lastPos = 0;
            $positions = array();

            while (($lastPos = strpos($randomWord, $guess, $lastPos)) !== false) {
                $positions[] = $lastPos;
                $lastPos = $lastPos + strlen($guess);
            }

            foreach ($positions as $value) {
                $blankWord[$value] = $guess;
            }
//
        } else {
            $misses = $misses . $guess;
            $numberOfTries--;
        }
        echo "Word:";
        for ($k = 0; $k < strlen($randomWord); $k++) {
            echo $blankWord[$k];

        }
        echo PHP_EOL;
        echo "Misses: {$misses}" . PHP_EOL;

        echo "Numbers of tries left: " . $numberOfTries . PHP_EOL;

    } while (in_array("_", $blankWord) || $numberOfTries == 0);
    echo "Congratulations, you have won!" . PHP_EOL;
    $playAgain=readline("Do you want to play again?Y/N");
    echo PHP_EOL;
}while($playAgain=="Y"||$playAgain=="y");







