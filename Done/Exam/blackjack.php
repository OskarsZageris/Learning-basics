<?php

//Create an application BLACKJACK.
//Task consists of basic blackjack application where player plays against computer (desk).
//Each card has assigned value (number) that makes combination.
//Options: Option start the game, "hold" or "pick card". Player can pick card unless it goes over combination of 21. (total sum).
//If the value goes over 21, player looses.
//If player decided "hold", then computer starts to draw cards. If computer goes over 21, he looses.
//If computer reached value between 17-21 and player holds, then the decision is made by who has the higher number.
//!!! YOU DONT NEED TO MAKE FULL GAME WITH ALL POSSIBLE SCENARIOS, MODES, BLACKJACK MOMENT etc. !!!


class Blackjack
{
    public array $cards = ['2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9, 'T' => 10, 'J' => 10, 'Q' => 10, 'K' => 10, 'A' => 11];
    public array $types = ['♣', '♤', '♥', '♦'];
    public array $usedCards;
    public int $scorePlayer=0;
    public int $scoreComputer=0;


    public function pullCard():array
    {
        $x['card'] = array_rand($this->cards);
        $x['type'] = $this->types[array_rand($this->types)];
        if (!empty($this->usedCards['used_cards'])) {
            while (in_array($x['card'] . $x['type'], $this->usedCards['used_cards'])) {
                $x['card'] = array_rand($this->cards);
                $x['type'] = $this->types[array_rand($this->types)];
            }
        }
        $this->usedCards['used_cards'][] = $x['card'] . $x['type'];
        return $x;
    }

    public function calculateValue(array $player): int
    {
        $playerCounter = 0;
        foreach ($player as $value) {
            $playerCounter += $this->cards[$value["card"]];

        }
        return $playerCounter;

    }

    public function displayCards($player)
    {
        foreach ($player as $value) {
            foreach ($value as $value1) {
                echo $value1;
            }
            echo " ";
        }
    }
public function checkWinner($player,$computer){
       if($this->calculateValue($player)<=21&&($this->calculateValue($player)>=$this->calculateValue($computer)||$this->calculateValue($computer)>21)){
           echo "Player wins!".PHP_EOL;
           $this->scorePlayer++;
       }else{
           echo "Computer wins!".PHP_EOL;
           $this->scoreComputer++;
       }
}

}
$playAgain="y";
$cards = new Blackjack;
while($playAgain=="y") {
    $playerCards=[];
    $computerCards=[];
    $playerCards[] = $cards->pullCard();
    $playerCards[] = $cards->pullCard();
    $computerCards[] = $cards->pullCard();
    $computerCards[] = $cards->pullCard();

    $action = "pick";
    while ($cards->calculateValue($playerCards) <= 21 && $action == "pick") {
        echo "Your hand: ";
        $cards->displayCards($playerCards);
        echo PHP_EOL;
        echo "Score: ";
        echo $cards->calculateValue($playerCards) . PHP_EOL;
        $action = readline("Do you want to hold or pick a card? ");
        if ($action == "pick") {
            $playerCards[] = $cards->pullCard();
            if ($cards->calculateValue($playerCards) > 21) {
                $cards->displayCards($playerCards);
                echo PHP_EOL . "You have lost! Score: {$cards->calculateValue($playerCards)}" . PHP_EOL;
            }
        }
    }

    echo "Computer hand: ";
    $cards->displayCards($computerCards);
    echo PHP_EOL;
    echo $cards->calculateValue($computerCards) . PHP_EOL;
    while ($cards->calculateValue($computerCards) < 17 && $cards->calculateValue($computerCards) < 21) {
        sleep(1);
        $computerCards[] = $cards->pullCard();
        echo "Computer hand: ";
        $cards->displayCards($computerCards);
        echo PHP_EOL;
        echo "Computer score: " . $cards->calculateValue($computerCards) . PHP_EOL;
    }

    $cards->checkWinner($playerCards, $computerCards);


    echo "Computer have won: ".$cards->scoreComputer." times "."Player have won: ".$cards->scorePlayer." times".PHP_EOL;
    echo "----------------------------------------------------------------------".PHP_EOL;
$playAgain=readline("Do you want to play again? y/n");



}