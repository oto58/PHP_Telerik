<?php
session_start();
$pageTitle='форум';
include 'includes/header.php';
if(isset($_SESSION['is_logged']))
{
$connection=dbConn();
if (!$connection) {
    echo 'no database';
    exit;
}
mysqli_query($connection, 'SET NAMES utf8');

?>
<a href='post.php'>нов пост</a>
<a href='exit.php'>изход</a>
<br><hr>
<form method="POST">
възходящо
<input type="radio" name="sort" value="ASC"/>
низходящо
<input type="radio" name="sort" value="DESC" checked="true" />
група
<input type="text" name="group" />
<input type="submit" value="сортирай"/>
</form>
<?php
$invert="DESC";
$group='';
if($_POST)
    {
    $invert=$_POST['sort'];
    if(isset($_POST['group'])&&$_POST['group']!=NULL)
        {$group='WHERE `msg_group`="'.$_POST['group'].'"';}
    }    

if(isset($_SESSION['admin']))
      {
    echo '<form method="GET">изтрии пост № <input type="text" name="postDel"/> 
    <input type="submit" value="изтрии"/></form>';
    if ($_GET)
         {
    $postDel="DELETE FROM `msg` WHERE `msg_id`=".$_GET['postDel'];       
    IF(mysqli_query($connection, $postDel)){echo 'изтрито';} 
         }
      }

$sql='SELECT msg_id,msg_date,msg_user,msg_title,msg_txt,
          msg_group FROM msg '.$group.' ORDER BY msg_date '.$invert;
$q = mysqli_query($connection, $sql);
if (!$q) {
    echo 'Няма връзка със сървъра, моля опитайте по-късно';
    exit;
}
if ($q->num_rows > 0) 
{
    echo '<table><tr><td>№</td><td>Дата</td><td>Потребител</td><td>Заглавие
        </td><td>Съобщение</td><td>Група</td></tr>';
    while ($row = $q->fetch_assoc()) 
    {
    echo '<tr><td>' . $row['msg_id'] . '</td>
    <td>' . date('d-m H:i:s',strtotime($row['msg_date'])) . '</td>
    <td>' . $row['msg_user'] . '</td><td>' . $row['msg_title'] . '</td>
    <td>' . $row['msg_txt'] . '</td><td>' . $row['msg_group'] . '</td></tr>';
    }
    echo '</table>';
}
else 
{
    echo 'няма намерени съобщения';
}
}
else
{
header('Location:\\SQLForum\index.php'); 
}
include 'includes/footer.php';
?>