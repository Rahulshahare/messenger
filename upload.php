<?php

//ob_start();
//error_reporting(0);
// print_r($_POST);
// print_r($_FILES);

 if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    if(is_array($_FILES)) {
        if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
            $sourcePath = $_FILES['userImage']['tmp_name'];
            $imageSize = $_FILES['userImage']['size'];
            // $targetPath = "uploads/".$_FILES['userImage']['name'];
            $extension = explode("/", $_FILES["userImage"]["type"]);
            $time = time();     // round(microtime(true)) <- time can also be find this way too
            $name = $time.".".$extension[1];
            $targetPath = "uploads/".$time.".".$extension[1];
            $quality = '';
            // move_uploaded_file($tmp, "uploads/" . $name);
            if(move_uploaded_file($sourcePath,$targetPath)) {
                echo trim($name);

                        if($imageSize > 51200 && $imageSize < 102400){ //Greater than 50KB and less than  100KB
                            $quality = 70;
                        }elseif($imageSize > 102400 && $imageSize < 204800){ //less than 200KB
                            $quality = 50;
                        }elseif($imageSize > 204800 && $imageSize < 307200){ //less than 300KB
                            $quality = 40;
                        }elseif($imageSize > 307200){ //Greater than 300KB
                            $quality = 30;
                        }
                        if(!empty($quality)){
                            //compress_image($targetPath, $targetPath, $quality);
                        }
                        // echo $quality;
            }
        }
        // $info = getimagesize($targetPath); 
        // print_r( $info);
    }
 } //only support xrh requests

function compress_image($source, $destination, $quality){
    $info = getimagesize($source);

    if($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);
    elseif($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source);
    elseif($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);
    elseif($info['mime'] == 'image/webp')
        $image = imagecreatefromwebp($source);

    imagejpeg($image, $destination, $quality);

    return $destination;
}

?>

