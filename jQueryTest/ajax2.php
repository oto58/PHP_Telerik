<!DOCTYPE html>
<html>
    <head>
        <title>ajax</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="jquery-1.11.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
               $('#load').click(load); 
            });
            function load(){
                var dt={
                    val1:$('#num1').val(),
                    val2:$('#num2').val()
                };
                $.ajax({
                    url:'http://baydano.mooo.com/jQueryTest/ajaxRequest2.php',
                    type:'POST',
                    data:dt
                }).done(function(data){
                    $('#content').html(data);
                })
            };
        </script>
        <style type="text/css">
            #wrap{
                width: 960px;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <div id="wrap">
            <input type="text" id="num1" />
            <input type="text" id="num2" />
            <button id="load">зареди</button>
            <div id="content">
                
            </div>
        </div>
    </body>
</html>
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
