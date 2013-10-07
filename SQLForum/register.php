<?php
$pageTitle='регистрация';
include 'includes/header.php';

if($_POST)
  {
     
    $userName=trim($_POST['userName']);
    $pass=trim($_POST['pass']);
    switch (verifyLen($userName,$pass))     
   {
      case 0:
        if(verifyExsist($userName,$pass)>1)
      {
        $userName=  htmlspecialchars($userName);    
        $pass = htmlspecialchars($pass);   
        $connection=dbConn();  
        if($connection)
        {
            
        $sql='INSERT INTO users(user_name,password) VALUES ("'.$userName.'","'.$pass.'")';
        mysqli_query($connection,$sql);
            echo 'Регистрацията е успешена';
            header('Location:\\SQLForum\index.php'); 
        }
      }
      else {echo 'Съществуващ потребител';}
      break;        
      case 1:
echo 'Грешно име';
      break;
      case 2:
echo 'Грешна парола';
      break;
      default:
echo 'моля опитайте по-късно';          
      break;  
    }
  }
?>
<a href='index.php'>входна страница</a>
<br><hr>
<form method="POST">
<div>потребител<input type="text" name="userName">от 5 до 12 знака</div>
<div>парола<input type="text" name="pass">от 5 до 12 знака</div>
<div><input type="submit" value="регистрирай"></div>
</form>
<?php
include 'includes/footer.php';
?>
