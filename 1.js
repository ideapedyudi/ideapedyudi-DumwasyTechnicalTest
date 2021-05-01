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