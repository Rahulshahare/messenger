<?php
/**
 * encryption function
 */
function messenger_hash($str){
    return base64_encode($str);
}

/**
 * function to verify encrypted values
 */
function messenger_verify($plainText, $hash){
    $newHash = base64_encode($plainText);
    $verify = strcasecmp($newHash, $hash);
    if($verify == 0){
        return true;
    }else{
        return false;
    }
}
?>