<?php
include_once "Deck.php";
include_once "Player.php";

///pabeigt ar sauitiem 

class BlackPeter
{

    public function pullCardFromPlayer($player, $player2)
    {
        $randomCardsIndex = array_rand($player2->getCards());
        $randomPlayerCard = $player2->getCards()[$randomCardsIndex];
        $player->addCard($randomPlayerCard);
        $player2->removeCard($randomCardsIndex);
    }
    public function checkWinner($cards):bool{
        if(count($cards)==0){
            return true;
        }else{
            return false;
        }

    }

}

$deck = new Card;
$playerHand = [];
$player = new Player();
$player2 = new Player();

$blackPeter = $deck->pullCard();
for ($i = 0; $i < 26; $i++) {

    $player->addCard($deck->pullCard());
}

for ($i = 0; $i < 25; $i++) {
    $player2->addCard($deck->pullCard());
}
echo "starting hand".PHP_EOL;
$player->displayCards($player);
$player2->displayCards($player2);
echo "Black Peter: " . $blackPeter["card"] . $blackPeter["type"] . PHP_EOL;

$game = new BlackPeter();

$player->discard();
$player->displayCards($player);
$player2->discard();
$player2->displayCards($player2);
$i=0;
while(count($player->getCards())>0&&count($player2->getCards())>0) {
    echo "-------------------------------------------------------------------------------";

    echo PHP_EOL;

if(!empty($player->getCards())&&!empty($player2->getCards())) {
    $game->pullCardFromPlayer($player, $player2);
    $player->discard();
}
    echo "Player one hand: ";
    $player->displayCards($player);
    echo "Player two hand: ";
    $player2->displayCards($player2);
    echo "-------------------------------------------------------------------------------".PHP_EOL;
    sleep (1);
    if(!empty($player2->getCards())&&!empty($player->getCards())) {
        $game->pullCardFromPlayer($player2, $player);
        $player2->discard();
    }
    echo "Player one hand: ";
    $player->displayCards($player);
    echo "Player two hand: ";
        $player2->displayCards($player2);

    sleep (1);
}
if($game->checkWinner($player->getCards())){
    echo "Player one wins!".PHP_EOL;
};


if($game->checkWinner($player2->getCards())){
    echo "Player two wins!".PHP_EOL;
};


