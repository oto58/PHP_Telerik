<?php
session_start();
$pageTitle='вход';
include 'includes/header.php';
if(isset($_SESSION['is_logged'])){header('Location:\\SQLForum\forum.php');}
if(isset($_POST['userName']))
    {
    $userName=$_POST['userName'];
    $pass=$_POST['pass'];
    $a=verifyExsist($userName,$pass);
    switch($a)
      {
      case 0:
      $_SESSION['admin']=true;    
      $_SESSION['is_logged']=true;
      $_SESSION['userName']=$userName;
      header('Location:\\SQLForum\forum.php');  
       break;
       case 1:
      $_SESSION['is_logged']=true;
      $_SESSION['userName']=$userName;
      header('Location:\\SQLForum\forum.php');
       break; 
          case 2:
echo "Грешен потребител/парола";//парола
       break;
          case 3:
echo "Грешен потребител/парола";//потребител
       break;
       default:
echo 'Няма връзка със сървъра, моля опитайте по-късно';          
       break;
      }
    }
?>
<a href='register.php'>регистрация</a>
<br><hr>
<div>За достъп въведете име и парола </div>
<div>или регистрирайте нов потребител</div>
<form method="POST">
<div>потребител<input type="text" name="userName"></div>
<div>парола<input type="text" name="pass"></div>
<div><input type="submit" value="влез"></div>
</form>
<?php
include 'includes/footer.php';
?>
