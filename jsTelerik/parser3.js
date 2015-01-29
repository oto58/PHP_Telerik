window.onload = function() {

    function Solve(inputArr) {

        function calculate(result, sign, oper) {
            if (sign == '+') {
                result += oper
            }
            if (sign == '-') {
                result -= oper;
            }
            if (sign == '*') {
                result *= oper
            }
            if (sign == '/') {
                if (oper == 0) {
                    return 'err';
                }
                result /= oper;
            }
            return result;
        }

        function endFunc() {

            index = names[0].indexOf(funcName);
            if (readName && index >= 0) {
                if (result == '') {
                    result = names[1][index];
                } else {
                    oper = names[1][index];
                    result = calculate(result, sign, oper);
                }
                readName = false;
                funcName = '';
            }
        }

        var totalResult = 0,
            data = inputArr.split('\n'),
            names = [
                [],
                []
            ];
        for (r = 0; r < data.length; r++) {
            var oper = 0,
                result = '',
                sign = '',
                steck = [],
                digit = '',
                func = false,
                name = '',
                funcName = '';
            console.log(data[r]);

            for (c = 0; c < data[r].length - 1; c++) {
                var simbol = data[r].charAt(c);
                var simbol1 = data[r].charAt(c + 1);
                var index = '';

                if (simbol == ' ') {
                    endFunc();

                    if (!name == '') {
                        names[0].push(name);
                        func = false;
                        name = '';
                        var saveValue = true;
                    }
                    continue;
                }

                if (simbol == ')') {

                    endFunc();

                    if (steck.length > 0) {
                        sign = steck.pop();
                        oper = steck.pop();
                        result = calculate(result, sign, oper);
                    }

                    if (saveValue) {
                        names[1].push(parseInt(result));
                        saveValue = false;
                    }
                    continue;
                }

                if (simbol == '(') {
                    if (!sign == '') {
                        steck.push(result);
                        result = '';
                        steck.push(sign);
                        sign = '';
                    }
                    continue;
                }

                if (func == true) {
                    name += simbol;
                    continue;
                }

                if (readName == true) {
                    funcName += simbol;
                    continue;
                }

                if (simbol == '-') {
                    if (!isNaN(parseInt(simbol1))) {
                        digit = '-';
                    } else {
                        sign = simbol;
                    }
                    continue;
                }

                if (simbol == '+' || simbol == '*' || simbol == '/') {
                    sign = simbol;
                    continue;
                }

                if (isNaN(simbol)) {
                    if (data[r].substr(c, 3) == 'def') {
                        func = true;
                        c += 3;
                        continue;
                    }

                    var readName = true;
                    funcName = simbol;
                }

                if (!isNaN(simbol)) {
                    if (!isNaN(parseInt(simbol1))) {
                        digit += simbol;
                        continue;
                    } else {
                        oper = parseInt(digit + simbol);
                        digit = '';
                    }

                    if (result === '') {
                        result = oper;
                    } else {
                        result = calculate(result, sign, oper);
                    }

                }

            }
            console.log(result);
            if (result == 'err') {
                return 'Division by zero! At Line:' + (r + 1)
            }
            totalResult = parseInt(result);
        }
        return totalResult;
    }

    function readFile(file) {
        var allText = '';
        var rawFile = new XMLHttpRequest();
        rawFile.open("GET", file, false);
        rawFile.onreadystatechange = function() {
            if (rawFile.readyState === 4) {
                if (rawFile.status === 200 || rawFile.status == 0) {
                    allText = rawFile.responseText;
                }
            }
        }
        rawFile.send(null);
        return allText;
    }

    var test = '(/2 (+ 18 (/ 6 3)) 2)\n\
                (+ 5 -2 7 1)\n\
                (- 4 2) \n\
                (* 5 7)\n\
                (/ 10 3)\n\
                (/ 5 0) ';

    for (i = 1; i <= 9; i++) {
        var testFile = 'Tests3/test.00' + i + '.in.txt';
        var outFile = 'Tests3/test.00' + i + '.out.txt';

        var answer = readFile(outFile)
        var solve = Solve(readFile(testFile));
        //var solve = Solve(test);
        document.getElementById("d1").innerHTML += '</br> &nbsp;' + answer;
        document.getElementById("d2").innerHTML += '</br>&nbsp;your answer is :' + solve;
    }

}