<?php
//spēlētāji izvelk katrs pa kārtij
class Card
{
    public array $cards = ['2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9, 'T' => 10, 'J' => 10, 'Q' => 10, 'K' => 10, 'A' => 11];
    public array $types = ['♣', '♤', '♥', '♦'];
    public array $usedCards;
    public function pullCard(): array
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

}


