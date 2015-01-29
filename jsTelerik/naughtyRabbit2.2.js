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
    

    for(i=1;i<=1;i++){
        var testFile = 'Tests2/test.000.00'+i+'.in.txt';
        var outFile = 'Tests2/test.000.00'+i+'.out.txt';
        var answer = readFile(outFile);
        var params = readFile(testFile);
        params = createArr(params);
        var n = params[0][0];
        var m = params[0][1];
        var j = params[0][2];

        var field = [];
        var num = 1;
        for(p=0;p<n;p++){
            field[p] = [];
            for(k=0;k<m;k++){
            field[p][k] = num;
            num ++;
            }
        }

        var step = params[1];
        var equal = [];
        for(e=2;e<=j+1;e++){
            equal.push(params[e]); 
        }
        
        function calculate(current){
            equal.push(current);
            return [step[0]+current[0], step[1]+current[1]];
        }
        
        var rabbit = '';
        var sum = 0;
        var visited = [];
        var jumps = 0;
        
        while(true){

            if(step[0]<0||step[0]>=n||step[1]<0||step[1]>=m){
                rabbit = 'escaped sum='+sum;
                break;
            }

            for(v=0;v<visited.length;v++){
                if(step.toString()==visited[v].toString()){
                    rabbit = 'caught';
                }
            }
            if(rabbit ==='caught' ){
                rabbit += '&nbsp;jumps='+jumps
                break;
            }
            visited.push(step);
            jumps++;
            sum += field[step[0]][step[1]];
            step = calculate(equal.shift());
        }


        
    document.getElementById("d1").innerHTML+='</br>'+n+'x'+m+'cells &nbsp;'+answer;
    document.getElementById("d2").innerHTML+='</br>&nbsp;your answer is :'+rabbit;

    }
}