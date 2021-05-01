function printSquare(num) {

    var s = '';

    for (var i = 1; i <= num; i++) {

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
console.log(printSquare(8));
