<?php
// To save a picture in MySQL use "picture.php"

header('content-type: application/json');
mb_internal_encoding('UTF-8');
$con = mysqli_connect('localhost', 'admin', 'qwerty', 'pictures');
if (!$con) {
    echo '<h1>Няма връзка</h1>';
}
mysqli_set_charset($con, 'utf8');
$q= mysqli_query($con, "SELECT * FROM users where user_id='1'");
$curr=0;
    while ($row = mysqli_fetch_assoc($q)){ 
//echo '<pre>'.print_r($row, true).'</pre>';exit();
        if($_POST['user']==$row['user_name']){
            $curr++;
            if($_POST['pass']==$row['password']){
                echo json_encode($row);
            }
            else {
                echo json_encode('<h1>wrong password</h1>');
            }
        }
    }
if($curr==0){
    echo json_encode('<h1>missing user</h1>');
    }
?>
