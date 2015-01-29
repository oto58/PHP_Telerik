<?php
/*Save a picture in MySQL server*/

$con = mysqli_connect('localhost', 'admin', 'qwerty', 'pictures');
if (!$con) {
    echo '<h1>Няма връзка</h1>';
}

$testpic = 'testpic.jpg';
$handle = fopen($testpic, "rb");
$img = fread($handle, filesize($testpic));
fclose($handle);

$img = base64_encode($img);

$sql = "insert into users values(null,'admin','qwerty','".$img."')";

//mysqli_query($con,$sql) or die('Bad Query at 12'.mysql_error());

echo "Success! You have inserted your picture!";

?>
<!-- Show rendered picture in pictureShow.php from MySQL database -->
<div><img src="pictureShow.php"/></div>