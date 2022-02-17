<?php

class Game
{
    private int $money;
    private int $bet;
    private Board $board;
    private int $winnings;

    public function __construct(Board $board)
    {
        $this->board = $board;
    }

    public function getMoney():int
    {
        return $this->money;
    }

    public function getBoard():Board
    {
        return $this->board;
    }

    public function getWinnings():int
    {
        return $this->winnings;
    }

    public function setMoney(int $money):void
    {
        $this->money = $money;
    }

    public function setBet(int $bet):void
    {
        if ($bet > 0 && $bet <= $this->money) {
            $this->money -= $bet;
            $this->bet = $bet;
        }
    }

    public function isOver(): bool
    {
        return !$this->money > 0;
    }

    public function spin():void
    {
        $this->board->generateSymbols();
        if ($this->board->getPoints() > 0) {
            $this->winnings = 2 * $this->board->getPoints()* $this->bet;
            $this->money += $this->winnings;
        }
        else {
            $this->winnings = 0;
        }
        $this->bet = 0;
    }
}

class Board
{
    private int $rows;
    private int $columns;
    private array $gameBoard = [];
    private SlotElements $elements;
    private array $winnerCombos = [
        [[0, 0], [0, 1], [0, 2], [0, 3]],
        [[1, 0], [1, 1], [1, 2], [1, 3]],
        [[2, 0], [2, 1], [2, 2], [2, 3]],
        [[3, 0], [3, 1], [3, 2], [3, 3]],
        [[0, 0], [1, 1], [2, 2], [3, 3]],
        [[3, 0], [2, 1], [1, 2], [0, 3]],
    ];

    public function __construct(int $rows, int $columns, SlotElements $elements)
    {
        $this->rows = $rows;
        $this->columns = $columns;
        $this->elements = $elements;
    }

    public function generateSymbols():void
    {
        $board = [];
        for ($i = 0; $i < $this->rows; $i++) {
            $row = [];
            for ($j = 0; $j < $this->columns; $j++) {
                $row[] = $this->elements->getRandom();
            }
            $board[] = $row;
        }
        $this->gameBoard = $board;
    }

    public function displayBoard():string
    {
        $output = '';
        foreach ($this->gameBoard as $row) {
            $rowOutput = [];
            foreach ($row as $element) {
                $rowOutput[] = $element->getName();
            }
            $output .= implode(" ", $rowOutput) . PHP_EOL;
        }
        return $output;
    }

    public function getPoints():int
    {
        $winningPoints = 0;
        foreach ($this->winnerCombos as $combination) {
            foreach ($combination as $item) {
                [$row, $column] = $item;
                if ($this->gameBoard[$row][$column]->getName() !== $this->gameBoard[$combination[0][0]][$combination[0][1]]->getName()) {
                    break;
                }
                if (end($combination) === $item) {
                    $winningPoints += 1 * $this->gameBoard[$row][$column]->getCoefficient();
                }
            }
        }
        return $winningPoints;
    }

}

class SlotElements
{
    private array $elements = [];

    public function __construct(array $elements = [])
    {
        $this->elements = $elements;
    }

    public function getRandom()
    {
        return $this->elements[array_rand($this->elements)];
    }
}

class Element
{
    public string $symbol;
    private float $coefficient;

    public function __construct(string $symbol, float $coefficient)
    {
        $this->symbol = $symbol;
        $this->coefficient = $coefficient;
    }

    public function getName()
    {
        return $this->symbol;
    }

    public function getCoefficient()
    {
        return $this->coefficient;
    }
}


$slotElements = new SlotElements([
    new Element("✿", 1),
    new Element("☆", 10),
    new Element("ᴥ", 3),
    new Element("♥", 2)
]);

$gameBoard = new Board(4, 4, $slotElements);
$game = new Game($gameBoard);
$game->setMoney((int) readline('Enter how much money you will lose: '));
$spinPrice = readline("You have: {$game->getMoney()}$ Enter one spin price: ");


while (!$game->isOver()) {
    $game->setBet((int)$spinPrice);
    $game->spin();
    echo $game->getBoard()->displayBoard();
    if ($game->getWinnings() > 0) {
        echo "You won " . $game->getWinnings()."! Your money: " . $game->getMoney() . PHP_EOL;
    } else {
        echo "You lost $spinPrice$! You have: {$game->getMoney()}$ ". PHP_EOL;
    }
    if (strtoupper(readline("Wanna play again for {$spinPrice}$ (Y/N)")) == "N") {
        break;
    }
    if ($game->getMoney() < $spinPrice) {
        echo 'Not enough money!'.PHP_EOL;
    }
}