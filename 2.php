<?php
    $number  = array(1, 4, 8, 9, 3, 12, 0, 7, 6, 2, 11, 10, 5);
    $string = array("D", "u", "m", "b", "W", "a", "y", "s", "d", "o", "t", "i", "d");
    $jumlah  = count($number);

    $K = 0;

    while ($K < $jumlah - 1) {
        $i = 0;
        while ($i < $jumlah - 1 - $K) {
            if ($number[$i] > $number[$i + 1]) {
                $X         = $number[$i];
                $number[$i]     = $number[$i + 1];
                $number[$i + 1] = $X;
            }
            $i++;
        }
        $K++;
    }
    for ($i = 0; $i < $jumlah; $i++)
        echo "$number[$i] ";

    echo "\n";

    for ($i = 0; $i < $jumlah; $i++)
        echo "$string[$i] ";
