<?php

$a = readline('Enter number: ');

 if(!is_numeric($a)) {
    echo "Bye!".PHP_EOL;
  exit;
 }    else if($a%2===0){
         echo "Even number".PHP_EOL;
     }else{
         echo "Odd number".PHP_EOL;
     }



