# xplacebo-dmy
## Soal No. 1
<br/>

> * Bahasa yang digunakan JavaScript
> * Menjalankan dengan online compiler https://es6console.com/ko5by6tv/

	function count_handshake(num) {
        var a = 0;
        var b = 0;
        var hasil = 0;

        for (var a; a < num; a++) {
            hasil = b += a;
        }
        return hasil;   
    }

    console.log(count_handshake(6));
    
<p>Hasil</p>

![alt text](https://github.com/xplacebo/xplacebo-dmy/blob/main/screenshot/soal%201.png)

## Soal No. 2
<br />

> * Bahasa yang digunakan php
> * Menjalankan dengan online compiler https://onlinegdb.com/SJkAW5cv_

	<?php

        $number  = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
        $string = array("D", "u", "m", "b", "W", "a", "y", "s", "d", "o", "t", "i", "d");
        $jumlah  = count($number);

        for ($i = 0; $i < $jumlah; $i++)
            echo "$number[$i] ";

        echo "\n";

        for ($i = 0; $i < $jumlah; $i++)
            echo "$string[$i] ";

    ?>
    
<p>Hasil</p>

![alt text](https://github.com/xplacebo/xplacebo-dmy/blob/main/screenshot/soal%202.png)


## Soal No. 3
<br />

> * Bahasa yang digunakan JavaScript
> * Menjalankan dengan online compiler https://es6console.com/ko5hme4x/_

	function printSquare(num) {
        var s = '';

        for(var i = 1; i <= num; i++) {

        if (i == 1 || i == num) {
            for (var j = 1; j <= num; j++) {
            s += '+';
            }
        } else {
            for (var k = 1; k <= num; k++) {
            if (k % 3 == 0) {
                    s += '+';
            } else {
                    s += '='
            }
            }
        }

        s += '\n';

        }
        return s;
        }
        console.log("--------- panjang ---------")
        console.log(printSquare(8));

    
<p>Hasil</p>

![alt text](https://github.com/xplacebo/xplacebo-dmy/blob/main/screenshot/soal%203.png)


## Soal No. 3

## database

pokemon_tb
![alt text](https://github.com/xplacebo/xplacebo-dmy/blob/main/4a/pokemon_tb.png)


element_tb
![alt text](https://github.com/xplacebo/xplacebo-dmy/blob/main/4a/element_tb.png)

element_pokemon
![alt text](https://github.com/xplacebo/xplacebo-dmy/blob/main/4a/element_pokemon.png)


## program

index home
![alt text](https://github.com/xplacebo/xplacebo-dmy/blob/main/4b/ss/index.png)

crud pokemon
![alt text](https://github.com/xplacebo/xplacebo-dmy/blob/main/4b/ss/pokemon.png)

