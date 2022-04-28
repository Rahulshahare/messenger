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

function update_user_status($dbh,$status){
    //for status say login or logout
    $status = $status == 'login' ? 1 : 0 ;
    $user_id = $_SESSION['UserId'];
    $today = date("Y.m.d H:i:s");
    $stm = $dbh->prepare(" UPDATE user SET last_login = :last_login, online = :online WHERE id = :id");
    $stm->execute(
        array(":last_login"=>"$today",
        ":online"=>"$status",":id"=>"$user_id")
    );



}
?>