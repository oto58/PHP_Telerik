<!DOCTYPE html>
<html>
    <head>
        <title>animation</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="jquery-1.11.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
               $('#on').click(anim);
               $('#mouve').click(mouve);
            });
            function anim(){
                $('#anm').hide(5000);
            };
            function mouve(){
                $('#abs').animate({
                    left: '+=100px',
                    opacity: 'toggle'
                },500);
            };
        </script>
        <style type="text/css">
            #wrap{
                width: 960px;
                margin: 0 auto;
            }
            #anm{
                width: 650px;
            }
            #anm p{
                background-color: #cecece;
                width: 150px;
                border: 1px solid black;
                float: right;
                margin-right: 10px;
                height: 30px;
            }
            #abs{
                width: 100px;
                height: 100px;
                position: absolute;
                left: 50px;
                top: 200px;
                background: green;
            }
        </style>
    </head>
    <body>
        <div id="wrap">
            <button id="on">ON</button>
            <button id="mouve">MOUVE</button>
            <div id="anm">
            <P>
                
            </P>
            <P>
                
            </P>
            <P>
                
            </P>
            <P>
                
            </P>
            </div>
            <div id="abs" >
                
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
