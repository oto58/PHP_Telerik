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
                $.ajax({
                    url:'http://baydano.mooo.com/jQueryTest/ajaxRequest3.php',
                    dataType:'json'
                }).done(function(data){      
                    for(i in data){
                        if(data[i].age<18){
                            $('#content').append('<p class="green">'+data[i].name+
                                ' = '+data[i].age+'</p>');
                        }
                        else{
                            $('#content').append('<p class="red">'+data[i].name+
                                ' = '+data[i].age+'</p>');
                        };
                        
                    };
                    $('#content').append(data);
                })
            };
        </script>
        <style type="text/css">
            #wrap{
                width: 960px;
                margin: 0 auto;
            }
            .red{
                color: red;
            }
            .green{
                color: green;
            }
        </style>
    </head>
    <body>
        <div id="wrap">
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
