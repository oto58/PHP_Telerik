<?php
session_start();
$pageTitle='нов пост';
include 'includes/header.php';
if(isset($_SESSION['is_logged']))
{

?>   
 <a href='forum.php'>форум</a>
 <a href='exit.php'>изход</a>
 <br><hr>
<form method="POST">
<div><input type="text" name="title"/>заглавие до 50 знака</div>
<div><textarea name="txt"></textarea>съобщение до 250 знака</div>
<div><input type="text" name="group"/>група до 50 знака</div>
<div><input type="submit" value="добави"/></div>
</form>
<?php
    if($_POST)
  {
$userName=$_SESSION['userName'];        
$connection=dbConn();
  $title=mysqli_real_escape_string($connection,trim($_POST['title']));
  $msg= mysqli_real_escape_string($connection,trim($_POST['txt']));
  $group= mysqli_real_escape_string($connection,trim($_POST['group']));
  switch (verifyTxtLen($title,$msg,$group)) 
   {
      case 0:
  $sql='INSERT INTO msg (msg_user,msg_title,msg_txt,msg_group) 
  VALUES("'.$userName.'","'.$title.'","'.$msg.'","'.$group.'")';
  IF(mysqli_query($connection, $sql))
    {
  header('Location:\\SQLForum\forum.php'); 
    }
  else 
    {
echo 'Няма връзка със сървъра, моля опитайте по-късно';
    }
      break;      
      case 1:
echo 'Заглавието трябва да е до 50 знака';
      break;
      case 2:
echo 'Съобщението трябва да е от 1 до 250 знака';
      break;
      case 3:
echo 'Групата трябва да е до 50 знака';
      break;
      default:
echo 'Няма връзка със сървъра, моля опитайте по-късно';          
      break;
    }
  }
}
else
{
 header('Location:\\SQLForum\index.php'); 
}
include 'includes/footer.php';
?>
