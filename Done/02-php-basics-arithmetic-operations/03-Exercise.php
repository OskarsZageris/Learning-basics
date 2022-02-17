<?php

$a = readline('Enter number one: ');
$b = readline('Enter number two: ');
$y=0;
for ($x = $a; $x <= $b; $x++) {
    $y=$y+$x;
}
echo $y.PHP_EOL;
echo $y/$b .PHP_EOL;