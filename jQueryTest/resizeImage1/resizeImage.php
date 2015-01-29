<form action="resizeImage.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="fileName" />
    <input type="submit">
</form>
    
<?php

if($_FILES){

//echo '<pre>'.print_r($_FILES, true).'</pre>'; exit();
$data = base64_encode(file_get_contents($_FILES['fileName']['tmp_name']));

/**
         * Image re-size
         * @param int $width
         * @param int $height
         */
        function ImageResize($width, $height, $img_name)
        {
                /* Get original file size */
                list($w, $h) = getimagesize($_FILES['fileName']['tmp_name']);

/*
                $ratio = $w / $h;
                $size = $width;

                $width = $height = min($size, max($w, $h));

                if ($ratio < 1) {
                    $width = $height * $ratio;
                } else {
                    $height = $width / $ratio;
                }
*/
                /* Calculate new image size */

                $ratio = max($width/$w, $height/$h);
                $h = ceil($height / $ratio);
                $x = ($w - $width / $ratio) / 2;
                $w = ceil($width / $ratio);
                /* set new file name */
                $path = $img_name;


                /* Save image */
                if($_FILES['fileName']['type']=='image/jpeg')
                {
                    /* Get binary data from image */
                    $imgString = file_get_contents($_FILES['fileName']['tmp_name']);
                    /* create image from string */
                    $image = imagecreatefromstring($imgString);
                    $tmp = imagecreatetruecolor($width, $height);
                    imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h);
                    imagejpeg($tmp, $path, 100);
                }
                else if($_FILES['fileName']['type']=='image/png')
                {
                    $image = imagecreatefrompng($_FILES['logo_image']['tmp_name']);
                    $tmp = imagecreatetruecolor($width,$height);
                    imagealphablending($tmp, false);
                    imagesavealpha($tmp, true);
                    imagecopyresampled($tmp, $image,0,0,$x,0,$width,$height,$w, $h);
                    imagepng($tmp, $path, 0);
                }
                else if($_FILES['fileName']['type']=='image/gif')
                {
                    $image = imagecreatefromgif($_FILES['fileName']['tmp_name']);

                    $tmp = imagecreatetruecolor($width,$height);
                    $transparent = imagecolorallocatealpha($tmp, 0, 0, 0, 127);
                    imagefill($tmp, 0, 0, $transparent);
                    imagealphablending($tmp, true); 

                    imagecopyresampled($tmp, $image,0,0,0,0,$width,$height,$w, $h);
                    imagegif($tmp, $path);
                }
                else
                {
                    return false;
                }

                return true;
                imagedestroy($image);
                imagedestroy($tmp);
        }

$file = ImageResize(600, 400, $_FILES['fileName']['name']);
        
echo '<img src="'.$_FILES['fileName']['name'].'">';
echo '<img src="data:image/jpeg;base64,'.$data.'"/>';
};
?>
