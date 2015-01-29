<?php

// Reddering picture

$con = mysqli_connect('localhost', 'admin', 'qwerty', 'pictures');
if (!$con) {
    echo '<h1>Няма връзка</h1>';
}

$sql = "select img from users where user_id='1'";

$result = mysqli_query($con,$sql) or die('Bad query at 12!'.mysql_error());

while($row = mysqli_fetch_array($result,MYSQL_ASSOC)){

	$db_img = $row['img'];

}

//$db_img = 'txtPic.txt';


$db_img = base64_decode($db_img);
//print_r($db_img );

$db_img = imagecreatefromstring($db_img);

// Set the content type header - in this case image/jpeg
header('Content-Type: image/jpeg');

// Skip the filename parameter using NULL, then set the quality to 75%
imagejpeg($db_img);

// Free up memory
imagedestroy($db_img);
?>
