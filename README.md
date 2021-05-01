# xplacebo-dmy
## Soal No. 1
Buatlah function untuk menghitung jumlah jabat tangan yang terjadi dalam pertemuan yang dihadiri oleh beberapa orang. Jika setiap orang berjabat tangan dengan semua yang hadir dan hanya sekali berjabat tangan tangan dengan orang yang sama!

Notice, Gunakan perulangan dan tidak menggunakan rumus matematika n x (n-1)/2 atau ½.n.(n-1) ataupun yang lainnya! 
Clue:
print(count_handshake(3))
result: 3
print(count_handshake(6))
result: 15

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
