<?php

header('content-type: application/json');

$ret[0]=array('name'=>'ivan','age'=>18);
$ret[1]=array('name'=>'dragan','age'=>30);
$ret[2]=array('name'=>'petkan','age'=>16);

echo json_encode($ret);
?>
