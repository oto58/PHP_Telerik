<?php
function dbConn()
{
    global $connection;
    if(!$connection)
    {
    $connection = mysqli_connect('localhost', 'admin', 'qwerty', 'telerik');
    mysqli_set_charset($connection, 'utf8');
    }
    return $connection;
}

function verifyExsist($userName,$pass)
  {
    $connection=dbConn();
if ($connection)
    {
$q= mysqli_query($connection, 'SELECT user_name,password,user_statute FROM users');
if (!$q) 
      {
    echo 'Няма връзка с базата данни';
    exit;
      }
else  {      
    while ($row = $q->fetch_assoc())
         {    
    if($userName==$row['user_name'])
          {        
       if($pass==$row['password'])
            {
          if($row['user_statute']==1)
              {
          return 0;
              }
          return 1;
            }
          return 2;
          }  
         }
          return 3;   
       }
     }
   }
function verifyLen($userName,$pass) 
{
if(mb_strlen($userName)<5||mb_strlen($userName)>12){return 1;}  
if(mb_strlen($pass)<5||mb_strlen($pass)>12){return 2;}
return 0;
}

function verifyTxtLen($title,$msg,$group) 
{
if(mb_strlen($title)<1||mb_strlen($title)>50){return 1;}  
if(mb_strlen($msg)<1||mb_strlen($msg)>250){return 2;}
if(mb_strlen($group)>50){return 3;}
return 0;
}
?>
