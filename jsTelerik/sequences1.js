window.onload=function() {
    function readFile(file){
        var allText = ('allText');
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

    for(i=1;i<=3;i++){
        var testFile = 'Tests1/test.000.00'+i+'.in.txt';
        var outFile = 'Tests1/test.000.00'+i+'.out.txt';
        var answer = readFile(outFile);
        
        var input = readFile(testFile);
//парсва целия стрингов масив към числов масив
/*
input = input.split('\n').map(Number);
console.log(input);
*/
        input = input.split('\n');
        var n = parseInt(input[0]);
        var count = 0;
        for(j=1;j<=n;j++){
            if(parseInt(input[j])<=parseInt(input[j+1])){
            }else{
                count++;
            }
        }
    document.getElementById("d1").innerHTML+='</br>'+input;
    document.getElementById("d2").innerHTML+=' </br>= '+answer+' your answer is '+count;
    }
}


