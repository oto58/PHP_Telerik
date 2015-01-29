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
                    url:'http://baydano.mooo.com/jQueryTest/ajaxRequest1.php'
                }).done(function(data){
                    $('#content').append(data);
                }).fail(function(er){
                    $('#content').append('<p>error</p>');
                    console.log(er);
                }).always(function(com){
                    $('#content').append('<p>complete</p>');
                    console.log(com);
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
            <button id="load">зареди</button>
            <div id="content">
                
            </div>
        </div>
    </body>
</html>
<?php

?>
