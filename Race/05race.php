<?php
//1-4 var defineet speeleetaaju skaitu, kas izveido laukumu, hipodroms
//15 garums, uz katru laukumu piedalaas speeleetaajs, viens speeleetaajs pakustaas no 1-3 random laukumiem
//kad nonaak beigaas, tad uzvar, process notiek automaatiski
//pastaavg iespeeja uz nichu, ja abi nonaak galaa vienlaikus  speele beidzaas, kad visi ir sasniegushi finishu
//beigaas izdrukaa vietas
//sleep(1)

//hipodroms, iespejams ievadiit betting amount un uz kuru slotu liek, ja vinee, tad sumax3 
$budget = 1000;
$anotherRound = "y";
$lengthOfRace = 100;
$possibleHorses = ["Tempest Shadow", "Regret", "Velvet Rose", "Wildfire", "Apollo", "Black Beauty", "Horse Power", "Fifty Shades of Hay", "Usain Bolt", "Nightmare"];
$willingToGamble = (int)readline("Choose number of horses on track (min is 2),(max is 10):  ");
if ($willingToGamble > 10) {
    echo "Track is not so big to have more then 10 horses on track!";
    exit;
}
if ($willingToGamble < 2) {
    echo "You wanted only one horse? Go home, you're drunk" . PHP_EOL;
    exit;
}

while ($anotherRound == "y") {
    $horseNames = array_slice($possibleHorses, 0, $willingToGamble);
//$horseNames=["Tempest Shadow","Regret"];
    foreach ($horseNames as $index => $horseName) {
        echo "[$index]$horseName" . PHP_EOL;
    }
    $selectedHorse = (int)readline("Select your horse, enter number: ");
    if ($selectedHorse > 9) {
        echo "No such horse exist" . PHP_EOL;
        exit;
    }
    $betSize = (int)readline("How much you want to bet: ");
    if ($betSize > $budget) {
        echo "You don't have so much money, go to work!" . PHP_EOL;
    }
    $budget = $budget - $betSize;
    $winningMultiplayer = count($horseNames);
//    Returns = £100 × (9/2 + 1) = £100 × 5.5 = £550
    $winnings = ($winningMultiplayer / 2 + 1) * $betSize;
    if (function_exists("luckOfTheDraw") === false) {
        function luckOfTheDraw()
        {
            return rand(2, 6);
        }

        $shortTrackNames = [];
        foreach ($horseNames as $name) {
            $shortNames = substr($name, 0, 6);
            $shortTrackNames[] = "({$shortNames})";
        }
    }
    $track = array();
    for ($i = 0; $i < count($horseNames); $i++) {
        for ($j = 0; $j < $lengthOfRace; $j++) {
            $track[$i][$j] = "_";
        }
    }
    if (function_exists("display_race") === false) {
        function display_race($track, $numOfPlayers, $raceLength, $key)
        {

            $getFirstPlaceInRealTime = max($key);
            for ($i = 0; $i < $numOfPlayers; $i++) {
                echo PHP_EOL;

                if (isset($key)) {
                    if ($getFirstPlaceInRealTime === $key[$i] && $getFirstPlaceInRealTime < 100) {
                        echo "Is Winning! ";

                    } else {

                        echo "            ";
                    }
                }

                for ($j = 0; $j < $raceLength; $j++) {
                    echo $track[$i][$j] . " ";
                    if (isset($key) && $key[$i] > $raceLength && $j == $raceLength - 1) {
                        echo "(Finished)";
                    }
                }
            }
        }
    }
    $k = 0;
    $key = [];
    $winnersStop = [];
    $youHaveWon = 0;
    $round = 0;
    $placement = [];
    $checkIfDraw = [];
    while ($k < count($horseNames)) {
        $round++;
        for ($i = 0; $i < count($horseNames); $i++) {
            if (isset($key[$i]) && $key[$i] > 0) {
                $track[$i][luckOfTheDraw() + $key[$i]] = $shortTrackNames[$i];
                $key[$i] = array_search("$shortTrackNames[$i]", $track[$i]);


            } else {
                $track[$i][luckOfTheDraw()] = $shortTrackNames[$i];
                $key[$i] = array_search("$shortTrackNames[$i]", $track[$i]);

            }
            if ($key[$i] > $lengthOfRace && (!in_array($shortTrackNames[$i], $winnersStop))) {
                $winners[] = $horseNames[$i];
                $winnersStop[] = $shortTrackNames[$i];
                $checkIfDraw[] = $round;
                $k++;
            }
        }
        display_race($track, count($horseNames), $lengthOfRace, $key);
        echo PHP_EOL;
        $track = array();
        for ($i = 0; $i < count($horseNames); $i++) {
            for ($j = 0; $j < $lengthOfRace; $j++) {
                $track[$i][$j] = "_";
            }
        }
        sleep(1);
    }

//foreach($checkIfDraw as $value){
//    echo $value.PHP_EOL;
//}
    $place = 1;
    for ($i = 0; $i < count($checkIfDraw); $i++) {
        if (isset($checkIfDraw[$i - 1]) && $checkIfDraw[$i] === $checkIfDraw[$i - 1]) {
            $place--;
        }
        if ($place === 1) {
            $placement[] = "{$place}st place for player $winners[$i]";
            if ($winners[$i] === $horseNames[$selectedHorse]) {
                $youHaveWon++;
            }
            $place++;
        } elseif ($place === 2) {
            $placement[] = "{$place}nd place for player $winners[$i]";
            $place++;
        } elseif ($place === 3) {
            $placement[] = "{$place}rd place for player $winners[$i]";
            $place++;
        } else {
            $placement[] = "{$place}th place for player $winners[$i]";
            $place++;
        }

    }
//
    foreach ($placement as $value) {
        echo $value . PHP_EOL;
    }

    if ($youHaveWon > 0) {
        $budget = $budget + $winnings;
        echo "You picked $horseNames[$selectedHorse]! Congratulations! you have won $winnings$!" . PHP_EOL;
        echo "You have $budget$" . PHP_EOL;
    } else {
        echo "You picked $horseNames[$selectedHorse]. Unfortunately you have lost! Try again next game." . PHP_EOL;
        echo "You have $budget$" . PHP_EOL;
    }
    $anotherRound = readline("Do you want to play again?(y/n) ");
}