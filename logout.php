<?php
$pass = "fashkjafbdshbhfjakkjadjfhdjhkjdjsj";

$hash1 = base64_encode($pass);

echo $hash1;

//echo base64_encode($hash1);
echo base64_decode("ZmFzaGtqYWZiZHNoYmhmamFra2phZGpmaGRqaGtqZGpzag==");
//echo bin2hex($pass);

//echo hex2bin(bin2hex($hash1));


echo strcasecmp("ZmFzaGtqYWZiZHNoYmhmamFra2phZGpmaGRqaGtqZGpzag==",$hash1);

function messenger_hash($str){
    $hash = base64_encode($str);
    return $hash;
}

function messenger_verify($plainText, $hash){
    $newHash = base64_encode($plainText);
    $verify = strcasecmp($newHash, $hash);
    if($verify == 0){
        return true;
    }else{
        return false;
    }
}

$password = "123456";

echo messenger_hash($password);

echo messenger_verify($password,"MTIzNDU2");
?>