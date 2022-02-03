<?php

class Player {
    private array $cards=[];
  public function addCard($card):void{
      $this->cards[]=$card;
  }
  public function getCards():array{
      return $this->cards;
  }
 public function removeCard($index){
      unset($this->cards[$index]);
 }
 public function displayCards($player){
     foreach ($player->getCards() as $card) {
         echo $card["card"] . $card["type"] . " ";
     }
     echo PHP_EOL;
 }
private function removeCards($card,$suit,$suit2){
    foreach ($card as $symbol=>$count){
        if ($count===2){
            foreach($this->cards as$index=> $cards) {
                if ($cards["card"] === $symbol&&($cards["type"]==$suit||$cards["type"]==$suit2)) {
                    unset($this->cards[$index]);
                }
            }
        }
    }
}
  public function discard(){
      $onlyBlackCards = [];
      $onlyRedCards = [];
      foreach ($this->cards as $card) {
          if($card["type"]==='♣'||$card["type"]==='♤'){
          $onlyBlackCards[] = (string)($card["card"]);
          }
          if($card["type"]==='♥'||$card["type"]==='♦'){
              $onlyRedCards[] = (string)($card["card"]);
          }

      }
      $blackCardsCount= array_count_values($onlyBlackCards);
$redCardsCount= array_count_values($onlyRedCards);
      $this->removeCards($blackCardsCount,"♣","♤");
      $this->removeCards($redCardsCount,"♥","♦");



}

}