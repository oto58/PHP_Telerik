<!DOCTYPE html>
<html>
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <script type="text/javascript" src="jquery-1.11.1.js"></script>
        <!--
        <script type="text/javascript" src="jquery-1.11.1.min.js"></script>
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        -->
        <script type="text/javascript">
            $(document).ready(function(){
                $('#new_comment').click(function(e){
                    e.preventDefault();
                    $('#stylized').show();
                    $('#cancel_comment').show();
                    $(this).hide();
                });
                $('#cancel_comment').click(function(e){
                    e.preventDefault();
                    $('#stylized').hide();
                    $('#new_comment').show();
                    $(this).hide();
                });
                $('input,textarea').focusin(function(){
                    $(this).css('background','#cecece')
                });
                $('input,textarea').focusout(function(){
                    $(this).css('background','#fff')
                });
                $('label').mouseenter(function(){
                    $(this).find('span').css('display','block');
                });
                $('label').mouseout(function(){
                    $(this).find('span').hide();
                });
                $('#agree').click(function(){
                    if($(this).is(':checked')){
                        $('#btn').attr('disabled',null).css('background','#cecece');  
                    }
                    else{
                        $('#btn').attr('disabled','disabled').css('background','#eee');
                    }
                });
            });
        </script>
        
        <style type="text/css">
            body{
                font-family: sans-serif;
                font-size: 12px;
            }
            #wrap{
                margin: 0 auto;
                width: 400px;
                padding: 14px;
            }
            p, h1, form, button{border: 0;margin: 0;padding: 0;}
            .spacer{clear: both;height: 1px;}
            .myform{
                margin: 0 auto;
                width: 400px;
                padding: 14px;
            }
            #stylized{
                border: solid 2px #b7ddf2;
                background: #ebf4fb;
                display: none;
            }
            #stylized h1{
                font-size: 14px;
                font-weight: bold;
                margin-bottom: 8px;
            }
            #stylized label{
                display: block;
                font-weight: bold;
                text-align: right;
                width: 140px;
                float: left;
                cursor: pointer;
            }
            #stylized .small{
                color: #666666;
                display: none;
                font-size: 11px;
                font-weight: normal;
                text-align: right;
            }
            #stylized input, textarea{
                float: left;
                font-size: 12px;
                padding: 4px 2px;
                border: solid 1px #aacfe4;
                width: 200px;
                margin: 10 0 20 10;
            }
            #stylized button{
                clear: both;
                margin-left: 150px;
                width: 125px;
                height: 31px;
                background: #eee;
                text-align: center;
                line-height: 31px;
                color: #ffffff;
                font-size: 11px;
                font-weight: bold;
            }
            
        </style>
        
        <title>jQueryTest</title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        
        <div id="wrap">
            <a href="#" id="new_comment" >нов коментар</a>
            <a href="#" id="cancel_comment" style="display: none" >откажи</a>
            <div id="stylized" class="myform" >
                <form id="form" name="form" method="post" action="form.php">
                    <h1>добави коментар</h1>
                    <p>и помнете "не хранете троловете"</p>
                    <label>име
                        <span class="small">вашето име</span>
                    </label>
                    <input type="text" name="name" id="name"/>
                    <label>поща
                        <span class="small">вашата поща</span>
                    </label>
                    <input type="text" name="email" id="email"/>
                    <label>собщение
                        <span class="small">вашето спбщение</span>
                    </label>
                    <textarea></textarea>
                    <label>съгласен?
                        <span class="small">съгласен???</span>
                    </label>
                    <input type="checkbox" id="agree"/>
                    <button type="submit" id="btn" disabled="disabled" >изпрати</button>
                    <div class="spacer"></div>
                </form>
            </div>
        </div>
    </body>
</html>
