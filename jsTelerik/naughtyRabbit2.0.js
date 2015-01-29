window.onload=function() {
    
    
    
    function readFile(file){
        var allText = '';
        var rawFile = new XMLHttpRequest();
        rawFile.open("GET", file, false);
        rawFile.onreadystatechange = function (){
        if(rawFile.readyState === 4){
            if(rawFile.status === 200 || rawFile.status == 0){
                allText = rawFile.responseText;
            }
        }
    }
    rawFile.send(null);
    return allText;
    }
    
    function createArr(textData){
        textData = textData.split('\n');
        var data = [];
        for(p=0;p<textData.length-1;p++){
            textData[p] = textData[p].split(' ');
            data[p] = [];
            for(k=0;k<textData[p].length;k++){
            data[p][k] = parseInt(textData[p][k]);
            }
        }
        return data;
    }

function Solve(params) {
            
    function inRange(pos, range) {
        return 0 <= pos && pos < range;
    }

        var n = params[0][0];
        var m = params[0][1];
        var j = params[0][2];
        var row = params[1][0];
        var column = params[1][1];
/*
        var field = [];
        var num = 1;
        for(p=0;p<n;p++){
            field[p] = [];
            for(k=0;k<m;k++){
            field[p][k] = num;
            num ++;
            }
        }
*/
        var dirs = [];
        for(e=2;e<=j+1;e++){
            dirs[e-2] = {
                row: params[e][0],
                column: params[e][1]
            } 
        }
        
        var used = {};
        var sum = 0;
        var dir = 0;
        var count = 0;
        
	while (true) {
            if (!inRange(row, n) || !inRange(column, m)) {
		return "escaped " + sum;
            }
            if (used[row * m + column]) {
		return "caught " + count;
            }
            count++;
//не се създава масив на полето, в масив се записват само координатите
//на посетените клетки. стойноста на клетките се изчислява и сумира в момента.
            used[row * m + column] = true;
            sum += row * m + column + 1;
            row += dirs[dir].row;
            column += dirs[dir].column;
            dir++;
//много хитър начин да се занулява брояча !
            dir = dir%dirs.length;
	}
    }
    
    for(i=1;i<=9;i++){
        var testFile = 'Tests2/test.00'+i+'.in.txt';
        var outFile = 'Tests2/test.00'+i+'.out.txt';
        var answer = readFile(outFile);
        var params = readFile(testFile);
        params = createArr(params);
        var solve = Solve(params);

    document.getElementById("d1").innerHTML+='</br>solve is : '+answer+'&nbsp;';
    document.getElementById("d2").innerHTML+='</br>your answer is :&nbsp;'+solve;
    }
    

}