<?php

    $number  = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
    $string = array("D", "u", "m", "b", "W", "a", "y", "s", "d", "o", "t", "i", "d");
    $jumlah  = count($number);

    for ($i = 0; $i < $jumlah; $i++)
        echo "$number[$i] ";

    echo "\n";

    for ($i = 0; $i < $jumlah; $i++)
        echo "$string[$i] ";
