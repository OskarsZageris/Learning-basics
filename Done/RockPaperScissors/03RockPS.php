<?php

$selections= ['rock','paper','scissors','lizard','spock'];
$tie=0;
$meWin=0;
$pcWin=0;
$i=0;
while(true) {
    $i++;
    $pc = $selections[array_rand($selections)];
    $me = readline("pick rock, paper, scissors, lizard ot spock: ");


    echo "$me Vs $pc" . PHP_EOL;

    if ($me === $pc) {
        echo "TIE!" . PHP_EOL;
        $tie++;
        exit;
    }


    $combinations = [
        'rock' => ['scissors', 'lizard'],
        'scissors' => ['paper', 'lizard'],
        'paper' => ['rock', 'spock'],
        'lizard' => ['spock', 'paper'],
        'spock' => ['scissors', 'rock']

    ];


    if (in_array($pc, $combinations[$me])) {
        $meWin++;
        echo "I won" . PHP_EOL;
    } elseif (in_array($me, $combinations[$pc])) {
        $pcWin++;
        echo "Pc won" . PHP_EOL;
    } else {
        $tie++;
        echo "Tie!" . PHP_EOL;
    }


    $filename = '03history.txt';
    $somecontent = "Round {$i}: Computer picked {$pc}, Player picked {$me}, Result (Computer)$pcWin : (Player)$meWin : (Ties)$tie\n";
    if (is_writable($filename)) {
        if (!$fp = fopen($filename, 'a')) {
            echo "Cannot open file ($filename)";
            exit;
        }
        if (fwrite($fp, $somecontent) === FALSE) {
            echo "Cannot write to file ($filename)";
            exit;
        }
        fclose($fp);
    }

}