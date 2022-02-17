<?php

//Exercise #7
//Modify the example program to compute the position of an object after falling for 10 seconds,
// outputting the position in meters. The formula in Math notation is:
//
//Gravity formula
//
//Note: The correct value is -490.5m.

$gravity = -9.81;
        $fallingTime = 10;
        $initialVelocity = 0.0;
  $initialPosition = 0.0;
    $x=0;
        $x = (0.5 * $gravity * (($fallingTime *  $fallingTime))
            + ($initialVelocity * $fallingTime) + ($initialPosition));

        echo $x;


