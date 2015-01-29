<!DOCTYPE html>
<html>
    <head>
        <title>ajax4</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="jquery-1.11.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
               $('#load').click(load); 
            });
            function load(){
                var dt={
                    user:$('#user').val(),
                    pass:$('#pass').val()
                };
                $.ajax({
                    url:'http://baydano.mooo.com/jQueryTest/ajaxRequest4.php',
                    type:'POST',
                    data:dt,
                    dataType:'json'
                }).done(function(data){
                    $('#content').html('<h1>zdrasti</h1>');
                    if(typeof data =='object'){
                $('#content').append('<p>'+data.user_name+' = '+data.user_id+'</p>'
                ,'<img src="data:image/jpeg;base64,'+data.img+'"/>'
                )}
                    else{$('#content').append('<p>'+data+'</p>')}
                }).fail(function(){
                    $('#content').html('<h1>error</h1>');
                }).always(function(){
                    $('#content').append('<p>complete</p>');
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
            <input type="text" id="user" />
            <input type="text" id="pass" />
            <button id="load">зареди</button>
            <div id="content">
                
            </div>
        </div>
    </body>
</html>