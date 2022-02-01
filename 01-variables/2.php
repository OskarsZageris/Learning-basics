<?php

$x=10;
$y="10";
if($x===$y){
   echo "true\n";
}else{
   echo "false\n";
}

$z=50;
if($z>0&&$z<=100){
    echo "true\n";
}else{
    echo "false\n";
}

$a10="hello";
if($a10==="hello"){
    echo "world\n";
}


$x1=50;
$y1=100;
$z1=200;
if($x1>10&&$y1<200&&$z1%2===0){
    echo "worked\n";
}


$x2=50;
$y2=5;
$z2=49;
if($x2>$y2&&$x2<$z2){
    echo "In range\n";
}else{
    echo "Out of range\n";
}

$plateNumber="HS8982";
 switch($plateNumber){
     case "HS8981":
         echo "It's your car\n";
         break;
     default:
         echo "It's not your car\n";
 }

 $number =49;
 switch($number){
     case $number<50 :
         echo "low\n";
         break;
     case $number>50 && $number<100 :
         echo "medium\n";
         break;
     case $number>100 :
         echo "high\n";
         break;

 }
